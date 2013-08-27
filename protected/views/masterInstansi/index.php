<?php
/* @var $this MasterInstansiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Instansis',
);

$this->menu=array(
	array('label'=>'Create MasterInstansi', 'url'=>array('create')),
	array('label'=>'Manage MasterInstansi', 'url'=>array('admin')),
);
?>

<h2>Master Instansi</h2>

<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
