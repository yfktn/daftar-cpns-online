<?php
/* @var $this MasterTenagaDilamarController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Master Tenaga Dilamar',
);

$this->menu=array(
	array('label'=>'Create MasterTenagaDilamar','url'=>array('create')),
	array('label'=>'Manage MasterTenagaDilamar','url'=>array('admin')),
);
?>

<h2>Master Tenaga Dilamar</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>