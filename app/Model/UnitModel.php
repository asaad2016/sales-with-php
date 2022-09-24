<?php
namespace app\Model;

class UnitModel extends Model  
{
    protected $table="unit";

   public function loadarticle($filter=null){

  
    return $this->query("SELECT unit.*,category.cat_name from unit inner join category on category.id=unit.c_id "  . $filter . " LIMIT {$this->changeperpage()}");
  }
  public function findarticle($id){
  
    return $this->query("SELECT unit.*,category.cat_name from unit inner join category on category.id=unit.c_id where id=?",[$id],true);

  }

  

}