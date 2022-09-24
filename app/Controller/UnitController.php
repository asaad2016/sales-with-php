<?php
namespace app\Controller;
use app\Model\UnitModel;
use app;
use app\Html\Form;
class UnitController extends Controller{
	
	public function __construct(){
		parent::__construct();
		$this->loadmodel("Unit");
		$this->loadmodel("Category");
		
	}

	public function index()
	{
	  $units=$this->Unit->loadarticle();
	  $cats= $this->Category->extract("id","cat_name");
	  $pagnate=$this->Unit->paginate();
	  $form=new Form($_POST);
	  $this->render("unit/index",compact('units','pagnate','form','cats'));
	}
	public function search()
	{
		$filter='';
		if(isset($_POST['u_name']) && $_POST['u_name'] !=""){
			$filter .=" where u_name like '%" . ($_POST["u_name"]) . "%'";
		}
		

		$units=$this->Unit->loadarticle($filter);

	    foreach ( $units as $art1) {
	      echo "<tr>";
	      echo "<td>";
	      echo "<a href='index.php?p=unit/edit&id=$art1->id' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
	      ?>
	      <a href='index.php?p=unit/delete&id=<?php echo $art1->id; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' >حذف</a>
	      <?php
	      echo "</td>";
	      echo "<td>" . $art1->id ."</td>";
	       echo "<td>" . $art1->u_name ."</td>";
	      echo "<td>" . $art1->cat_name ."</td>";
	      


	      echo "</tr>";
		}
	}
	public function delete()
	{
	  $this->Unit->delete($_GET['id']);
	   header("Location:?p=Unit/index");
	}

	public function add(){
	  $units= $this->Unit->extract("id","u_name");
	   $cats=$this->Category->extract('id',"cat_name");
	  $form=new Form($_POST);
	  	if(isset($_POST['submit']) && !empty($_POST)){
		 $this->Unit->create([
				'u_name'=>$_POST['u_name'],
				'c_id'=>$_POST['c_id']

				]);
		   header("Location:?p=unit/index");
			
		} 
	   $this->render("unit/add",compact("form","units","cats"));
	}

	public function edit()
	{
		$id=$_GET['id'];
		$units= $this->Unit->find($id);
		$cats=$this->Category->extract('id',"cat_name");
		$form=new Form($units);
	 	if(isset($_POST['submit']) && !empty($_POST)){
			$this->Unit->update($id,[
				'u_name'=>$_POST['u_name'],
				'c_id'=>$_POST['c_id']

				]);	

			 header("Location:?p=unit/index");		   		
		}
		$this->render("unit/edit",compact("form","units","cats"));
		
	}
}