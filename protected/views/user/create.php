<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h2>Create User</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>