<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id = 0;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        // username tidak case sensitive
        // user can login with email too
        $user = User::model()->find('LOWER(user_name) LIKE :username',
                array(':username' => strtolower($this->username)));
        if($user === null)
        {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
        else
        {
            if($user->password!==$user->encrypt($this->password))
            {
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
            else
            {
                $this->_id = $user->id;
                if($user->last_login===null)
                {
                    $lastLogin = new CDbExpression('NOW()');
                }
                else
                {
                    $lastLogin = strtotime($user->last_login);
                }
                $this->setState('last_login', $lastLogin);
                $this->setState('username', strtolower($this->username));
                Yii::app()->user->level=$user->level;
                $this->setState('instansi', $user->id_instansi);
//                var_dump(Yii::app()->user->isGuest, Yii::app()->user->level);
//                Yii::app()->end();
//                $this->setState('initLevel', $user->level);
                
                // save to db
                $user->last_login = new CDbExpression('NOW()');
                // $ch = new CHttpRequest();
                $user->last_login_IP = Yii::app()->request->getUserHostAddress(); // $ch->getUserHostAddress();
                //$user->save(false, array('last_login', 'last_login_IP')); // save without validate
                $user->update(array('last_login', 'last_login_IP'));
                
                $this->errorCode=self::ERROR_NONE;
            }
        }
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
    
    public function getId() {
        return $this->_id;
    }
}