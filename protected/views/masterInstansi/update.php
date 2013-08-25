<?php
/* @var $this MasterInstansiController */
/* @var $model MasterInstansi */

$this->breadcrumbs=array(
	'Master Instansis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterInstansi', 'url'=>array('index')),
	array('label'=>'Create MasterInstansi', 'url'=>array('create')),
	array('label'=>'View MasterInstansi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MasterInstansi', 'url'=>array('admin')),
);
?>

<h1>Update MasterInstansi <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>