<?php
/* @var $this StatusPelamarController */
/* @var $model StatusPelamar */
?>

<?php
$this->breadcrumbs=array(
	'Status Pelamar'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatusPelamar', 'url'=>array('index')),
	array('label'=>'Create StatusPelamar', 'url'=>array('create')),
	array('label'=>'Update StatusPelamar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StatusPelamar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatusPelamar', 'url'=>array('admin')),
);
?>

<h2>Tampilkan StatusPelamar #<?php echo $model->id; ?></h2>

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