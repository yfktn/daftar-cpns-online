<?php
/* @var $this PendaftarController */
/* @var $model Pendaftar */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'no_ktp',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nama',array('span'=>5,'maxlength'=>60)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alamat_sekarang',array('span'=>5,'maxlength'=>400)); ?>

                    <?php echo $form->textFieldControlGroup($model,'no_hp',array('span'=>5,'maxlength'=>25)); ?>

                    <?php echo $form->textFieldControlGroup($model,'jenis_kelamin',array('span'=>5,'maxlength'=>1)); ?>

                    <?php echo $form->textFieldControlGroup($model,'tahun_lulus',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'jurusan',array('span'=>5,'maxlength'=>300)); ?>

                    <?php echo $form->textFieldControlGroup($model,'IPK',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nama_sekolah_terakhir',array('span'=>5,'maxlength'=>300)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alamat_sekolah_terakhir',array('span'=>5,'maxlength'=>400)); ?>

                    <?php echo $form->textFieldControlGroup($model,'tempat_lahir',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'tanggal_lahir',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'create_time',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'update_time',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'terverifikasi',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_verifikator',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'kode_verifikasi',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_instansi',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_tenaga_dilamar',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_jabatan',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_formasi',array('span'=>5,'maxlength'=>32)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_kual_pend',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_pendidikan_terakhir',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_lokasi_test',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_status_pelamar',array('span'=>5,'maxlength'=>2)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->