<?php

class m140401_025559_create_user_table extends CDbMigration
{

    public function up()
    {
        $this->createTable('tbl_user', array(
            'id' => 'pk',
            'username' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'create_time' => 'datetime DEFAULT NULL',
            'last_login_time' => 'datetime DEFAULT NULL',
            'update_time' => 'datetime DEFAULT NULL',
            'mobile' => 'string DEFAULT NULL',
            'phone' => 'string DEFAULT NULL'
        ), 'ENGINE=InnoDB');
    }

    public function down()
    {
        $this->dropTable('tbl_user');
    }
    
    /*
     * // Use safeUp/safeDown to do migration with transaction public function safeUp() { } public function safeDown() { }
     */
}