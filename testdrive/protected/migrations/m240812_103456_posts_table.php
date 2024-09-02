<?php

class m240812_103456_posts_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('posts', array(
			'id' => 'pk',
			'title' => 'string NOT NULL',
			'content' => 'text',
			'category' => 'string',
			'tags' => 'string',
			'created_at' =>'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('posts');
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