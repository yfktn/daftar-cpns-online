<?php
/* @var $this MasterKualPendController */
/* @var $model MasterKualPend */
?>

<?php
$this->breadcrumbs=array(
	'Master Kual Pend'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterKualPend', 'url'=>array('index')),
	array('label'=>'Manage MasterKualPend', 'url'=>array('admin')),
);
?>

<h2>Create MasterKualPend</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>