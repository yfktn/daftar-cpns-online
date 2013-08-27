<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $user_name
 * @property string $salt_key
 * @property string $password
 * @property string $id_instansi
 * @property string $last_login
 * @property string $level User Level
 *
 * The followings are the available model relations:
 * @property MasterInstansi $idInstansi
 */
class User extends CActiveRecord
{
    public $password_repeat = '';
    public $old_pass = '';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}
    
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, id_instansi, level', 'required'),
            array('password', 'required','on'=>'insert,update_password'),
			array('user_name', 'length', 'max'=>45),
            array('user_name','match','pattern'=>'/^[-_a-z1-9A-Z]+$/', 
                'message'=>'Username can only contain character a-z or A-Z or 1-9 or - and _',
                'on'=>'insert,update'),
            array('user_name','unique','className'=>'User',
                'attributeName'=>'user_name','on'=>'insert',
                'message'=>'User ID harus UNIQUE; {value} sudah digunakan'),
//			array('salt_key, id_instansi', 'length', 'max'=>10),
			array('password', 'length', 'max'=>32, 'min'=>6, 'max'=>50 , 
                'tooShort'=>'Password terlalu pendek, minimal 6 karakter'),
            array('password','compare','on'=>'insert,update_password'),
            array('password_repeat','safe','on'=>'insert,update_password'),
            array('level', 'length', 'max'=>20),
			array('last_login, last_login_IP, create_time, update_time, salt_key', 'unsafe'), // we decide it
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_name, salt_key, password, id_instansi, last_login_time, level', 'safe', 'on'=>'search'),
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
			'user_name' => 'User Name',
			'salt_key' => 'Salt Key',
			'password' => 'Password',
			'id_instansi' => 'Instansi User',
			'last_login' => 'Last Login Time',
            'password_repeat' => 'Ketikkan Password Tersebut Lagi'
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
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('salt_key',$this->salt_key,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('id_instansi',$this->id_instansi,true);
		$criteria->compare('last_login',$this->last_login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getTheSaltKey() {
        if(isset($this->salt_key[0])) {
            return $this->salt_key;
        }
        $this->salt_key = substr(uniqid(), 1, 10);
        return $this->salt_key;
    }
    
    public function encrypt($pass) {
        return md5($this->theSaltKey.$pass);
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
    
    public function afterValidate() 
    {
        parent::afterValidate();
//        $this->username = $this->email;
        if($this->isNewRecord)
        {
            $this->password = $this->encrypt($this->password); 
        }
        else
        { // only encrypt password if user want to update his/her password
            if(strlen($this->password)>0) {
                $this->password = $this->encrypt($this->password);
            } else {
                // saat update dan tidak memasukkan password maka password yang saat ini 
                // akan terupdate dan kosong. Untuk itu sudah disimpan di old_pass dan 
                // di assign nilainya
                $this->password = $this->old_pass;
            }
        }
    }
    
    public function afterFind() {
        parent::afterFind();
        $this->old_pass = $this->password;
    }
    
}
