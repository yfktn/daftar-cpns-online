<?php
/**
 * Index untuk master
 */

class AdminPelamarController extends YFMasterController
{
	public function actionIndex()
	{
		$model=new Pendaftar('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Pendaftar'])) {
			$model->attributes=$_GET['Pendaftar'];
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}
   
	public function loadModel($id)
	{
		$model=AdminPelamar::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}
    
    public function getRole(&$task = null,$modeRewrite=false) {
        $role = parent::getRole($task, $modeRewrite=true);
        
        return $role[$task];
    }

}