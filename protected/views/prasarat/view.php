<?php
/* @var $this PrasaratController */
/* @var $model Prasarat */
?>

<?php
$this->breadcrumbs=array(
	'Prasarat'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Prasarat', 'url'=>array('index')),
	array('label'=>'Create Prasarat', 'url'=>array('create')),
	array('label'=>'Update Prasarat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Prasarat', 'url'=>'#', 'linkOptions'=>array('csrf'=>true, 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prasarat', 'url'=>array('admin')),
);
?>

<h2>Tampilkan Prasarat #<?php echo $model->id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
//		'id_instansi',
        array(
            'name'=>'id_instansi',
            'value'=>$model->idInstansi->nama,
        ),
		'tahun',
//		'prasarat',
        array(
            'name'=>'prasarat',
            'value'=>$model->prasaratStr
        )
	),
)); 

?>