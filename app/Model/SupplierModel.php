<?php
namespace app\Model;

class SupplierModel extends Model  
{
   protected $table="suppliers";

   public function loadarticle($filter=null){

  
    	return $this->query("SELECT * from suppliers
     "  . $filter . " LIMIT {$this->changeperpage()}");
  	}
  	public function findsupplier($id){
  
   		return $this->query("SELECT 
      * from suppliers where id=?",[$id],true);

  	}

}