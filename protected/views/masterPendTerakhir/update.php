<?php
/* @var $this MasterPendTerakhirController */
/* @var $model MasterPendTerakhir */
?>

<?php
$this->breadcrumbs=array(
	'Master Pend Terakhir'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterPendTerakhir', 'url'=>array('index')),
	array('label'=>'Create MasterPendTerakhir', 'url'=>array('create')),
	array('label'=>'View MasterPendTerakhir', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MasterPendTerakhir', 'url'=>array('admin')),
);
?>

    <h2>Update MasterPendTerakhir <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>