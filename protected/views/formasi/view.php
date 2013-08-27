<?php
/* @var $this FormasiController */
/* @var $model Formasi */
?>

<?php
$this->breadcrumbs=array(
	'Formasi'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Formasi', 'url'=>array('index')),
	array('label'=>'Create Formasi', 'url'=>array('create')),
	array('label'=>'Update Formasi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Formasi', 'url'=>'#', 'linkOptions'=>array('csrf'=>true, 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Formasi', 'url'=>array('admin')),
);
?>

<h2>Tampilkan Formasi #<?php echo $model->id; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
//		'id',
		'tahun_test',
//		'id_instansi',
        array(
            'name'=>'id_instansi',
            'value'=>$model->idInstansi->nama
        ),
//		'id_tenaga_dilamar',
        array(
            'name'=>'id_tenaga_dilamar',
            'value'=>$model->idTenagaDilamar->nama
        ),
//		'id_jabatan',
        array(
            'name'=>'id_jabatan',
            'value'=>$model->idJabatan->nama
        ),
//		'id_kual_pend',
        array(
            'name'=>'id_kual_pend',
            'value'=>$model->idKualPend->nama
        ),
        'IPK',
	),
)); ?>