<?php
/* @var $this MasterKualPendController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Master Kual Pend',
);

$this->menu=array(
	array('label'=>'Create MasterKualPend','url'=>array('create')),
	array('label'=>'Manage MasterKualPend','url'=>array('admin')),
);
?>

<h2>Master Kual Pend</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>