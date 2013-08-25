<?php
/* @var $this StatusPelamarController */
/* @var $model StatusPelamar */
?>

<?php
$this->breadcrumbs=array(
	'Status Pelamar'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusPelamar', 'url'=>array('index')),
	array('label'=>'Manage StatusPelamar', 'url'=>array('admin')),
);
?>

<h2>Create StatusPelamar</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>