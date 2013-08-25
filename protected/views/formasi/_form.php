<?php
/* @var $this FormasiController */
/* @var $model Formasi */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'formasi-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php // echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>32)); ?>

            <?php // echo $form->textFieldControlGroup($model,'id_instansi',array('span'=>5,'maxlength'=>10)); 
                echo $form->dropDownListControlGroup($model, 'id_instansi', MasterInstansi::listData());
            ?>

            <?php // echo $form->textFieldControlGroup($model,'id_tenaga_dilamar',array('span'=>5,'maxlength'=>10)); 
                echo $form->dropDownListControlGroup($model, 'id_tenaga_dilamar', MasterTenagaDilamar::listData());
            ?>

            <?php // echo $form->textFieldControlGroup($model,'id_jabatan',array('span'=>5,'maxlength'=>10)); 
                echo $form->dropDownListControlGroup($model, 'id_jabatan', MasterJabatan::listData());
            ?>

            <?php // echo $form->textFieldControlGroup($model,'id_kual_pend',array('span'=>5,'maxlength'=>10));
                echo $form->dropDownListControlGroup($model, 'id_kual_pend', MasterKualPend::listData());
            ?>

            <?php echo $form->textFieldControlGroup($model,'tahun_test',array('value'=>  Yii::app()->params['yearTest'], 'span'=>1)); ?>
    

            <?php echo $form->textFieldControlGroup($model,'IPK',array('span'=>1,
                'help'=>'Sebagai contoh penulisan: 3.5 (gunakan titik untuk tanda desimal)',
                'helpOptions'=>array('type'=>  TbHtml::HELP_TYPE_BLOCK))); ?>
            <?php echo TbHtml::labelTb(TbHtml::icon(TbHtml::ICON_FIRE).' '. 'Apabila Nilai adalah 0 maka minimal IPK akan diambil dari isian Prasarat Formasi berdasarkan pendidikan terakhir Pelamar',
                    $htmlOptions=array('color'=>  TbHtml::LABEL_COLOR_WARNING)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->