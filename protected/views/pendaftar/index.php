<?php
/* @var $this PendaftarController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Pendaftar',
);

$this->menu=array(
	array('label'=>'Create Pendaftar','url'=>array('create')),
	array('label'=>'Manage Pendaftar','url'=>array('admin')),
);
?>

<h2>Pendaftar</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>