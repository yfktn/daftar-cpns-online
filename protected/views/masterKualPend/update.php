<?php
/* @var $this MasterKualPendController */
/* @var $model MasterKualPend */
?>

<?php
$this->breadcrumbs=array(
	'Master Kual Pend'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterKualPend', 'url'=>array('index')),
	array('label'=>'Create MasterKualPend', 'url'=>array('create')),
	array('label'=>'View MasterKualPend', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MasterKualPend', 'url'=>array('admin')),
);
?>

    <h2>Update MasterKualPend <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>