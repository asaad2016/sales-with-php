<?php
namespace app;
class config{
	private static $_instance;
	private $setting=[];
	public function __construct($config_file){
		$this->setting=include_once $config_file;
	}
	public static function getinstance($config_file){
		if(self::$_instance===null){
			self::$_instance=new config($config_file);
		}
		return self::$_instance;
	}
	public function get($key){
		return $this->setting[$key];
	}
}