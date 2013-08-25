<?php
/* @var $this PrasaratController */
/* @var $model Prasarat */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'prasarat-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    // echo $form->textFieldControlGroup($model,'id_instansi',array('span'=>5,'maxlength'=>10)); 
    echo $form->dropDownListControlGroup($model, 'id_instansi', 
            MasterInstansi::listData(), 
            $htmlOptions=array('prompt'=>'Silahkan pilih Instansi'));
    ?>

<?php // echo $form->textFieldControlGroup($model,'tahun',array('span'=>5,'maxlength'=>4));  ?>

        <?php echo $form->textAreaControlGroup($model, 'prasarat', array('rows' => 6, 'span' => 8)); ?>
    <p class="help-block">Isian harus memiliki format array dalam bahasa PHP.</p>

    <div class="form-actions">
        <?php
        echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->