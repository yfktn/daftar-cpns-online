<?php
$this->breadcrumbs = array(
    'Pelamar' => array('index'),
    'Update Status Pelamar',
);
?>

<h2>Update Status Berkas Pelamar <?php echo $namapelamar; ?></h2>
<?php
/* @var $this UserController */
/* @var $model Pendaftar */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'update-stat-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    // echo $form->textFieldControlGroup($model,'id_pendidikan_terakhir',array('span'=>3,'maxlength'=>10)); 
    echo $form->dropDownListControlGroup($model, 'status_pelamar', 
        StatusPelamar::listData(), $htmlOptions = array('prompt' => 'Pilih Status Pelamar')
    );
    ?>
    <div class="form-actions">
        <?php
        echo TbHtml::submitButton('Update Status', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->