<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'user_name',array('span'=>5,'maxlength'=>45)); ?>

            <?php // echo $form->textFieldControlGroup($model,'salt_key',array('span'=>5,'maxlength'=>10)); ?>

            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>32, 'value'=>'')); ?>

            <?php echo $form->passwordFieldControlGroup($model,'password_repeat',array('span'=>5,'maxlength'=>32)); ?>

            <?php // echo $form->textFieldControlGroup($model,'id_instansi',array('span'=>5,'maxlength'=>10)); 
                echo $form->dropDownListControlGroup($model, 'id_instansi', MasterInstansi::listData());
            ?>

            <?php // echo $form->textFieldControlGroup($model,'last_login',array('span'=>5)); ?>

            <?php // echo $form->textFieldControlGroup($model,'level',array('span'=>5,'maxlength'=>20)); 
                echo $form->dropDownListControlGroup($model, 'level', YFLevelLookup::getListData());
            ?>

            <?php // echo $form->textFieldControlGroup($model,'last_login_IP',array('span'=>5,'maxlength'=>20)); ?>

            <?php // echo $form->textFieldControlGroup($model,'create_time',array('span'=>5)); ?>

            <?php // echo $form->textFieldControlGroup($model,'update_time',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->