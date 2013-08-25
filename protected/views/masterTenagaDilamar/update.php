<?php
/* @var $this MasterTenagaDilamarController */
/* @var $model MasterTenagaDilamar */
?>

<?php
$this->breadcrumbs=array(
	'Master Tenaga Dilamar'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterTenagaDilamar', 'url'=>array('index')),
	array('label'=>'Create MasterTenagaDilamar', 'url'=>array('create')),
	array('label'=>'View MasterTenagaDilamar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MasterTenagaDilamar', 'url'=>array('admin')),
);
?>

    <h2>Update MasterTenagaDilamar <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>