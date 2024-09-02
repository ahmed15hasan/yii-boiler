<?php

class m240824_130520_add_status_in_event extends CDbMigration
{
	public function up()
	{
		$this->addColumn('event', 'status', 'char(1) NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('event', 'status');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}