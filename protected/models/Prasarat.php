<?php

/**
 * This is the model class for table "{{prasarat}}".
 *
 * The followings are the available columns in table '{{prasarat}}':
 * @property integer $id
 * @property string $id_instansi
 * @property string $tahun
 * @property string $prasarat
 *
 * The followings are the available model relations:
 * @property MasterInstansi $idInstansi
 */
class Prasarat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{prasarat}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_instansi, prasarat', 'required'),
			array('id_instansi', 'length', 'max'=>10),
			array('tahun', 'length', 'max'=>4),
            array('tahun','default','value'=> Yii::app()->params['yearTest']),
            array('tahun', 'unsafe'),
            array('prasarat','checkPrasarat'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_instansi, tahun, prasarat', 'safe', 'on'=>'search'),
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
			'tahun' => 'Tahun',
			'prasarat' => 'Format Prasarat',
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
		$criteria->compare('id_instansi',$this->id_instansi,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('prasarat',$this->prasarat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prasarat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function init() {
        parent::init();
        // initialize value of prasarat
        if($this->isNewRecord) {
            $this->prasarat = $this->initPrasarat();
            $this->tahun = Yii::app()->params['yearTest'];
        }
    }
    
    /**
     * Supaya bisa flexible maka dibuatkan format yang harus diisi untuk menentukan
     * prasarat bagi pendaftaran CPNS untuk usia, dan IPK untuk masing-masing
     * pendidikan akhir!
     * @return string format prasarat
     */
    public function initPrasarat() {
        
            // ambil nilai dari master pendidikan
            // dan buat pattern pendidikan untuk ini 
            $pendidikan = MasterPendTerakhir::model()->findAll();
            $patternPend = '';
            if($pendidikan!=null) {
                foreach ($pendidikan as $item) {
                    $patternPend .= sprintf("\n   '%s'=>3, /* IPK minimal %s */", $item->id, $item->nama);
                }
                $patternPend = <<<FORMAT
'IPK'=>array(         /* tetapkan setting IPK minimal masing2 pendidikan akhir */$patternPend
),
FORMAT;
            }
            
            $format = <<<FORMAT
array(
    'umurMaksimal'=>30,   /* tetapkan usia maksimal */
    'umurMinimal'=>18,    /* tetapkan usia minimal */
    'patokanTanggal'=>'2013-12-01',    /* tanggal patokan umur yyyy-mm-dd */
    $patternPend
)
FORMAT;
            return $format;
    }
    
    /**
     * Lakukan validasi terhadap prasarat
     * @param type $attribute
     * @param type $params
     */
    public function checkPrasarat($attribute, $params) {
        $ary = $this->prasaratAry;
        if(!is_array($ary) || count($ary)<1) {
            $this->addError('prasarat', 'Format array tidak valid!');
        } elseif(!array_key_exists('umurMaksimal', $ary)) {
            $this->addError('prasarat', 'Format array tidak valid, harus ada key "umurMaksimal" "umurMinimal" dan "patokanTanggal"!');
        } elseif(!array_key_exists('umurMinimal', $ary)) {
            $this->addError('prasarat', 'Format array tidak valid, harus ada key "umurMaksimal" "umurMinimal" dan "patokanTanggal"!');
        } elseif(!array_key_exists('patokanTanggal', $ary)) {
            $this->addError('prasarat', 'Format array tidak valid, harus ada key "umurMaksimal" "umurMinimal" dan "patokanTanggal"!');
        }
        // check the date
        // todo: pencarian pemisah dengan menggunakan REG supaya bisa tanda
        // selain -
        list($year, $month, $day) = explode('-', $ary['patokanTanggal']);
        if(!checkdate($month, $day, $year)) {
            $this->addError('prasarat', 'Format patokan tanggal tidak valid, harusnya berformat yyyy-mm-dd!');
        }
    }
    
    /**
     * kembalikan prasarat yang sudah menjadi array
     */
    public function getPrasaratAry() {
        $ary = array();
        try {
            eval("\$ary=$this->prasarat;");
        } catch (Exception $exc) {
            Yii::log($exc->getTraceAsString(), CLogger::LEVEL_ERROR);
//            $exc->getTraceAsString();
            $ary = array();
        }
        return $ary;
    }
    
    /**
     * berikan format prasarat dalam tipe data string dan sudah di konversi dengan
     * format tampilan yang dijadikan string
     */
    public function getPrasaratStr() {
        $ary = $this->prasaratAry;
        return sprintf("Umur Maksimal: %s dan Minimal: %s dengan patokan tanggal pada %s", 
                $ary['umurMaksimal'], $ary['umurMinimal'], date('d-m-Y', strtotime($ary['patokanTanggal'])));
    }
    
    /**
     * Check apakah usia sudah valid?
     * @param string $tanggalLahir dengan format yyyy-mm-dd (ISO)
     * @param string $pesan Pesan kesalahan bila ada ... 
     * @return boolean
     */
    public function isUsiaValid($tanggalLahir, &$pesan="") {
        $prasaratAry = $this->prasaratAry;
        $usiaPelamar = intval(substr(
                date('Ymd',  strtotime($prasaratAry['patokanTanggal'])) -   // patokan tanggal
                date('Ymd',  strtotime($tanggalLahir)),              // 
                0, -4));
        if($usiaPelamar >= $prasaratAry['umurMinimal'] && $usiaPelamar <= $prasaratAry['umurMaksimal']) {
            return true;
        }
        $pesan = 'Dipersyaratkan: '. $this->prasaratStr .', sedang umur pelamar adalah: '. $usiaPelamar .' pada tanggal bersangkutan!';
        return false;
    }
    
    /**
     * Lakukan perhitungan terhadap IPK
     * Apabila nilai IPK di FORMASI adalah 0 maka digunakan default dari sini, 
     * dihitung berdasarkan kode pendidikan akhir pelamar.
     * @param type $ipk
     * @param type $kodePendidikanAkhir
     * @param type $pesan
     * @return boolean
     */
    public function isIPKValid($ipk, $kodePendidikanAkhir, &$pesan="") {
        $prasaratAry = $this->prasaratAry;
        if(!isset($prasaratAry['IPK'][$kodePendidikanAkhir])) {
            return true; // bila tidak ada di set maka benarkan saja dianggap tidak ditentukan nilainya!
        }
        if((double) $ipk >= (double)$prasaratAry['IPK'][$kodePendidikanAkhir]) {
            return true;
        }
        $pesan = "Maaf IPK/Rata-Rata pendidikan terakhir Anda tidak mencukupi. IPK Dipersyaratkan minimal {$prasaratAry['IPK'][$kodePendidikanAkhir]}";
        return false;
    }
    
    public function defaultScope() {
        if(!isset(Yii::app()->user->instansi) || // bila bukan user instansi
            Yii::app()->user->isSuperAdmin())  { // atau si super admin
            return array();
        }
        return array(
                'condition'=>'t.id_instansi=:idinstansi',
                'params'=>array(':idinstansi'=>  Yii::app()->user->instansi) // user harus sudah login
        );
    }
}
