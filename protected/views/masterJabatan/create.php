<?php
/* @var $this MasterJabatanController */
/* @var $model MasterJabatan */
?>

<?php
$this->breadcrumbs=array(
	'Master Jabatan'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterJabatan', 'url'=>array('index')),
	array('label'=>'Manage MasterJabatan', 'url'=>array('admin')),
);
?>

<h2>Create MasterJabatan</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>