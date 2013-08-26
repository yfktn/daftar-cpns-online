<?php
/**
 * CheckStatusForm class.
 * Digunakan sebagai bagian dari form untuk melakukan check status verfikasi.
 *
 * @author tonier
 */
class CheckStatusForm extends CFormModel {
    
    /**
     * @var string Nomor KTP atau bisa juga Kode Verifikasi
     */
    public $kode;
    
    /**
     * Untuk captcha
     */
    public $verifyCode;
    
    protected $_pendaftar = null;


    public function rules() {
        return array(
            array('kode', 'required'),
            array('kode', 'checkKode'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),
                'message'=>'Karakter untuk verifikasi manusia yang Anda masukkan tidak benar!'),
        );
    }
    
    /**
     * Lakukan pengecekan terhadap kode dan pastikan terdapat kode verifikasi atau nomor KTP
     * @param type $attribute
     * @param type $params
     */
    public function checkKode($attribute, $params) {
        $this->_pendaftar = Pendaftar::model()->find(
                'kode_verifikasi=:kode OR no_ktp=:kode', // kita pastikan saja benar tidak make like :D
                array(':kode'=> strtoupper($this->kode)));
        if($this->_pendaftar==null) {
            $this->addError('kode', 'Kode Verifikasi atau Nomor KTP Tidak ditemukan pada Data Pendaftar');
        }
        return true;
    }
    
    public function getPendaftar() {
        return $this->_pendaftar;
    }
    
	public function attributeLabels()
	{
		return array(
            'kode'=>'Kode Verifikasi',
			'verifyCode'=>'Verifikasi Pengguna Adalah Manusia',
		);
	}
}

?>
