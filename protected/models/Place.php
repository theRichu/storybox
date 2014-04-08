<?php

Yii::import('application.models._base.BasePlace');

class Place extends BasePlace
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}