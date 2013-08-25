<?php
/* @var $this PendaftarController */
/* @var $model Pendaftar */
?>

<?php
$this->breadcrumbs=array(
	'Pendaftar'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pendaftar', 'url'=>array('index')),
	array('label'=>'Create Pendaftar', 'url'=>array('create')),
	array('label'=>'View Pendaftar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pendaftar', 'url'=>array('admin')),
);
?>

    <h2>Update Pendaftar <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>