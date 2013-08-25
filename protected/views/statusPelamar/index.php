<?php
/* @var $this StatusPelamarController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Status Pelamar',
);

$this->menu=array(
	array('label'=>'Create StatusPelamar','url'=>array('create')),
	array('label'=>'Manage StatusPelamar','url'=>array('admin')),
);
?>

<h2>Status Pelamar</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>