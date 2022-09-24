<?php
namespace app\Controller;
use app\Model\RoleseModel;
use app\Model\UserModel;
use app;
use app\Html\Form;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
class RolesController extends Controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->loadmodel("Roles");
		$this->loadmodel("User");
		
		
	}

	public function index()
	{
	  $roles=$this->Roles->loadarticle();
	  $users= $this->User->extract("userid","username");
	  $pagnate=$this->Roles->paginate();
	  $this->render("roles/index",compact("roles",'users','pagnate'));
	}
	
	public function delete()
	{
	 
	  $this->Roles->delete($_GET['id'],"roleid");
	   header("Location:?p=roles/index");
	  
	}

	public function add(){
	  $form=new Form($_POST);
	  	if(isset($_POST['submit']) && !empty($_POST)){
		 $this->Roles->create([
				'rolename'=>$_POST['rolename'],
				'show_client'=>$_POST['show_client'],
				'aed_client'=>$_POST['aed_client'],
				'show_sales'=>$_POST['show_sales'],
				'aed_sales'=>$_POST['aed_sales'],
				'show_purchase'=>$_POST['show_purchase'],
				'aed_purchase'=>$_POST['aed_purchase'],
				'show_article'=>$_POST['show_article'],
				'aed_article'=>$_POST['aed_article'],
				'show_stock'=>$_POST['show_stock'],
				'show_users_roles'=>$_POST['show_users_roles'],
				'aed_users_roles'=>$_POST['aed_users_roles']
			
				

				]);
		   header("Location:?p=roles/index");
			
		} 

		
	   $this->render("roles/add",compact("form"));
	}

	public function edit()
	{
		$id=$_GET['id'];
		
	 	$roles= $this->Roles->find($id,"roleid");
		$form=new Form($roles);
	 	if(isset($_POST['submit']) && !empty($_POST)){
			$this->Roles->update($id,[
	      		'rolename'=>$_POST['rolename'],
				'show_client'=>$_POST['show_client'],
				'aed_client'=>$_POST['aed_client'],
				'show_sales'=>$_POST['show_sales'],
				'aed_sales'=>$_POST['aed_sales'],
				'show_purchase'=>$_POST['show_purchase'],
				'aed_purchase'=>$_POST['aed_purchase'],
				'show_article'=>$_POST['show_article'],
				'aed_article'=>$_POST['aed_article'],
				'show_stock'=>$_POST['show_stock'],
				'show_users_roles'=>$_POST['show_users_roles'],
				'aed_users_roles'=>$_POST['aed_users_roles']

				]);
			
			 header("Location:?p=roles/index");
		   		
		}

		 $this->render("roles/edit",compact("form")); 

		
	}
	
} 