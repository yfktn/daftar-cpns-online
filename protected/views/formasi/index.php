<?php
/* @var $this FormasiController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Formasi',
);

$this->menu=array(
	array('label'=>'Create Formasi','url'=>array('create')),
	array('label'=>'Manage Formasi','url'=>array('admin')),
);
?>

<h2>Formasi</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>