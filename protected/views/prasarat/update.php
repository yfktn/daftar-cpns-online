<?php
/* @var $this PrasaratController */
/* @var $model Prasarat */
?>

<?php
//$label = '#'.$model->id;
$this->breadcrumbs=array(
	'Prasarat'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prasarat', 'url'=>array('index')),
	array('label'=>'Create Prasarat', 'url'=>array('create')),
	array('label'=>'View Prasarat', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Prasarat', 'url'=>array('admin')),
);
?>

    <h2>Update Prasarat <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>