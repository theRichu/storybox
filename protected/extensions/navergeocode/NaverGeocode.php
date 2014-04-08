<?php
/**
 * Geocode class file.
 * 
 * @author TaeYeong KIM <therichu@gmail.com>
 * @link http://github.com/yii-naver-geocode
 * @version 0.1
 * 
 * 
 * 
Yii::import('application.extensions.navergeocode.NaverGeocode');
$geocode = new NaverGeocode;
$a = '서울시 용산구 청파동 107-26';
$test=$geocode->getGeocode($a);
print_r($test);

 * 
 */
class NaverGeocode extends CApplicationComponent {
	public $key = "0c5b20a48048fd052a7889811ae253ad"; // 네이버 지도api 키값
	                                                  
	// Input Format = address, city, statce-code, zip
	public $address = null;
	
	// URL for Google Maps API
	public $url = 'maps.naver.com';
	public $loc = null;

	public $data = null;
	
	public function init()
	{
		//libxml_use_internal_errors(true);
		if (!extension_loaded('simpleXML')) {
			$this->data->status->error = true;
			$this->data->status->code  = '911';
			$this->data->status->msg   = 'simpleXML extension is not enabled!';
			return $this->data;
		}
	}
	
	
	
	public function getGeocode($address) {
		//$map_query = str_replace ( " ", "", $address ); // 공백을 제거
		fb($address);
		$map_query = urlencode($address);
			
		$xml_url = "http://maps.naver.com/api/geocode.php?" . "key=" . $this->key . "&encoding=utf-8&coord=LatLng&query=" . $map_query;
		fb($xml_url);
		
		$xml_string = file_get_contents ( $xml_url );
		$xml = simplexml_load_string ( $xml_string );
					
		return $xml;
	}
}