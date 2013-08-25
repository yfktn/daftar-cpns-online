<?php
/* @var $this PendaftarController */
/* @var $model Pendaftar */
/* @var $form TbActiveForm */
?>
<?php if(Yii::app()->user->hasFlash('pesan')): ?>
    <?php echo TbHtml::alert(
            TbHtml::ALERT_COLOR_INFO, 
            '<b>'. Yii::app()->user->getFlash('pesan').'</b>'); ?>
<?php endif; ?>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'pendaftar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    <p> 
    <?php echo TbHtml::labelTb(TbHtml::icon(TbHtml::ICON_FLAG). 'Perhatian:',
            array('color'=>  TbHtml::LABEL_COLOR_IMPORTANT)); ?>
            Isian dengan tanda <span class="required">*</span> <b>WAJIB DIISIKAN</b>.
    </p>
    <?php echo $form->errorSummary($model); ?>
        <fieldset>
            <h3>Isian Pilihan Formasi</h3>
            <?php // echo $form->textFieldControlGroup($model,'id_instansi',array('span'=>5,'maxlength'=>10));
                echo $form->dropDownListControlGroup($model, 'id_instansi', MasterInstansi::listData(), 
                        $htmlOptions=array('span'=>3,
                            'prompt'=>'Silahkan Pilih Instansi',
                            'ajax'=>array(
                                'type'=>'POST',
                                'url'=>array('/pendaftar/renderIsianFormasi'),
                                'data'=>array(
                                    'id_instansi'=>'js:this.value',
                                    'model_name'=>'Pendaftar',
                                    'attribute'=>'id_formasi',
                                    'YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken,
                                ),
                                'update'=>'#target-formasi'
                            )));
            ?>
                <div id="target-formasi">
                    <?php if(!isset($model->id_formasi[0]) && !isset($model->id_instansi[0])): // belum memilih? ?>
                            <?php 
                                echo $form->hiddenField($model, 'id_formasi');
                                //echo $form->textFieldControlGroup($model,'id_formasi',array('span'=>5,'maxlength'=>32));
                            ?>
                            <p class="help-block">Pilih Instansi dahulu untuk menampilkan pilihan formasi</p>
                    <?php else: // LOAD ?>
                            <?php $this->renderIsianPilihanFormasi(
                                    $model->id_instansi,
                                    'Pendaftar',
                                    'id_formasi',
                                    $model->id_formasi); 
                            ?>
                    <?php endif; ?>
                </div>
                <?php echo $form->error($model,'id_formasi', $htmlOptions=array('class'=>'error')); ?>
        </fieldset>
    
        <fieldset>
            <h3>Data Pribadi Pelamar</h3>
            <?php echo $form->textFieldControlGroup($model,'no_ktp',$htmlOptions=array('span'=>5,'maxlength'=>45, 
                'help'=>'Menggunakan nomor KTP lebih dari satu adalah sebuah pelanggaran hukum, peserta yang kedapatan menggunakan lebih dari satu KTP akan digugurkan.',
                'helpOptions'=>array('type'=>  TbHtml::HELP_TYPE_BLOCK))
            ); ?>
            
            <?php echo $form->textFieldControlGroup($model,'nama',array('span'=>5,'maxlength'=>60)); ?>
            
            <?php echo $form->textFieldControlGroup($model,'alamat_sekarang',array('span'=>5,'maxlength'=>400,
                'help'=>'Isikan dengan alamat yang bisa dihubungi atau bisa dicapai melalui layanan surat menyurat.',
                'helpOptions'=>array('type'=>  TbHtml::HELP_TYPE_BLOCK))
            ); ?>
            
            <?php echo $form->textFieldControlGroup($model,'no_hp',array('span'=>5,'maxlength'=>25)); ?>
                
            <?php echo $form->radioButtonListControlGroup($model,'jenis_kelamin', Pendaftar::getListDataJenisKelamin()); ?>

            <?php echo $form->textFieldControlGroup($model,'tempat_lahir',array('span'=>5,'maxlength'=>45)); ?>
            <!--<div class="row">-->
                <?php echo $form->labelEx($model,'tanggal_lahir', array('class'=>'control-label')); ?>
                <?php 
                $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                        'attribute' => 'tanggal_lahir',
                        'model'=>$model,
                        'pluginOptions' => array(
                            'format' => 'dd-mm-yyyy'
                        )
                    ));
//                    echo $form->dateFieldControlGroup($model, 'tempat_lahir', $htmlOptions=array('format'=>'dd/mm/yyyy'));
                ?>
                <span class="add-on"><icon class="icon-calendar"></icon></span>
                <?php echo $form->error($model,'tanggal_lahir', $htmlOptions=array('class'=>'error')); ?>
                <p class="help-block">Gunakan fasilitas kalendar atau isikan dengan menggunakan format <b>dd-mm-yyyy</b> (tanggal-bulan-tahun)</p>
            <!--</div>-->
            <?php // echo $form->textFieldControlGroup($model,'tanggal_lahir',array('span'=>5)); ?>
        </fieldset>
    
        <fieldset>
            <h3>Isian Data Pendidikan Pelamar</h3>

            <?php // echo $form->textFieldControlGroup($model,'id_pendidikan_terakhir',array('span'=>3,'maxlength'=>10)); 
                echo $form->dropDownListControlGroup($model, 
                        'id_pendidikan_terakhir', 
                        MasterPendTerakhir::listData(),
                        $htmlOptions=array('prompt'=>'Pilih Pendidikan Terakhir')
                        );
            ?>
            
            <?php echo $form->textFieldControlGroup($model,'nama_sekolah_terakhir',array('span'=>8,'maxlength'=>300)); ?>

            <?php echo $form->textFieldControlGroup($model,'alamat_sekolah_terakhir',array('span'=>8,'maxlength'=>400)); ?>
            
            <?php echo $form->textFieldControlGroup($model,'tahun_lulus',array('span'=>3)); ?>
            
            <?php echo $form->textFieldControlGroup($model,'jurusan',array('span'=>7,'maxlength'=>300)); ?>

            <?php echo $form->textFieldControlGroup($model,'IPK',array('span'=>1,
                'help'=>'Sebagai contoh penulisan: 3.5 (gunakan titik untuk tanda desimal)',
                'helpOptions'=>array('type'=>  TbHtml::HELP_TYPE_BLOCK))); ?>
        </fieldset>

        <div class="form-actions">
            <?php echo $form->hiddenField($model, 'status_scenario'); ?>
            <?php echo TbHtml::submitButton('Review Isian',array(
                'color'=>TbHtml::BUTTON_COLOR_INFO,
                'size'=>TbHtml::BUTTON_SIZE_LARGE,
                'name'=>'submit',
                'value'=>Pendaftar::STATUS_MASIH_PREVIEW
            )); ?>
            <?php if($model->status_scenario==Pendaftar::STATUS_BISA_SERAHKAN): ?>
                <?php echo TbHtml::submitButton('Serahkan Isian',array(
                    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                    'name'=>'submit',
                    'value'=>Pendaftar::STATUS_BISA_SERAHKAN
                )); ?>
            <?php endif; ?>
            <p class="help-block">Klik <b>[Review Isian]</b> untuk melakukan review terhadap isian dan <b>[Serahkan Isian]</b> untuk menyimpan data dan menyerahkan isian untuk di verifikasi.</p>
        </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->