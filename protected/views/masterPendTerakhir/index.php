<?php
/* @var $this MasterPendTerakhirController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Master Pend Terakhir',
);

$this->menu=array(
	array('label'=>'Create MasterPendTerakhir','url'=>array('create')),
	array('label'=>'Manage MasterPendTerakhir','url'=>array('admin')),
);
?>

<h2>Master Pend Terakhir</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>