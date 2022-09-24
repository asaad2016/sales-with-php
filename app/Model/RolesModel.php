<?php
namespace app\Model;
class RolesModel extends Model  
{
  private $perpage=5;
  protected $table="roles";
  
  public function loadarticle($filter=null){

  
    return $this->query("SELECT 
      * from roles " . $filter . " LIMIT {$this->changeperpage()}");
  }
  public function findarticle($id){
  
    return $this->query("SELECT 
       article.id,
       article.ref,
       article.desig,
       suppliers.supplier_name,
       suppliers.id as 'supplierid',
       article.tax,
       unit.u_name,
       category.cat_name,
       article.thumb,
       article.created_by

     FROM article,suppliers,unit,category
     where article.supplier_id=suppliers.id
     and article.unit_id=unit.id and article.category_id=category.id and article.id=?",[$id],true);

  }
}
 