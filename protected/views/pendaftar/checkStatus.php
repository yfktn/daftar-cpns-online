<?php
/* @var $this PendaftarController */
/* @var $model CheckStatusForm */
/* @var $form TbActiveForm */
?>

<?php
$this->breadcrumbs=array(
//	'Pendaftar'=>array('index'),
	"Check Data Diserahkan",
);?>

<h2>Check Data Diserahkan</h2>

<div class="form">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'check-status-form',
//	'enableClientValidation'=>true,
//	'clientOptions'=>array(
//		'validateOnSubmit'=>true,
//    ),
	'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>
    
    <?php echo $form->textFieldControlGroup($model,'kode',array('span'=>4,'maxlength'=>45,
        'value'=>$model->kode,
        'help'=>'Anda bisa mengisikannya dengan Kode Verifikasi atau Isikan dengan Nomor KTP yang digunakan untuk mendaftar',
        'helpOptions'=>array('type'=>  TbHtml::HELP_TYPE_BLOCK))); ?>
    

	<?php if(CCaptcha::checkRequirements()): ?>
        <div class="row">
            <?php echo $form->labelEx($model,'verifyCode'); ?>
            <div>
            <?php $this->widget('CCaptcha', array('buttonType'=>'button','buttonLabel'=>'Ganti Dengan Kode Baru')); ?>
            <div class="hint">Ketikkan semua karakter yang bisa Anda lihat diatas pada isian dibawah ini!
                <br/><?php echo TbHtml::labelTb(
                 TbHtml::icon(TbHtml::ICON_FLAG), 
                        $htmlOptions=array('color'=>  TbHtml::LABEL_COLOR_IMPORTANT));?> Huruf besar dan kecil tidak berpengaruh.</div>
            <?php echo $form->textField($model,'verifyCode'); ?>
            </div>
            <?php echo $form->error($model,'verifyCode', $htmlOptions=array('class'=>'error')); ?>
        </div>
	<?php endif; ?>
    
    <?php echo TbHtml::submitButton('Check',array(
        'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
        'size'=>TbHtml::BUTTON_SIZE_LARGE,
        'name'=>'submit',
    )); ?>
<?php $this->endWidget(); ?>
</div><!-- form -->

<?php if($success): ?>

    <?php $this->widget('zii.widgets.CDetailView',array(
        'htmlOptions' => array(
            'class' => 'table table-striped table-condensed table-hover',
        ),
        'data'=>$model->pendaftar,
        'attributes'=>array(
    //		'id',
            'no_ktp',
            'kode_verifikasi',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat_sekarang',
            'no_hp',
    //		'id_instansi',
            array(
                'name'=>'id_instansi',
                'value'=>$model->pendaftar->idFormasi->idInstansi->nama,
            ),
    //		'id_formasi',
            array(
                'name'=>'id_formasi',
                'value'=>$model->pendaftar->idFormasi->formasiStr,
            ),
    //		'jenis_kelamin',
            array(
                'name'=>'jenis_kelamin',
                'value'=>$model->pendaftar->jenis_kelamin==0?'Laki-Laki':'Perempuan',
            ),
    //		'id_pendidikan_terakhir',
            array(
                'name'=>'id_pendidikan_terakhir',
                'value'=>$model->pendaftar->idPendidikanTerakhir->nama,
            ),
            'nama_sekolah_terakhir',
            'alamat_sekolah_terakhir',
            'jurusan',
            'tahun_lulus',
            'IPK',
//            'terverifikasi',
    //		'id_verifikator',
    //		'id_tenaga_dilamar',
    //		'id_jabatan',
    //		'id_kual_pend',
//            'id_lokasi_test',
//            'id_status_pelamar',
//            'create_time',
//            'update_time',
        ),
    )); ?>
    <?php echo TbHtml::linkButton('Formulir Isian CPNS', $htmlOptions=array(
        'url'=>array('praVerifikasi', 'kode'=>$model->pendaftar->kode_verifikasi),
    )); ?>
<br>
<?php endif; ?>
