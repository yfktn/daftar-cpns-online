<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'update-passw-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
            <?php echo $form->passwordFieldControlGroup($model,'current_password',array('span'=>5,'maxlength'=>32, 'value'=>'')); ?>

            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>32, 'value'=>'')); ?>

            <?php echo $form->passwordFieldControlGroup($model,'password_repeat',array('span'=>5,'maxlength'=>32, 'value'=>'')); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Update Password',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->