<?php

/**
 * This is the model base class for the table "tbl_option".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Option".
 *
 * Columns in table "tbl_option" available as properties of the model,
 * followed by relations of table "tbl_option" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property RoomOption[] $roomOptions
 */
abstract class BaseOption extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_option';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Option|Options', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name', 'required'),
			array('name, description', 'length', 'max'=>255),
			array('description', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, description', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			//'roomOptions' => array(self::HAS_MANY, 'RoomOption', 'option_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'description' => Yii::t('app', 'Description'),
			'roomOptions' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}