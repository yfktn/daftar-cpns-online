<?php

/**
 * This is the model class for table "{{_formasi}}".
 *
 * The followings are the available columns in table '{{_formasi}}':
 * @property string $id
 * @property string $id_instansi
 * @property string $id_tenaga_dilamar
 * @property string $id_jabatan
 * @property string $id_kual_pend
 * @property integer $tahun_test
 * @property double $IPK
 *
 * The followings are the available model relations:
 * @property MasterInstansi $idInstansi
 * @property MasterJabatan $idJabatan
 * @property MasterKualPend $idKualPend
 * @property MasterTenagaDilamar $idTenagaDilamar
 * @property Pendaftar[] $pendaftars
 */
class Formasi extends CActiveRecord
{
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{formasi}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_instansi, id_tenaga_dilamar, id_jabatan, id_kual_pend', 'required'),
			array('tahun_test', 'numerical', 'integerOnly'=>true),
            array('tahun_test','default', 'value'=>Yii::app()->params['yearTest'], 'setOnEmpty'=>false),
            array('id', 'default', 'value'=>'NOT-YET-GEN', 'setOnEmpty'=>true),
			array('id', 'length', 'max'=>32),
            array('IPK', 'numerical', 'min'=>0),
			array('id_instansi, id_tenaga_dilamar, id_jabatan, id_kual_pend', 'length', 'max'=>10),
            array('id', 'unsafe'), // kita set sendiri ...
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_instansi, id_tenaga_dilamar, id_jabatan, id_kual_pend, tahun_test, IPK', 'safe', 'on'=>'search'),
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
			'idInstansi' => array(self::BELONGS_TO, 'MasterInstansi', 'id_instansi'),
			'idJabatan' => array(self::BELONGS_TO, 'MasterJabatan', 'id_jabatan'),
			'idKualPend' => array(self::BELONGS_TO, 'MasterKualPend', 'id_kual_pend'),
			'idTenagaDilamar' => array(self::BELONGS_TO, 'MasterTenagaDilamar', 'id_tenaga_dilamar'),
			'pendaftars' => array(self::HAS_MANY, 'Pendaftar', 'id_formasi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_instansi' => 'Instansi',
			'id_tenaga_dilamar' => 'Tenaga Dilamar',
			'id_jabatan' => 'Jabatan',
			'id_kual_pend' => 'Kualifikasi Pendidikan',
			'tahun_test' => 'Tahun Test',
            'IPK'=>'IPK Minimal/Nilai Rata-Rata minimal Ijazah'
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_instansi',$this->id_instansi,true);
		$criteria->compare('id_tenaga_dilamar',$this->id_tenaga_dilamar,true);
		$criteria->compare('id_jabatan',$this->id_jabatan,true);
		$criteria->compare('id_kual_pend',$this->id_kual_pend,true);
		$criteria->compare('tahun_test',$this->tahun_test);
		$criteria->compare('IPK',$this->IPK);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Formasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * Sebelum melakukan penyimpanan kita lakukan proses perhitungan nilai MD5
     * agar bisa digenerate menjadi nilai ID!
     * Hal ini dilakukan agar bisa mendapatkan panjang nilai yang sama untuk panjang
     * karakter dan memudahkan dalam proses validasi pilihan dari pelamar
     * @return boolean
     */
    public function beforeSave() {
        if(!parent::beforeSave()) return false;
        $str = $this->tahun_test
                .$this->id_instansi
                .  $this->id_tenaga_dilamar
                . $this->id_jabatan
                .  $this->id_kual_pend;
        $this->id = md5($str);
        return true;
    }
    
    /**
     * Dapatkan query dan hasil query dari formasi yang telah di format sedemikian
     * rupa sehingga bisa ditampilkan dalam pola yang di group berdasar
     * tenaga dicari
     * @param type $year
     * @param type $instansi
     * @return type
     */
    public function getFormated($year=0,$instansi=0) {
        $where = array('and');
        $param = array(':fake'=>'0');
        if($year==0) 
            $where[] = 'tahun_test='.(int)Yii::app()->params['yearTest'];
        else
            $where[] = 'tahun_test='.(int)$year;
        
        if($instansi!=0) {
            $where[] = 'id_instansi=:instansi';
            $param += array(':instansi'=>$instansi);
        }
        
        return Yii::app()->db->createCommand()
                ->select('f.id,f.tahun_test,mi.nama as instansi,td.nama as tenaga_dilamar,mj.nama as jabatan,kp.nama as kual_pend')
                ->from('{{formasi}} f')
                ->join('{{master_instansi}} mi', 'mi.id=f.id_instansi')
                ->join('{{master_tenaga_dilamar}} td', 'td.id=f.id_tenaga_dilamar')
                ->join('{{master_jabatan}} mj', 'mj.id=f.id_jabatan')
                ->join('{{master_kual_pend}} kp', 'kp.id=f.id_kual_pend')
                ->where($where, $param)
                ->order('f.id_tenaga_dilamar, f.id_jabatan, f.id_kual_pend')
                ->queryAll();
    }
    
    public function listDataInstansiTenaga() {
        
    }
}
