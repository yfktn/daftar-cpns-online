<?php
// DB for production
return array(
			'connectionString' => 'mysql:host=localhost;dbname=cpns',
			'emulatePrepare' => true,
			'username' => 'cpns',
			'password' => '#cpns123',
			'charset' => 'utf8',
            'tablePrefix'=>'tbl_',
            'enableParamLogging'=>true,
            'schemaCachingDuration' => 7200,
            'schemaCacheID'=>'cacheDb',
    );