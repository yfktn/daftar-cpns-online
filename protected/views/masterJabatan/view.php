<?php
/* @var $this MasterJabatanController */
/* @var $model MasterJabatan */
?>

<?php
$this->breadcrumbs=array(
	'Master Jabatan'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterJabatan', 'url'=>array('index')),
	array('label'=>'Create MasterJabatan', 'url'=>array('create')),
	array('label'=>'Update MasterJabatan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterJabatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterJabatan', 'url'=>array('admin')),
);
?>

<h2>Tampilkan MasterJabatan #<?php echo $model->id; ?></h2>

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