<?php
/**
* 
*/

use app\database;
use app\config;

class app 
{
	private $db;
	public $curent_page="index";
	private static $_instance;
	public static $path;
	public static function getinstance(){
		if(self::$_instance===null){
			self::$_instance=new app();
		}
		return self::$_instance;
	}	
  	public static function load(){
		session_start();		
	    include_once ROOT."\app\database.php";
	    include_once (ROOT.'\app\auto_loader.php') ;
        \app\auto_loader::register();
	}
	public  function getdb(){
	if($this->db===null){
		$config=config::getinstance(ROOT."\app\config\config.php");
		$this->db=new database($config->get('db_name'),$config->get('db_host'),$config->get('db_user'),$config->get('db_pass'));
	}

		return $this->db;
	}
	public function getmodel($name){
      $model='\app\Model\\'.ucfirst($name).'Model';    
      return new $model($this->getdb());
	}
}