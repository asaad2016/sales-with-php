<?php

/**
* 
*/
namespace app;
class auto_loader
{
	
	static function autoload($class){
    //include ('Views/articles.php');
     include_once (ROOT. "/" .$class . '.php');
}
static function register(){
	spl_autoload_register(array(__class__,'autoload'));
	}

}