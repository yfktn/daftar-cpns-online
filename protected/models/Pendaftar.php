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
class Pendaftar extends CActiveRecord
{
    const KELAMIN_LAKI_LAKI = 1;
    const KELAMIN_PEREMPUAN = 2;
    
    /**
     * Status scenario akan memperlihatkan status saat ini, apakah hanya masih 
     * terlihat tombol preview atau sudah bisa ditampilkan tombol submit permanent
     * Dalam mode preview maka pendaftar masih bisa melakukan editing pada pilihan
     * dan apabila sudah tidak ada error lagi maka status dari MASIH_PREVIEW
     * ditingkatkan menjadi SUDAH_BISA_PENYERAHAN
     * @var integer
     */
    const STATUS_MASIH_PREVIEW = 1;
    const STATUS_BISA_SERAHKAN = 2;
    public $status_scenario = self::STATUS_MASIH_PREVIEW;
    
    /**
     * @return array pilihan jenis kelamin
     */
    public static function getListDataJenisKelamin() {
        return array(
            self::KELAMIN_LAKI_LAKI => 'Laki-Laki',
            self::KELAMIN_PEREMPUAN => 'Perempuan',
        );
    }
    
    /**
     * @return string jenis kelamin dalam string
     */
    public function getJenisKelaminStr() {
        $a = self::getListDataJenisKelamin();
        return $a[$this->jenis_kelamin];
    }
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pendaftar}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_ktp, nama, alamat_sekarang, no_hp, jenis_kelamin, tahun_lulus, jurusan, IPK, nama_sekolah_terakhir, alamat_sekolah_terakhir, tempat_lahir, tanggal_lahir, id_formasi, id_pendidikan_terakhir, id_instansi', 'required'),
			array('tahun_lulus, terverifikasi, id_verifikator, id_lokasi_test', 'numerical', 'integerOnly'=>true),
            array('no_ktp','unique','className'=>'Pendaftar', 'message'=>'Nomor KTP: {value} sudah digunakan untuk melakukan pendaftaran!'),
			array('IPK', 'numerical'),
			array('no_ktp, tempat_lahir, kode_verifikasi', 'length', 'max'=>45),
			array('nama', 'length', 'max'=>60),
			array('alamat_sekarang, alamat_sekolah_terakhir', 'length', 'max'=>400),
			array('no_hp', 'length', 'max'=>25),
            array('tanggal_lahir', 'date', 'format'=>'dd-MM-yyyy'),
			array('jenis_kelamin', 'length', 'max'=>1),
			array('jurusan, nama_sekolah_terakhir', 'length', 'max'=>300),
			array('id_instansi, id_tenaga_dilamar, id_jabatan, id_kual_pend, id_pendidikan_terakhir', 'length', 'max'=>10),
			array('id_formasi', 'length', 'max'=>32),
			array('create_time, update_time, status_scenario', 'safe'),
            array('kode_verifikasi, tahun_test', 'unsafe'), // kita tentukan sendiri kode_verifikasinya dan tahun test
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, no_ktp, nama, alamat_sekarang, no_hp, jenis_kelamin, tahun_lulus, jurusan, IPK, nama_sekolah_terakhir, alamat_sekolah_terakhir, tempat_lahir, tanggal_lahir, create_time, update_time, terverifikasi, id_verifikator, kode_verifikasi, id_instansi, id_tenaga_dilamar, id_jabatan, id_formasi, id_kual_pend, id_pendidikan_terakhir, id_lokasi_test', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idFormasi' => array(self::BELONGS_TO, 'Formasi', 'id_formasi'),
			'idLokasiTest' => array(self::BELONGS_TO, 'LokasiTest', 'id_lokasi_test'),
			'idPendidikanTerakhir' => array(self::BELONGS_TO, 'MasterPendTerakhir', 'id_pendidikan_terakhir'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'no_ktp' => 'No KTP Aktif',
			'nama' => 'Nama Pada KTP',
			'alamat_sekarang' => 'Alamat Sekarang',
			'no_hp' => 'No HP',
			'jenis_kelamin' => 'Jenis Kelamin',
			'tahun_lulus' => 'Tahun Lulus',
			'jurusan' => 'Jurusan',
			'IPK' => 'Nilai Rata-Rata Ijazah/IPK',
			'nama_sekolah_terakhir' => 'Nama Sekolah Terakhir',
			'alamat_sekolah_terakhir' => 'Alamat Sekolah Terakhir',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'create_time' => 'Waktu Pendaftaran',
			'update_time' => 'Waktu Update Status Pendaftaran',
			'terverifikasi' => 'Status Verifikasi',
			'id_verifikator' => 'Id Verifikator',
			'kode_verifikasi' => 'Kode Verifikasi',
			'id_instansi' => 'Instansi Dilamar',
			'id_tenaga_dilamar' => 'Tenaga Dilamar',
			'id_jabatan' => 'Jabatan Dilamar',
			'id_formasi' => 'Pilihan Formasi yang Dilamar',
			'id_kual_pend' => 'Kualifikasi Pendidikan',
			'id_pendidikan_terakhir' => 'Tingkat Pendidikan',
			'id_lokasi_test' => 'Lokasi Test',
            'id_status_pelamar' => 'Status Berkas Pelamar',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat_sekarang',$this->alamat_sekarang,true);
		$criteria->compare('no_hp',$this->no_hp,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('tahun_lulus',$this->tahun_lulus);
		$criteria->compare('jurusan',$this->jurusan,true);
		$criteria->compare('IPK',$this->IPK);
		$criteria->compare('nama_sekolah_terakhir',$this->nama_sekolah_terakhir,true);
		$criteria->compare('alamat_sekolah_terakhir',$this->alamat_sekolah_terakhir,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('terverifikasi',$this->terverifikasi);
		$criteria->compare('id_verifikator',$this->id_verifikator);
		$criteria->compare('kode_verifikasi',$this->kode_verifikasi,true);
		$criteria->compare('id_instansi',$this->id_instansi,true);
		$criteria->compare('id_tenaga_dilamar',$this->id_tenaga_dilamar,true);
		$criteria->compare('id_jabatan',$this->id_jabatan,true);
		$criteria->compare('id_formasi',$this->id_formasi,true);
		$criteria->compare('id_kual_pend',$this->id_kual_pend,true);
		$criteria->compare('id_pendidikan_terakhir',$this->id_pendidikan_terakhir,true);
		$criteria->compare('id_lokasi_test',$this->id_lokasi_test);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pendaftar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function afterValidate() {
        parent::afterValidate();
        
        // check kelayakan administrasi
        // ditaruh disini agar bisa dilakukan secara massive
        $kelayakan = $this->checkKelayakanAdministrasi();
    }
    
    /**
     * Lakukan setting nilai kode verifikasi
     * @return boolean
     */
    public function beforeSave() {
        if(!parent::beforeSave()) return false;
        if($this->isNewRecord) {
            Yii::import('ext.GeneralHelper');
            // berusaha untuk mengenerate tanpa kena yang sama ..
            $nama = substr(str_pad(str_replace(' ', '', $this->nama),4, 'A', STR_PAD_RIGHT), 0, 4); // hilangkan space dan buat namanya
            $this->kode_verifikasi = strtoupper($nama.GeneralHelper::readableRandomString(Yii::app()->params['verifyCodeLength']));
            $this->tahun_test = Yii::app()->params['yearTest']; // set sendiri tahun test
        }
        // simpan semua field ke dalam satu table besar agar nantinya bisa di 
        // generate report secara lebih cepat ...
        $idFormasi = $this->idFormasi;
        $this->nama_instansi = $idFormasi->idInstansi->nama;
        $this->id_tenaga_dilamar = $idFormasi->idTenagaDilamar->id;
        $this->nama_tenaga_dilamar = $idFormasi->idTenagaDilamar->nama;
        $this->id_jabatan = $idFormasi->idJabatan->id;
        $this->nama_jabatan = $idFormasi->idJabatan->nama;
        $this->id_kual_pend = $idFormasi->idKualPend->id;
        $this->nama_kual_pend = $idFormasi->idKualPend->nama;
        $this->nama_pendidikan_terakhir = $this->idPendidikanTerakhir->nama;
        return true;
    }

    /**
     * TODO: buat untuk melakukan checking terhadap IPK dan juga usia berdasarkan
     * apa yang sudah diset pada prasarat dan berdasar apa yang sudah diset pda
     * data formasi
     * harus diletakkan di beforeSave untuk memastikan bahwa nilai yang lain sudah
     * divalidasi dan valid!
     */
    public function checkKelayakanAdministrasi() {
        if(!isset($this->idFormasi)) return false;
        // dapatkan prasarat dan formasi
        $msg = '';
        $result = true;
        $prasarat = Prasarat::model()->find('id_instansi=:id_instansi and tahun=:tahun', 
                array(':id_instansi'=>$this->idFormasi->id_instansi, ':tahun'=>$this->tahun_test));
        // check prasarat usia
        if(!$prasarat->isUsiaValid($this->tanggal_lahir, $msg)) {
            $this->addError('tanggal_lahir', $msg);
//            Yii::trace($msg);
            $result = false;
        }
        
        // sekarang check berdasarkan IPK, dan ini karena nyantol di formasi jadi tidak
        // lagi nyantol di prasarat; akibat masing-masing kualifikasi pendidikan bisa
        // memiliki IPK yang berbeda!
        $IPKMinimal = 0;
        // 1 - check IPK minimal
        if($this->idFormasi->IPK<=0) { // belum di set maka menggunakan default dari prasarat
            $result = $prasarat->isIPKValid($this->IPK, $this->id_pendidikan_terakhir, $msg);
            if(!$result) {
                $this->addError('IPK', $msg);
            }
        } elseif($this->idFormasi->IPK > 0 && $this->IPK < $this->idFormasi->IPK) {
            $msg = 'IPK minimal dipersyaratkan untuk kualifikasi pendidikan terpilih adalah '.$this->idFormasi->IPK;
            $this->addError('IPK', $msg);
            $result = false;
        }
        return $result;
    }
    
    public function behaviors() {
        return array(
            'dateTimeInternational'=>array(
                'class'=>'ext.DateTimeIntBehavior'
            ),
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true
            )
        );
    }
    
    /**
     * Penolong untuk menunjukkan nama formasi yang dilamar dalam visual yang
     * lebih bisa dibaca
     */
    public function getNamaFormasi() {
        return sprintf("Formasi %s sebagai %s dengan kualifikasi pendidikan %s",
                $this->nama_tenaga_dilamar, 
                $this->nama_jabatan,
                $this->nama_kual_pend);
    }
    
}
