<?php

class m140409_104822_create_room_image extends CDbMigration
{
	public function up()
	{
	  $this->createTable('tbl_room_image', array(
	    'id' => 'pk',
	    'caption' => 'string DEFAULT NULL',
	    'content' => 'text DEFAULT NULL',
	    'filename' => 'string NOT NULL',
	    'room_id' => 'integer NOT NULL',
  		'create_time' => 'datetime DEFAULT NULL',
  		'create_user_id' => 'integer DEFAULT NULL',
  		'update_time' => 'datetime DEFAULT NULL',
  		'update_user_id' => 'integer DEFAULT NULL',
	  ), 'ENGINE=InnoDB');
	  $this->addForeignKey("fk_room_room_image", "tbl_room_image", "room_id", "tbl_room", "id", "CASCADE", "RESTRICT");
	}

	public function down()
	{
	   $this->dropTable('tbl_room_image');
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