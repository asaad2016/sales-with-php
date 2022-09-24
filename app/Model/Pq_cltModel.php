<?php
namespace app\Model;

class Pq_cltModel extends Model  
{
  private $perpage=5;
  protected $table="pq_clt";
  
  public function loadarticle($filter=null){
    return $this->query("SELECT 
      pq_clt.*,clients.client_name,users.username

	   FROM pq_clt,clients,users
	   where clients.id=pq_clt.client_id and users.userid=pq_clt.created_by  " . $filter . " LIMIT {$this->changeperpage()}");
  }
  public function findarticle($id){
  
    return $this->query("SELECT 
      pq_clt.*,clients.id

     FROM pq_clt,clients
     where clients.id=pq_clt.client_id and pq_clt.id=?",[$id],true);

  }
}
 