<?php
/**
 * Index untuk master
 */

class AdminPelamarController extends YFMasterController
{
	public function actionIndex()
	{
		$model=new AdminPelamar('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['AdminPelamar'])) {
			$model->attributes=$_GET['AdminPelamar'];
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}
    
    public function actionView($id) {
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
    }
    
    public function actionUpdateStatus($id) {
        $pelamar = $this->loadModel($id);
        $model = new UpdateStatusPelamarForm;
        
        if(isset($_POST['UpdateStatusPelamarForm'])) {
			$model->attributes=$_POST['UpdateStatusPelamarForm'];
			if ($model->validate()) {
                // set new password
                $pelamar->id_status_pelamar = $model->status_pelamar;
                if($pelamar->update(array('id_status_pelamar','update_time'))) { // update hanya id_status_pelamar
                    $this->redirect(array('view','id'=>$id));
                }
			}
        }
        
        $this->render('updateStatusPelamar', array(
            'namapelamar'=>$pelamar->nama,
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
    
    public function accessRules() {
        $mine = array(
            array(
            'allow',
            'actions'=>array('updateStatus'),
            'expression'=>'Yii::app()->user->isCan(Yii::app()->controller)'
        ));
        $mine = CMap::mergeArray(
                $mine,
                parent::accessRules()
                );
        return $mine;
    }
    
    public function getRole(&$task = null,$modeRewrite=false) {
        $role = parent::getRole($task, $modeRewrite=true);
        $role['updateStatus'] = array(
            'minimalUserLevel' => YFLevelLookup::OPERATOR
        );
        return $role[$task];
    }

}