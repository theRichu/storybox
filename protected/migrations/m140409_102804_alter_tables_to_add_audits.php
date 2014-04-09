<?php

class m140409_102804_alter_tables_to_add_audits extends CDbMigration
{
	public function up()
	{
	  $this->addColumn('tbl_option', 'create_time', 'datetime DEFAULT NULL');
	  $this->addColumn('tbl_option', 'create_user_id', 'int(11) DEFAULT NULL');
	  $this->addColumn('tbl_option', 'update_time', 'datetime DEFAULT NULL');
	  $this->addColumn('tbl_option', 'update_user_id', 'int(11) DEFAULT NULL');
	  
	  $this->addColumn('tbl_room', 'create_time', 'datetime DEFAULT NULL');
	  $this->addColumn('tbl_room', 'create_user_id', 'int(11) DEFAULT NULL');
	  $this->addColumn('tbl_room', 'update_time', 'datetime DEFAULT NULL');
	  $this->addColumn('tbl_room', 'update_user_id', 'int(11) DEFAULT NULL');
	  
	  $this->addColumn('tbl_room_charge', 'create_time', 'datetime DEFAULT NULL');
	  $this->addColumn('tbl_room_charge', 'create_user_id', 'int(11) DEFAULT NULL');
	  $this->addColumn('tbl_room_charge', 'update_time', 'datetime DEFAULT NULL');
	  $this->addColumn('tbl_room_charge', 'update_user_id', 'int(11) DEFAULT NULL');
	  
	  $this->addColumn('tbl_room_option', 'create_time', 'datetime DEFAULT NULL');
	  $this->addColumn('tbl_room_option', 'create_user_id', 'int(11) DEFAULT NULL');
	  $this->addColumn('tbl_room_option', 'update_time', 'datetime DEFAULT NULL');
	  $this->addColumn('tbl_room_option', 'update_user_id', 'int(11) DEFAULT NULL');
	}

	public function down()
	{
	  $this->dropColumn('tbl_option', 'create_time');
	  $this->dropColumn('tbl_option', 'create_user_id');
	  $this->dropColumn('tbl_option', 'update_time');
	  $this->dropColumn('tbl_option', 'update_user_id');
	  
	  $this->dropColumn('tbl_room', 'create_time');
	  $this->dropColumn('tbl_room', 'create_user_id');
	  $this->dropColumn('tbl_room', 'update_time');
	  $this->dropColumn('tbl_room', 'update_user_id');
	  
	  $this->dropColumn('tbl_room_charge', 'create_time');
	  $this->dropColumn('tbl_room_charge', 'create_user_id');
	  $this->dropColumn('tbl_room_charge', 'update_time');
	  $this->dropColumn('tbl_room_charge', 'update_user_id');
	  
	  $this->dropColumn('tbl_room_option', 'create_time');
	  $this->dropColumn('tbl_room_option', 'create_user_id');
	  $this->dropColumn('tbl_room_option', 'update_time');
	  $this->dropColumn('tbl_room_option', 'update_user_id');
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