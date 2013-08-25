<?php
/* @var $this MasterJabatanController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Master Jabatan',
);

$this->menu=array(
	array('label'=>'Create MasterJabatan','url'=>array('create')),
	array('label'=>'Manage MasterJabatan','url'=>array('admin')),
);
?>

<h2>Master Jabatan</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>