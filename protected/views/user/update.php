<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

    <h2>Update User <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>