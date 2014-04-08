<?php

class m140402_031215_create_room_tables extends CDbMigration
{

    public function safeUp()
    {
        $this->createTable('tbl_room', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'person' => 'int(11) NOT NULL',
            'place_id' => 'int(11) NOT NULL',
            'area' => 'int(11) DEFAULT NULL',
            'areatype' => 'int(1) DEFAULT NULL',
            'contactnumber' => 'string DEFAULT NULL',
            'workstart' => 'time DEFAULT NULL',
            'workto' => 'time DEFAULT NULL'
        ), 'ENGINE=InnoDB');
        $this->addForeignKey("fk_room_place", "tbl_room", "place_id", "tbl_place", "id", "CASCADE", "RESTRICT");
        
        $this->createTable('tbl_option', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'description' => 'string DEFAULT NULL'
        ), 'ENGINE=InnoDB');
        
        $this->createTable('tbl_room_option', array(
            'id' => 'pk',
            'room_id' => 'int(11) NOT NULL',
            'option_id' => 'int(11) NOT NULL',
            'price' => 'int(11) NOT NULL',
            'description' => 'string DEFAULT NULL',
        ), 'ENGINE=InnoDB');
        $this->addForeignKey("fk_room_option_option", "tbl_room_option", "option_id", "tbl_option", "id", "CASCADE", "RESTRICT");
        $this->addForeignKey("fk_room_option_room", "tbl_room_option", "room_id", "tbl_room", "id", "CASCADE", "RESTRICT");
        
        $this->createTable('tbl_room_charge', array(
            'id' => 'pk',
            'room_id' => 'int(11) NOT NULL',
            'price' => 'int(11) NOT NULL',
            'description' => 'string DEFAULT NULL'
        ), 'ENGINE=InnoDB');
        $this->addForeignKey("fk_room_charge_room", "tbl_room_charge", "room_id", "tbl_room", "id", "CASCADE", "RESTRICT");
    }

    public function safeDown()
    {
        $this->dropTable('tbl_room_charge');
        $this->dropTable('tbl_room_option');
        $this->dropTable('tbl_option');
        $this->dropTable('tbl_room');
    }
}