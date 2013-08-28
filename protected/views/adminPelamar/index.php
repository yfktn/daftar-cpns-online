<?php
/* @var $this PendaftarController */
/* @var $model Pendaftar */


$this->breadcrumbs=array(
	'Pendaftar'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pelamar', 'url'=>array('index')),
//	array('label'=>'Create Pelamar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pendaftar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>List Pelamar</h2>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pendaftar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'kode_verifikasi',
		'no_ktp',
		'nama',
		'id_status_pelamar',
		/*
		'alamat_sekarang',
		'no_hp',
		'jenis_kelamin',
		'tahun_lulus',
		'jurusan',
		'IPK',
		'nama_sekolah_terakhir',
		'alamat_sekolah_terakhir',
		'tempat_lahir',
		'tanggal_lahir',
		'create_time',
		'update_time',
		'terverifikasi',
		'id_verifikator',
		'id_instansi',
		'id_tenaga_dilamar',
		'id_jabatan',
		'id_formasi',
		'id_kual_pend',
		'id_pendidikan_terakhir',
		'id_lokasi_test',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>