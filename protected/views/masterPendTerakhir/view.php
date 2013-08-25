<?php
/* @var $this MasterPendTerakhirController */
/* @var $model MasterPendTerakhir */
?>

<?php
$this->breadcrumbs=array(
	'Master Pend Terakhir'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterPendTerakhir', 'url'=>array('index')),
	array('label'=>'Create MasterPendTerakhir', 'url'=>array('create')),
	array('label'=>'Update MasterPendTerakhir', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterPendTerakhir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterPendTerakhir', 'url'=>array('admin')),
);
?>

<h2>Tampilkan MasterPendTerakhir #<?php echo $model->id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'nama',
	),
)); ?>