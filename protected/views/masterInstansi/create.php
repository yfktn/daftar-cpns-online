<?php
/* @var $this MasterInstansiController */
/* @var $model MasterInstansi */

$this->breadcrumbs=array(
	'Master Instansis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterInstansi', 'url'=>array('index')),
	array('label'=>'Manage MasterInstansi', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>