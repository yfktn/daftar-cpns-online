<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'User',
);

$this->menu=array(
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h2>User</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>