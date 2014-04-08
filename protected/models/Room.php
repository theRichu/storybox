<?php

Yii::import('application.models._base.BaseRoom');

class Room extends BaseRoom
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}