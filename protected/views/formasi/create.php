<?php
/* @var $this FormasiController */
/* @var $model Formasi */
?>

<?php
$this->breadcrumbs=array(
	'Formasi'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Formasi', 'url'=>array('index')),
	array('label'=>'Manage Formasi', 'url'=>array('admin')),
);
?>

<h2>Create Formasi</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>