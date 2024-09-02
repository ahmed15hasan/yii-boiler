<?php

class m240820_083623_add_event_id_posts extends CDbMigration
{
	public function up()
    {
        // Add the event_id column to your table
        $this->addColumn('posts', 'event_id', 'int(11) NOT NULL');
    }

    public function down()
    {
        // Drop the event_id column
        $this->dropColumn('posts', 'event_id');
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