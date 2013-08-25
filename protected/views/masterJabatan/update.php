<?php
/* @var $this MasterJabatanController */
/* @var $model MasterJabatan */
?>

<?php
$this->breadcrumbs=array(
	'Master Jabatan'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterJabatan', 'url'=>array('index')),
	array('label'=>'Create MasterJabatan', 'url'=>array('create')),
	array('label'=>'View MasterJabatan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MasterJabatan', 'url'=>array('admin')),
);
?>

    <h2>Update MasterJabatan <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>