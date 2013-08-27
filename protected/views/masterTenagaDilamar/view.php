<?php
/* @var $this MasterTenagaDilamarController */
/* @var $model MasterTenagaDilamar */
?>

<?php
$this->breadcrumbs=array(
	'Master Tenaga Dilamar'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterTenagaDilamar', 'url'=>array('index')),
	array('label'=>'Create MasterTenagaDilamar', 'url'=>array('create')),
	array('label'=>'Update MasterTenagaDilamar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterTenagaDilamar', 'url'=>'#', 'linkOptions'=>array('csrf'=>true, 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterTenagaDilamar', 'url'=>array('admin')),
);
?>

<h2>Tampilkan MasterTenagaDilamar #<?php echo $model->id; ?></h2>

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