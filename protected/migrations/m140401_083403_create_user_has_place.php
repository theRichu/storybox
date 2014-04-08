<?php

class m140401_083403_create_user_has_place extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_user_has_place', array(
				'user_id' => 'int(11) NOT NULL',
				'place_id' => 'int(11) NOT NULL',
				'PRIMARY KEY (`user_id`,`place_id`)',
		), 'ENGINE=InnoDB');
		
		//the tbl_project_user_assignment.project_id is a reference to tbl_project.id
		$this->addForeignKey("fk_place_user", "tbl_user_has_place", "place_id", "tbl_place", "id", "CASCADE", "RESTRICT");
		//the tbl_project_user_assignment.user_id is a reference to tbl_user.id
		$this->addForeignKey("fk_user_place", "tbl_user_has_place", "user_id", "tbl_user", "id", "CASCADE", "RESTRICT");
	}

	public function down()
	{
		$this->truncateTable('tbl_user_has_place');
		$this->dropTable('tbl_user_has_place');
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