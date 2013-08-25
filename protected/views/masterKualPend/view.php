<?php
/* @var $this MasterKualPendController */
/* @var $model MasterKualPend */
?>

<?php
$this->breadcrumbs=array(
	'Master Kual Pend'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterKualPend', 'url'=>array('index')),
	array('label'=>'Create MasterKualPend', 'url'=>array('create')),
	array('label'=>'Update MasterKualPend', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterKualPend', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterKualPend', 'url'=>array('admin')),
);
?>

<h2>Tampilkan MasterKualPend #<?php echo $model->id; ?></h2>

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