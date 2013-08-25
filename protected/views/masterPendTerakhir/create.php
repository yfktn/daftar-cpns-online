<?php
/* @var $this MasterPendTerakhirController */
/* @var $model MasterPendTerakhir */
?>

<?php
$this->breadcrumbs=array(
	'Master Pend Terakhir'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterPendTerakhir', 'url'=>array('index')),
	array('label'=>'Manage MasterPendTerakhir', 'url'=>array('admin')),
);
?>

<h2>Create MasterPendTerakhir</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>