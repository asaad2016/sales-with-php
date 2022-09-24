<?php

namespace app;
use \PDO;
class database
{
	private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $pdo;
    public function __construct($db_name, $db_host= 'localhost',$db_user= 'root',$db_pass= ''){
        $this->db_host=$db_host;
        $this->db_user=$db_user;
        $this->db_pass=$db_pass;
        $this->db_name=$db_name;
    }



    public function getPDO(){
        if($this->pdo===null){
        $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host,
        $this->db_user, $this->db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->query('SET names utf8;SET CHARACTER SET utf8');
        $this->pdo=$pdo;
        }
    	return $this->pdo;
      }

 

     public function query1($stmt,$one=false,$class=null){
        $q=$this->getPDO()->query($stmt);
        return $q->fetchall(PDO::FETCH_OBJ);
     }
     public function query($stmt,$one=false,$class=null){
        $rs=$this->getPDO()->query($stmt);
      
       if(
          strpos(strtolower($stmt), "insert")===0 ||
          strpos(strtolower($stmt), "update")===0 ||
           strpos(strtolower($stmt), "delete")===0 

        ){
        return $rs;
         }
        if($class===null){
              $rs->setFetchMode(PDO::FETCH_OBJ);
        }
        else
        {
            $rs->setFetchMode(PDO::FETCH_CLASS,$class);
        }
        if($one){
            $data=$rs->fetch(PDO::FETCH_OBJ);
        }
        else
        {
                $data=$rs->fetchAll(PDO::FETCH_OBJ);
        }
        return $data;
         //return $rs->fetchall(PDO::FETCH_OBJ);
     }
     public function querycount($stmt){
        $rs=$this->getPDO()->prepare($stmt);
        $rst=$rs->execute(); 
              
        return $rs->rowCount();
       
     }
     public function prepare($stmt,$attribute,$one=false,$class=null){
        $rs=$this->getPDO()->prepare($stmt);
        $rst=$rs->execute($attribute);
       if(
          strpos(strtolower($stmt), "insert")===0 ||
          strpos(strtolower($stmt), "update")===0 ||
           strpos(strtolower($stmt), "delete")===0 

        ){
        return $rst;
         }
        if($class===null){
            $rs->setFetchMode(PDO::FETCH_OBJ);
        }
        else
        {
         $rs->setFetchMode(PDO::FETCH_CLASS,$class);
        }
        if($one){
            $data=$rs->fetch();
        }
        else
        {
                $data=$rs->fetchAll();
        }
        return $data;
     }

}
