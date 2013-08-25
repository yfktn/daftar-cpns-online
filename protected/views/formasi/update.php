<?php
/* @var $this FormasiController */
/* @var $model Formasi */
?>

<?php
$this->breadcrumbs=array(
	'Formasi'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Formasi', 'url'=>array('index')),
	array('label'=>'Create Formasi', 'url'=>array('create')),
	array('label'=>'View Formasi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Formasi', 'url'=>array('admin')),
);
?>

    <h2>Update Formasi <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>