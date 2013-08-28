<?php

/**
 * Untuk admin formasi
 *
 * @author tonier
 */
class AdminFormasi extends Formasi {
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function defaultScope() {
        if(!isset(Yii::app()->user->instansi) || // bila bukan user instansi
            Yii::app()->user->level == YFLevelLookup::SUPER_ADMIN)  { // atau si super admin
            return array();
        }
        return array(
                'condition'=>'id_instansi=:idinstansi',
                'params'=>array(':idinstansi'=>  Yii::app()->user->instansi) // user harus sudah login
        );
    }
}

?>
