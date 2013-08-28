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
class AdminPrasarat extends Prasarat
{
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
