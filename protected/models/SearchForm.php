<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SearchForm extends CFormModel
{
	public $name;
	public $price;
	public $people;
	public $option;
	public $location;
	public $distence;
	
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		  array('name, price, people, option, location, distence', 'safe'),
		);
	}
	
	public function relations() {
	  return array(
	    'place' => array(self::BELONGS_TO, 'Place', 'place_id'),
	    'updater' => array(self::BELONGS_TO, 'User', 'update_user_id'),
	    'creater' => array(self::BELONGS_TO, 'User', 'create_user_id'),
	    'roomCharges' => array(self::HAS_MANY, 'RoomCharge', 'room_id'),
	    'roomOptions' => array(self::HAS_MANY, 'RoomOption', 'room_id'),
	    'roomImages' => array(self::HAS_MANY, 'RoomImage', 'room_id'),
	  );
	}
	

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'이름(장소나 강의실)',
			'price'=>'금액',
			'people'=>'수용인원',
			'option'=>'편의시설',
			'location'=>'위치',
			'distence'=>'거리',
		);
	}
}