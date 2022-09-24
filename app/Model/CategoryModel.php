<?php
namespace app\Model;

class CategoryModel extends Model  
{
   protected $table="category";

  public function loadarticle($filter=null){

  
    return $this->query("SELECT * from category
     "  . $filter . " LIMIT {$this->changeperpage()}");
  }
  public function findarticle($id){
  
    return $this->query("SELECT 
      * from category where id=?",[$id],true);

  }
}