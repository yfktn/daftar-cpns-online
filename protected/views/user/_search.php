<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'user_name',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'salt_key',array('span'=>5,'maxlength'=>10)); ?>

                            <?php echo $form->textFieldControlGroup($model,'id_instansi',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'last_login',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'level',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'last_login_IP',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'create_time',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'update_time',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->