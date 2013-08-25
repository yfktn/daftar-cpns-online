<?php
/* @var $this PrasaratController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Prasarat',
);

$this->menu=array(
	array('label'=>'Create Prasarat','url'=>array('create')),
	array('label'=>'Manage Prasarat','url'=>array('admin')),
);
?>

<h2>Prasarat</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>