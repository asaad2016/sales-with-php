<?php
     
$template="default";
define("ROOT", dirname(__DIR__));
include_once ROOT."\app\app.php";
app::load();
app::$path="http://localhost:8080/sales_pro_new/public/";
 //=========== function ajax =========================
if(isset($_POST['ajax_action'])){
  $request=explode(".", $_POST['ajax_action']);
  $controller='\app\Controller\\'.ucfirst($request[0]).'Controller';
  $action=$request[1];
    $controller=new $controller();
   $controller->$action();

}
//=======================================================
else{
//=========== function php =======================
   $p="home";
   if(isset($_GET['p'])){
    $p=$_GET['p'];
   }
   else

   {
       $p="article/index"; 
   }
  $p=explode("/", rtrim($p,'/'));
  $action="index";
  if(isset($p[0])){
    $controllername=$p[0];
      app::getinstance()->curent_page=strtolower($p[0]);
  }

  if(isset($p[1])){
    $action=$p[1];
    
    }
   else{
      $action="index";
    }
    if(!isset($_SESSION['username'])){
      $controllername="user";
      $action="login";
    }
    else{
      if( $p[0] == "user" && $p[1] == "login"){
           $controllername="article";
           $action="index";
      }
    }
    $controller_php='\app\Controller\\'.ucfirst($controllername).'Controller';
    $controller_php=new $controller_php();
    $controller_php->$action();
}