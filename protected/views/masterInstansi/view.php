<?php
/* @var $this MasterInstansiController */
/* @var $model MasterInstansi */

$this->breadcrumbs=array(
	'Master Instansis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterInstansi', 'url'=>array('index')),
	array('label'=>'Create MasterInstansi', 'url'=>array('create')),
	array('label'=>'Update MasterInstansi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterInstansi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterInstansi', 'url'=>array('admin')),
);
?>

<h2>View MasterInstansi #<?php echo $model->id; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>
