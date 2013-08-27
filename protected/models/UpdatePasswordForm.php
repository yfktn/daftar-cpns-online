<?php
/**
 * CheckStatusForm class.
 * Digunakan sebagai bagian dari form untuk melakukan check status verfikasi.
 *
 * @author tonier
 */
class UpdatePasswordForm extends CFormModel {
    
    /**
     * @var string Nomor KTP atau bisa juga Kode Verifikasi
     */
    public $current_password;
    public $password;
    public $password_repeat;


    public function rules() {
        return array(
            array('current_password,password,password_repeat', 'required'),
			array('password', 'length', 'max'=>32, 'min'=>6, 'max'=>50 , 
                'tooShort'=>'Password terlalu pendek, minimal 6 karakter'),
            array('password','compare'),
            array('current_password','checkCurrentPassword'),
//			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),
//                'message'=>'Karakter untuk verifikasi manusia yang Anda masukkan tidak benar!'),
        );
    }
    /**
     * Check password sekarang apakah sudah benar? Untuk menjaga keamanan ... 
     * @param type $attribute
     * @param type $params
     */
    public function checkCurrentPassword($attribute, $params) {
        $user = User::model()->find('id=?',array(Yii::app()->user->id));
        if($user->password != $user->encrypt($this->current_password)) {
            $this->addError('current_password', 'Password yang saat ini digunakan tidak sama!');
        }
    }

    
	public function attributeLabels()
	{
		return array(
            'current_password'=>'Masukkan Password Anda Saat Sekarang',
			'password'=>'Masukkan Password yang Baru',
			'password_repeat'=>'Ketikkan Ulang Password yang Baru',
		);
	}
}

?>
