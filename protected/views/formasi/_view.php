<?php
/* @var $this FormasiController */
/* @var $data Formasi */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
	<?php echo CHtml::encode($data->id_instansi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tenaga_dilamar')); ?>:</b>
	<?php echo CHtml::encode($data->id_tenaga_dilamar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->id_jabatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kual_pend')); ?>:</b>
	<?php echo CHtml::encode($data->id_kual_pend); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_test')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_test); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IPK')); ?>:</b>
	<?php echo CHtml::encode($data->IPK); ?>
	<br />
    <hr>
</div>