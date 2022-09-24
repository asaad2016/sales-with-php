<?php
namespace app\Model;

class UserModel extends Model  
{
    protected $table="users";

   public function loginuser($username,$password){
  
    	$login=$this->db->prepare("SELECT * from users where username=? and password=?",[$username,$password]);
	  	if($login){
	  	return true;
	  	}
	  	else{
	  		return false;
	  	}
	}
	public function loginusersession($username,$password){
  
    	$login=$this->db->prepare("SELECT users.*,roles.* from users,roles where users.roleid=roles.roleid and username=? and password=?",[$username,$password]);
	 if($login){
	  	return $login;
	  }
	  else{
	  	return false;
	  }
	}
  public function findarticle($id){
  
    return $this->query("SELECT users.*,roles.rolename from users inner join roles on users.roleid=roles.roleid where userid=?",[$id],true);

  }
	public function loadarticle($filter=null){

  
	    return $this->query("SELECT 
	       users.*,
	       roles.rolename
	      

		   FROM users,roles
		   where users.roleid=roles.roleid " . $filter . " LIMIT {$this->changeperpage()}");
  	}
  
  	

}