<?php
/* @var $this PendaftarController */
/* @var $model Pendaftar */
?>

<?php
$this->breadcrumbs=array(
	'Pendaftar'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pendaftar', 'url'=>array('index')),
	array('label'=>'Manage Pendaftar', 'url'=>array('admin')),
);
?>

<h2>Create Pendaftar</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>