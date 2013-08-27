<?php
/**
 * Ini digunakan untuk menentukan controller bagi master
 * Karena biasanya sama saja untuk rulesnya ...
 */
class YFMasterController extends Controller implements YF_ICanAccess
{
    public $layout='//layouts/column2Master';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view', 'admin', 'delete'),
//				'users'=>array('@'),
                'expression'=> 'Yii::app()->user->isCan(Yii::app()->controller)'
			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    /**
     * rule default untuk master
     * @param type $task
     * @return type
     */
    public function getRole(&$task=null,$modeRewrite=false) {
        if(is_null($task)) {
            $task=  Yii::app()->controller->action->id; // if task == null maka dapatkan id milik action dari controller saat ini
        }
        $role = array();
        $role['index'] = $role['view'] = array('minimalUserLevel'=>YFLevelLookup::OPERATOR);
        $role['create'] = $role['admin'] = $role['delete'] = array(
            'minimalUserLevel' => YFLevelLookup::ADMIN
        );
        $role['update'] = array(
            'minimalUserLevel' => YFLevelLookup::ADMIN,
//            'bizRule' => function($authorUserId) { 
//                return Yii::app()->user->id == $authorUserId; 
//            }
        );
        if($modeRewrite) return $role;
        return isset($role[$task])? $role[$task]: array();
    }
    
}