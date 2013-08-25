<?php
/* @var $this PrasaratController */
/* @var $model Prasarat */
?>

<?php
$this->breadcrumbs=array(
	'Prasarat'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prasarat', 'url'=>array('index')),
	array('label'=>'Manage Prasarat', 'url'=>array('admin')),
);
?>

<h2>Create Prasarat</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>