<?php

/**
 * This is the model class for table "{{pendaftar}}".
 *
 * The followings are the available columns in table '{{pendaftar}}':
 * @property integer $id
 * @property string $no_ktp
 * @property string $nama
 * @property string $alamat_sekarang
 * @property string $no_hp
 * @property string $jenis_kelamin
 * @property integer $tahun_lulus
 * @property string $jurusan
 * @property double $IPK
 * @property string $nama_sekolah_terakhir
 * @property string $alamat_sekolah_terakhir
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $create_time
 * @property string $update_time
 * @property integer $terverifikasi
 * @property integer $id_verifikator
 * @property string $kode_verifikasi
 * @property string $id_instansi
 * @property string $id_tenaga_dilamar
 * @property string $id_jabatan
 * @property string $id_formasi
 * @property string $id_kual_pend
 * @property string $id_pendidikan_terakhir
 * @property integer $id_lokasi_test
 *
 * The followings are the available model relations:
 * @property Formasi $idFormasi
 * @property LokasiTest $idLokasiTest
 * @property MasterPendTerakhir $idPendidikanTerakhir
 */
class AdminPelamar extends Pendaftar
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function defaultScope() {
        return array(
            'condition'=>'id_instansi=:idinstansi',
            'params'=>array(':idinstansi'=>  Yii::app()->user->instansi),
        );
    }
}
