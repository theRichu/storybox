<?php

Yii::import('application.models._base.BaseUserHasPlace');

class UserHasPlace extends BaseUserHasPlace
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}