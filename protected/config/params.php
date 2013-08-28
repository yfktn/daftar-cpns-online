<?php
//// using Yii::app()->params['paramName']
return array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
        'verifyCodeLength'=>10,         // panjang kode verifikasi!
        'yearTest'=>2013,               // tahun test CPNS saat ini
        'filterGeneral'=>array(
            'minAge'=>18,               // minimal usia
            'maxAge'=>35,               // max usia
            'calcAtDate'=>'2013-12-31', // target perhitungan untuk min dan max usia (yyyy-mm-dd)
            'minIPK'=>3.5,              // minimal IPK
        )
	);
