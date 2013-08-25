<?php
/* @var $this MasterTenagaDilamarController */
/* @var $model MasterTenagaDilamar */
?>

<?php
$this->breadcrumbs=array(
	'Master Tenaga Dilamar'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterTenagaDilamar', 'url'=>array('index')),
	array('label'=>'Manage MasterTenagaDilamar', 'url'=>array('admin')),
);
?>

<h2>Create MasterTenagaDilamar</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>