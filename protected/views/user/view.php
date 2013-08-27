<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('csrf'=>true, 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h2>Tampilkan User #<?php echo $model->id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
//		'id',
		'user_name',
//		'salt_key',
//		'password',
		'id_instansi',
		'last_login',
		'level',
		'last_login_IP',
		'create_time',
		'update_time',
	),
)); ?>