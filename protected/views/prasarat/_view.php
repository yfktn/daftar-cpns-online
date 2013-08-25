<?php
/* @var $this PrasaratController */
/* @var $data Prasarat */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idInstansi->nama.' :: '.$data->tahun),array('view','id'=>$data->id)); ?>
	<br />

<?php /*

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
	<?php echo CHtml::encode($data->id_instansi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('prasarat')); ?>:</b>
	<?php echo CHtml::encode($data->prasarat); ?>
	<br />
*/
?>

</div>