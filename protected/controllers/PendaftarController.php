<?php

class PendaftarController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete, renderIsianFormasi', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array( 'daftar', 'renderIsianFormasi', 'praVerifikasi', 'checkStatus', 'captcha'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','create','update','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $this->layout = 'column1';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pendaftar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Pendaftar'])) {
			$model->attributes=$_POST['Pendaftar'];
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

		if (isset($_POST['Pendaftar'])) {
			$model->attributes=$_POST['Pendaftar'];
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
		$dataProvider=new CActiveDataProvider('Pendaftar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pendaftar('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Pendaftar'])) {
			$model->attributes=$_GET['Pendaftar'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pendaftar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pendaftar::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pendaftar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='pendaftar-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    /**
     * Saat pertama kali melakukan pendaftaran, janganlangsung disimpan. Tapi
     * tampilkan lagi kepada peserta tentang apa yang sudah di input oleh Peserta
     * SCENARIO
     * + bila baru tampilkan form dan tombol [review]
     * + setelah dari tombol review dan TIDAK ADA ERROR maka muncul tombol [serahkan formulir pendaftaran]
     */
    public function actionDaftar() {
        $this->layout = 'column1';
		$model=new Pendaftar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Pendaftar'])) {
			$model->attributes=$_POST['Pendaftar'];
            // apabila masih preview maka ...
            if($model->status_scenario==Pendaftar::STATUS_MASIH_PREVIEW) {
                // validasi
                if($model->validate()) {
                    // apabila divalidasi tidak ada kesalahan, maka naikkan
                    // status menjadi bisa diserahkan
                    $model->status_scenario=Pendaftar::STATUS_BISA_SERAHKAN;
                }
            } elseif($model->status_scenario==Pendaftar::STATUS_BISA_SERAHKAN) {
                // apabila sudah bisa diserahkan jangan lupa divalidasi lagi ...
                if($model->validate()) {
                    // bila tidak ada error DAN pendaftar memilih untuk menyerahkan maka lakukan proses penyimpanan ...
                    if((int)Yii::app()->request->getPost('submit', Pendaftar::STATUS_MASIH_PREVIEW)==Pendaftar::STATUS_BISA_SERAHKAN) {
                        // simpan tapi tidak usah lagi di validasi
                        if ($model->save(false)) {
                            // setelah tersimpan maka lempar ke pra-verifikasi
                            $this->redirect(array('praVerifikasi', 'kode'=>$model->kode_verifikasi));
                        } else {
                            $model->addError('id', 'UNKNOWN ERROR!');
                            // todo: kirimkan email ke admin SEGERA!
                            Yii::log('GASWAT: UNKNOWN ERROR saat menyimpan Pendaftar', CLogger::LEVEL_ERROR);
                        }
                    }
                } else {
                    // apabila tidak tervalidasi maka reset status menjadi masih preview
                    $model->status_scenario=Pendaftar::STATUS_MASIH_PREVIEW;
                }
            }
        }
        // bila sudah bisa diserahkan maka tampilkan pesan bahwa data hanya bisa diserahkan satu kali
        if($model->status_scenario==Pendaftar::STATUS_BISA_SERAHKAN) {
            $pesan=TbHtml::labelTb('Perhatian:', array('color'=>  TbHtml::LABEL_COLOR_IMPORTANT));
            $pesan=<<<PESAN
Silahkan klik tombol <b>[Serahkan Isian]</b> yang terdapat di bawah formulir untuk menyerahkan isian Formulir Pendaftaran Anda agar segera di evaluasi. 
<br><br>
            {$pesan} Isian yang sudah tersimpan dan diserahkan tidak dapat diubah lagi. Pastikan saat Anda mengklik tombol <b>[Serahkan Isian]</b>, Isian Anda sudah benar.
PESAN;
            Yii::app()->user->setFlash('pesan',
                $pesan);
        }

		$this->render('daftar',array(
			'model'=>$model,
		));
    }
    
    /**
     * Akan memperlihatkan apa yang sudah diisikan oleh peserta dan juga menunjukkan
     * kode verifikasi agar bisa digunakan oleh Peserta.
     * 
     * Bila tidak berasal dari pendaftar/daftar dan pendaftar/checkStatus maka akan di redirect ke checkStatus.
     * 
     * @param int $id pendaftar
     */
    public function actionPraVerifikasi($kode) {
        $this->layout = 'column1';
        $urlReferrer = Yii::app()->request->urlReferrer;
        if(strcasecmp($urlReferrer, Yii::app()->createAbsoluteUrl('/pendaftar/checkStatus'))!=0 && 
                strcasecmp($urlReferrer, Yii::app()->createAbsoluteUrl('/pendaftar/daftar'))!=0) {
            $this->redirect(array('checkStatus'));
        }
		$model=Pendaftar::model()->find('kode_verifikasi=:kode', array(':kode'=>$kode));
		if ($model===null) {
			throw new CHttpException(404,"Pelamar dengan kode verifikasi $kode tersebut tidak ada.");
		}
        // bila dari pendaftaran tampilkan pesan sponsor :D
        if(strcasecmp($urlReferrer, Yii::app()->createAbsoluteUrl('/pendaftar/daftar'))==0) {
            Yii::app()->user->setFlash('pesan',
                "Kode verifikasi Anda adalah: <b>{$model->kode_verifikasi}</b> dan dapat digunakan untuk melakukan checking terhadap status formulir pendaftaran Anda. <br>Silahkan cetak halaman ini untuk arsip Anda dengan menekan tombol CTRL + P atau dari menu untuk mencetak halaman web milik masing-masing browser.");
        }
		$this->render('praVerifikasi',array(
			'model'=>$model,
		));
    }
    
    /**
     * Render isian untuk pilihan isian formasi!
     * dipanggil oleh panggilan AJAX
     */
    public function actionRenderIsianFormasi() {
        $req = Yii::app()->request;
//        $id_instansi = $req->getPost('id_instansi');
        $this->renderIsianPilihanFormasi(
                $req->getPost('id_instansi'), 
                $req->getPost('model_name'), 
                $req->getPost('attribute')
            );
    }
    
    /**
     * Disini tempat untuk melakukan render
     * @param type $id_instansi
     * @param type $model_name
     * @param type $attribute
     * @param type $value
     */
    public function renderIsianPilihanFormasi($id_instansi, $model_name, $attribute, $value=0) {
        $failed = false;
        if($id_instansi!==null && isset($id_instansi[0])) {
            // load data first
            $data = Formasi::model()->getFormated(Yii::app()->params['yearTest'], 
                    Yii::app()->request->getPost('id_instansi')
                );
            if($data!==null) {
                // render
                $this->renderPartial('_isianFormasi', array(
                    'data'=>$data,
                    'model_name'=>$model_name,
                    'attribute_name'=>$attribute,
                    'value'=>$value,
                ));
            } else { 
                $failed = true;
            }
        } else {
            $failed = true;
        }
        if($failed) {
            echo '<p class="help-block">Gagal mendapatkan formasi atau silahkan pilih Instansi dahulu untuk menampilkan pilihan formasi.</p>';
        }
    }
    
    /**
     * todo: buat untuk check status verifikasi
     */
    public function actionCheckStatus() {
        $model = new CheckStatusForm;
        $success = false;
        
		// if it is ajax validation request
//		if(isset($_POST['ajax']) && $_POST['ajax']==='check-status-form')
//		{
//			echo CActiveForm::validate($model);
//			Yii::app()->end();
//		}

		// collect user input data
		if(isset($_POST['CheckStatusForm']))
		{
			$model->attributes=$_POST['CheckStatusForm'];
			// validate user input and redirect to the previous page if valid
            $success = $model->validate();
		}
		// display the login form
		$this->render('checkStatus',array(
            'model'=>$model, 
            'success'=>$success)
        );
        
    }
    
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}
}