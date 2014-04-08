<?php

/**
 * This is the model base class for the table "tbl_user_has_place".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserHasPlace".
 *
 * Columns in table "tbl_user_has_place" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $user_id
 * @property integer $place_id
 *
 */
abstract class BaseUserHasPlace extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_user_has_place';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserHasPlace|UserHasPlaces', $n);
	}

	public static function representingColumn() {
		return array(
			'user_id',
			'place_id',
		);
	}

	public function rules() {
		return array(
			array('user_id, place_id', 'required'),
			array('user_id, place_id', 'numerical', 'integerOnly'=>true),
			array('user_id, place_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'user_id' => null,
			'place_id' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('place_id', $this->place_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}