<?php

class UserController extends YFMasterController
{
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
    
    public function accessRules() {
        $mine = array(
            array(
            'allow',
            'actions'=>array('updatePassword'),
            'expression'=>'Yii::app()->user->isCan(Yii::app()->controller)'
        ));
        $mine = CMap::mergeArray(
                $mine,
                parent::accessRules()
                );
        return $mine;
    }

    /**
     * Override parent
     * @param type $task
     * @return type
     */
    public function getRole(&$task=null,$modeRewrite=false) {
        $role = parent::getRole($task,$modeRewrite=true); // dapatkan semua array dari role untuk di rewrite
        // set role lagi khusus untuk user
        $role['index'] = array('minimalUserLevel'=>YFLevelLookup::OPERATOR);
        $role['view'] = array('minimalUserLevel'=>YFLevelLookup::OPERATOR,
            'bizRule'=> function() {
                if(($id = Yii::app()->request->getParam('id', 0)) == 0) return false; // kalau 0 kembalikan saja
                if($id == Yii::app()->user->id) return true; // kalau mengupdate punya sendiri boleh ... 
                return false;
            });
        
        $role['create'] = $role['admin'] = $role['delete'] = array(
            'minimalUserLevel' => YFLevelLookup::ADMIN
        );
        
        $role['updatePassword'] = array(
            'minimalUserLevel'=>  YFLevelLookup::OPERATOR,
            'bizRule'=> function() {
                if(($id = Yii::app()->request->getParam('id', 0)) == 0) return false; // kalau 0 kembalikan saja
                if($id == Yii::app()->user->id) return true; // kalau mengupdate punya sendiri boleh ... 
                return false;
            }
        );
        
        $role['update'] = array(
            'minimalUserLevel' => YFLevelLookup::ADMIN, // operator juga bisa melakukan update
            'bizRule' => function() {
                // function untuk menentukan apakah boleh tidaknya melakukan update ...
                // $id adalah iduser dan pasti ada di query string 
                if(($id = Yii::app()->request->getParam('id', 0)) == 0) return false; // kalau 0 kembalikan saja
                if($id == Yii::app()->user->id) return true; // kalau mengupdate punya sendiri boleh ... 
                $model = User::model()->find('id=?', array($id));
                if($model!==null) {
                    if($model->id_instansi == Yii::app()->user->instansi &&  // hanya boleh update instansi sendiri
                        $model->level != YFLevelLookup::ADMIN && // tidak boleh update sesama admin
                            $model->level != YFLevelLookup::SUPER_ADMIN // apalgi update punya super admin
                            ) {
                        return true;
                    }
                }
                return false;
            }
        );
        return $role[$task];
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$model->attributes=$_POST['User'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$model->attributes=$_POST['User'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['User'])) {
			$model->attributes=$_GET['User'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    public function actionUpdatePassword($id) {
        
		$model=new UpdatePasswordForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['UpdatePasswordForm'])) {
			$model->attributes=$_POST['UpdatePasswordForm'];
			if ($model->validate()) {
                $um = $this->loadModel(Yii::app()->user->id);
                // set new password
                $um->password = $um->encrypt($model->password);
                if($um->update(array('password','update_time'))) { // update hanya password
                    $this->redirect(array('view','id'=>$um->id));
                }
			}
		}

		$this->render('updatePassword',array(
			'model'=>$model,
		));
    }
}