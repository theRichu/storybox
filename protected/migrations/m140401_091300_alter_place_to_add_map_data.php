<?php

class m140401_091300_alter_place_to_add_map_data extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_place', 'map_lat', 'float(10,6) DEFAULT NULL');
		$this->addColumn('tbl_place', 'map_lag', 'float(10,6) DEFAULT NULL');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_place', 'map_lat');
		$this->dropColumn('tbl_place', 'map_lag');
	}
}