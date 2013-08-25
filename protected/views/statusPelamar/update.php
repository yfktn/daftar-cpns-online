<?php
/* @var $this StatusPelamarController */
/* @var $model StatusPelamar */
?>

<?php
$this->breadcrumbs=array(
	'Status Pelamar'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusPelamar', 'url'=>array('index')),
	array('label'=>'Create StatusPelamar', 'url'=>array('create')),
	array('label'=>'View StatusPelamar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatusPelamar', 'url'=>array('admin')),
);
?>

    <h2>Update StatusPelamar <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>