<?php
namespace app\Controller;
use app\Model\ClientModel;
use app;
use app\Html\Form;
class ClientController extends Controller{
	
	public function __construct(){
		parent::__construct();
		$this->loadmodel("Client");
		
		
	}

	public function index()
	{
	  $client=$this->Client->loadarticle();
	  $pagnate=$this->Client->paginate();
	  $form=new Form($_POST);
	  $this->render("client/index",compact("client","pagnate","form"));
	}
	public function search()
	{
		$filter='';
		if(isset($_POST['client_name']) && $_POST['client_name'] !=""){
			$filter =" where client_name like '%" . ($_POST["client_name"]) . "%'";
		}
		

		$client=$this->Client->loadarticle($filter);

	    foreach ( $client as $art1) {
	      echo "<tr>";
	      echo "<td>";
	      echo "<a href='index.php?p=client/edit&id=$art1->id' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
	      ?>
	      <a href='index.php?p=client/delete&id=<?php echo $art1->id; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' >حذف</a>
	      <?php
	      echo "</td>";
	      echo "<td>" . $art1->id ."</td>";
	      echo "<td>" . $art1->client_name ."</td>";
	      echo "<td>" . $art1->address ."</td>";
	      echo "<td>" . $art1->email ."</td>";
	      


	      echo "</tr>";
		}
	}
	public function delete()
	{
	  $this->Client->delete($_GET['id']);
	   header("Location:?p=client/index");
	  
	}

	public function add(){
	  $form=new Form($_POST);
		if(!empty($_POST)){
		   $this->Client->create([
	      		'client_name'=>$_POST['client_name'],
				'address'=>$_POST['address'],
				'email'=>$_POST['email']	

			]);
		   header("Location:?p=client/index");
			
		} 

	   $this->render("client/add",compact("form"));
	}

	public function edit()
	{
		$id=isset($_GET['id']) ? $_GET['id'] : 0;
	 	$client= $this->Client->find($id);

	  	$form=new Form($client);
		if(!empty($_POST)){
		   $this->Client->update($id,[
	      		'client_name'=>$_POST['client_name'],
				'address'=>$_POST['address'],
				'email'=>$_POST['email']		

			]);	
		   header("Location:?p=client/index");
		} 

	   $this->render("client/edit",compact("form","client"));
	} 	
}