<?php
namespace app\Model;

class Pr_clt_artModel extends Model  
{
   protected $table="pr_clt_art";

   public function loadarticle($filter=null){  
    	return $this->query("SELECT pr_clt_art.*,pq_clt.num,article.desig,users.username from pr_clt_art,pq_clt,article,users
    		where pr_clt_art.pr_clt_id=pq_clt.id and  pr_clt_art.ar_id=article.id 
    		and users.userid=pq_clt.created_by 
     "  . $filter . " LIMIT {$this->changeperpage()}");
  	}
  	public function findarticle($id){
  
   		return $this->query("SELECT 
      * from pr_clt_art where id=?",[$id],true);

  	}

}