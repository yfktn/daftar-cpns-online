<?php
/**
 * YFWebUser untuk mengelola levelling user
 *
 * @author tonier
 */
class YFWebUser extends CWebUser {
    protected $_model=null;
    
    protected $_level = 'Anon';

    protected function loadUser() {
        if($this->_model==null) {
            $this->_model=$user = User::model()->find('id=?', array(Yii::app()->user->id));
        } 
        return $this->_model;
    }
    
    public function getLevel() {
//        echo "dari db dapat $this->_level". Yii::app()->user->id;
        if(Yii::app()->user->isGuest) {
            return 'Anon';
        } elseif(strcasecmp($this->_level, YFLevelLookup::ANON)==0) { // login but still anon?
            $user = $this->loadUser();
            $this->_level = $user == null? 'Anon': $user->level;
        }
        return $this->_level;
    }
    
    public function setLevel($level) {
        $this->_level = $level;
    }
        
    public function isSuperAdmin() {
        return Yii::app()->user->level == YFLevelLookup::SUPER_ADMIN;
    }
    
    public function isAdmin() {
        if($this->isSuperAdmin()) return true;
        return Yii::app()->user->level == YFLevelLookup::ADMIN;
    }
    
    public function isOperator() {
        if($this->isAdmin()) return true;
        return Yii::app()->user->level == YFLevelLookup::OPERATOR;
    }
    
    /**
     * Dipanggil dari rules ...
     * 
     * @param YF_ICanAccess $obj
     * @param type $task
     * @param type $params
     * @return boolean
     */
    public function isCan(YF_ICanAccess $obj, $task=null, $params=array()) {
        // $obj->isCanDoIt('create');
        $roleAry = $obj->getRole($task);
        $levelBool = false;
        if(isset($roleAry['minimalUserLevel'])) { // pastikan ada minimal user level
            eval("\$levelBool=\$this->is{$roleAry['minimalUserLevel']}();");
        }
//        var_dump($levelBool, Yii::app()->user->isGuest,  Yii::app()->user->level);
//        Yii::app()->end();
        if(!$levelBool) return false;
        if($roleAry['minimalUserLevel'] == Yii::app()->user->level && // bila adalah user minimal (tidak diatasnya)
                isset($roleAry['bizRule'])) { // dan ada role tambahan
            return call_user_func($roleAry['bizRule'], $params);
        }
        return true;
    }
    
}

?>
