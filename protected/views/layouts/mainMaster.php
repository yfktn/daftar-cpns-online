<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <?php Yii::app()->bootstrap->register(); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <style>
        @media print {
            #header, #mainmenu, #breadcrumb, #footer { display: none; }
        }
    </style>

</head>

<body>

<div class="container">

	<div class="row" id="header">
        <div class="span12">
            <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
        </div>
	</div><!-- header -->
    
    <div class="row" id="mainmenu">
        <div class="span12">
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
            'brandLabel' => 'CPNS',
             'color' => TbHtml::NAVBAR_COLOR_INVERSE,
            'collapse'=>true,
            'display' => null, // default is static to top
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbNav',
                    'items' => array(
                        array('label'=>'Beranda', 'url'=>array('/master/index')),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Master', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
                                array('label'=>'Master Instansi', 'url'=>array('masterInstansi/index')),
                                array('label'=>'Master Tenaga Dilamar', 'url'=>array('masterTenagaDilamar/index')),
                                array('label'=>'Master Jabatan', 'url'=>array('masterJabatan/index')),
                                array('label'=>'Master Kualifikasi Pendidikan', 'url'=>array('masterKualPend/index')),
                                array('label'=>'Master Pendidikan Terakhir', 'url'=>array('masterPendTerakhir/index')),
                        )),
                        array('label'=>'User', 'url'=>array('user/index')),
                        array('label'=>'Formasi', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
                            array('label'=>'Prasarat Formasi', 'url'=>array('prasarat/index')),
                            array('label'=>'Buat Formasi', 'url'=>array('formasi/index')),
                        )),
                        array('label'=>'Pelamar', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
                            array('label'=>'Status Pelamar', 'url'=>array('statusPelamar/index')),
                            array('label'=>'List Pelamar', 'url'=>array('adminPelamar/index')),
                        )),
                        array('label'=>'Update Password', 'url'=>array('/user/updatePassword', 'id'=>  Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    ),
                ),
            ),
        )); ?>
        </div>
    </div>
    
    <div class="row" id="breadcrumb">
        <div class="span12">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif?>
        </div>
   </div>
   
    <div class="row"><!-- content -->
        <?php echo $content; ?>
    </div>
	<div class="row" id="footer">
        <div class="span12" style="text-align: center; border-top: #fa9f1e solid thin; padding-top: 10px;">
            &copy; <?php echo date('Y'); ?> Tim Pengembangan IT Pemerintah Provinsi Kalimantan Tengah<br/>
            <!--All Rights Reserved.<br/>-->
            <?php // echo Yii::powered(); ?>
        </div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/script/spin.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/script/ajax_global_spinner.js"></script>