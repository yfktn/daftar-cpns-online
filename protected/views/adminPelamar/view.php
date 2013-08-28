<?php
/* @var $this PendaftarController */
/* @var $model Pendaftar */
?>

<?php
$this->breadcrumbs=array(
	'Pelamar'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pelamar', 'url'=>array('index')),
//	array('label'=>'Create Pelamar', 'url'=>array('create')),
	array('label'=>'Update Pelamar', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Update Status Pelamar', 'url'=>array('updateStatus', 'id'=>$model->id)),
	array('label'=>'Delete Pelamar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pelamar', 'url'=>array('admin')),
);
?>

<h2>Tampilkan Pelamar #<?php echo $model->nama; ?></h2>

<?php $this->widget('zii.widgets.CDetailView',array(
        'htmlOptions' => array(
            'class' => 'table table-striped table-condensed table-hover',
        ),
        'data'=>$model,
        'attributes'=>array(
    //		'id',
            'no_ktp',
            'kode_verifikasi',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat_sekarang',
            'no_hp',
    //		'id_instansi',
    		'nama_instansi',
//            array(
//                'name'=>'id_instansi',
//                'value'=>$model->pendaftar->idFormasi->idInstansi->nama,
//            ),
    //		'id_formasi',
    		'namaFormasi',
//            array(
//                'name'=>'id_formasi',
//                'value'=>$model->pendaftar->idFormasi->formasiStr,
//            ),
    //		'jenis_kelamin',
            array(
                'name'=>'jenis_kelamin',
                'value'=>$model->jenisKelaminStr,
            ),
    //		'id_pendidikan_terakhir',
    		'nama_pendidikan_terakhir',
//            array(
//                'name'=>'id_pendidikan_terakhir',
//                'value'=>$model->pendaftar->idPendidikanTerakhir->nama,
//            ),
            'nama_sekolah_terakhir',
            'alamat_sekolah_terakhir',
            'jurusan',
            'tahun_lulus',
            'IPK',
//            'terverifikasi',
    //		'id_verifikator',
    //		'id_tenaga_dilamar',
    //		'id_jabatan',
    //		'id_kual_pend',
            'id_lokasi_test',
            'id_status_pelamar',
            'create_time',
            'update_time',
        ),
    )); ?>