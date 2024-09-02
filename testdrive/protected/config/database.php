<?php

// This is the database connection configuration.
return array(
	// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'class'=>'CDbConnection',
	// 'connectionString' => 'mysql:host=localhost;dbname=yii_database',
	'connectionString' => 'mysql:host=db;port=3306;dbname=yii_database',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
	
);