<?php
/* @var $this PendaftarController */
/* @var $model Pendaftar */
?>

<?php
$this->breadcrumbs=array(
	'Pendaftar'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pendaftar', 'url'=>array('index')),
	array('label'=>'Create Pendaftar', 'url'=>array('create')),
	array('label'=>'Update Pendaftar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pendaftar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pendaftar', 'url'=>array('admin')),
);
?>

<h2>Tampilkan Pendaftar #<?php echo $model->id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'no_ktp',
		'nama',
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
		'kode_verifikasi',
		'id_instansi',
		'id_tenaga_dilamar',
		'id_jabatan',
		'id_formasi',
		'id_kual_pend',
		'id_pendidikan_terakhir',
		'id_lokasi_test',
		'id_status_pelamar',
	),
)); ?>