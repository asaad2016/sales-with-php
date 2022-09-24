<?php
namespace app\Controller;
use app\Model\UserModel;
use app;
use app\Html\Form;
use app\Model\UploadModel;
class UserController extends Controller{
	
	public function __construct(){
		//Parent::construct();
		parent::__construct();
		$this->loadmodel("User");
		$this->loadmodel("Roles");		
	}
	public function login(){
		if(!empty($_POST['username']) || !empty($_POST['password'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$error=false;
			if($this->User->loginuser($username,$password)){
				$_SESSION['username']=$this->User->loginusersession($username,$password);
				$this->redirect("index.php?p=article/index");
			}
			else{
				$error=true;
			}
		}
		 $this->render("user/login",compact("error"));
	}
	public function logout(){
		session_unset();
		session_destroy();
		$this->redirect("index.php?p=user/login");
	}
	public function index()
	{
	  $users=$this->User->loadarticle();
	  $role= $this->Roles->extract("roleid","rolename");
	  $form=new Form($_POST);
	  $pagnate=$this->User->paginate();
	  $this->render("user/index",compact("users",'role','pagnate'));
	}
	public function add(){
	  $role= $this->Roles->extract("roleid","rolename");
	  $form=new Form($_POST);
	  	if(isset($_POST['submit']) && !empty($_POST)){
		 $this->User->create([
	      'username'=>$_POST['username'],
				'password'=>$_POST['password'],
				'email'=>$_POST['email'],
				'phone'=>$_POST['phone'],
				'function'=>$_POST['function'],
				'roleid'=>$_POST['roleid'],
				
				'created_by'=>date("d-m-Y"),
				'updated_by'=>date("d-m-Y"),
				'avtar'=>$_FILES['avtar']['name']

				]);
			UploadModel::once($_FILES['avtar'],$_FILES['avtar']['name']);
		   header("Location:?p=user/index");
			
		} 

		
	   $this->render("user/add",compact("form","role"));
	}

	public function edit()
	{
		$id=$_GET['id'];
	 	$user= $this->User->find($id,"userid");
	 	$role= $this->Roles->extract("roleid","rolename");
		$form=new Form($user);
	 	if(isset($_POST['submit']) && !empty($_POST)){
			$this->User->update($id,[
	      		'username'=>$_POST['username'],
				'password'=>$_POST['password'],
				'email'=>$_POST['email'],
				'phone'=>$_POST['phone'],
				'function'=>$_POST['function'],
				'roleid'=>$_POST['roleid'],
				'updated_by'=>date("d-m-Y"),
				'avtar'=>$_FILES['avtar']['name']

				],"userid");
			UploadModel::once($_FILES['avtar'],$_FILES['avtar']['name']);
		   header("Location:?p=user/index");
		   		
		}
		 $this->render("user/edit",compact("form","user","role")); 

		
	}
	public function editprofile()
	{
		$erroroldpass=false;
		$errorconfirmpass=false;
		$id=$_GET['id'];
	 	$user= $this->User->find($id,"userid");
	 	$role= $this->Roles->extract("roleid","rolename");
		$form=new Form($user);
	 	if(isset($_POST['submit']) && !empty($_POST)){
	 		if($_POST['currentpassword'] != $_POST['confirmpassword']){
	 			$errorconfirmpass=true;
	 		}
	 		if($_SESSION['username'][0]->password !=$_POST['oldpassword']){
	 			$erroroldpass=true;
	 		}
	 		if($errorconfirmpass == false && $erroroldpass == false){
				$this->User->update($id,[
		      		'username'=>$_POST['username'],
					'password'=>$_POST['currentpassword'],
					'email'=>$_POST['email'],
					'phone'=>$_POST['phone'],
					'updated_by'=>date("d-m-Y"),
					'avtar'=>$_FILES['avtar']['name']

					],"userid");
				unlink("upload/" . $_FILES['avtar']['name']);
				UploadModel::once($_FILES['avtar'],$_FILES['avtar']['name']);
			   header("Location:?p=user/index");
		   	}	
		}

		 $this->render("user/editprofile",compact("form","user","role",'erroroldpass','errorconfirmpass')); 

		
	}
	public function delete()
	{
	  $artdelete=new UserModel(app::getinstance()->getdb());
	  $artdelete->delete($_GET['id'],"userid");
	   header("Location:?p=user/index");
	  
	}
	public function show()
	{
		
		$id=$_GET['id'];
		$user=$this->User->findarticle($id);
		 $this->render("user/show",compact("user")); 
	}
}