<?php

class m140401_073210_create_place_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_place', array(
		'id' => 'pk',
		'name' => 'string NOT NULL',
		'address' => 'string NOT NULL',
		'description' => 'text NOT NULL',
		'create_time' => 'datetime DEFAULT NULL',
		'create_user_id' => 'int(11) DEFAULT NULL',
		'update_time' => 'datetime DEFAULT NULL',
		'update_user_id' => 'int(11) DEFAULT NULL',
		), 'ENGINE=InnoDB');

	}
/*

CREATE TABLE IF NOT EXISTS `storybox`.`tbl_place` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT(11) NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT(11) NULL,
  `map_lat` FLOAT(10,6) NOT NULL,
  `map_lng` FLOAT(10,6) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;
*/

	public function down()
	{
		$this->dropTable('tbl_place');
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
