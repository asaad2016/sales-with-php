<?php
namespace app\Model;

class ClientModel extends Model  
{
   protected $table="clients";

   public function loadarticle($filter=null){  
    	return $this->query("SELECT * from clients
     "  . $filter . " LIMIT {$this->changeperpage()}");
  	}
  	public function findarticle($id){
  
   		return $this->query("SELECT 
      * from clients where id=?",[$id],true);

  	}

}