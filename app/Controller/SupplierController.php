<?php
namespace app\Controller;
use app\Model\SupplierModel;
use app;
use app\Html\Form;
class SupplierController extends Controller{
	
	public function __construct(){
		parent::__construct();
		$this->loadmodel("Supplier");
		
		
	}

	public function index()
	{
	  $supplier=$this->Supplier->loadarticle();
	  $pagnate=$this->Supplier->paginate();
	  $form=new Form($_POST);
	  $this->render("supplier/index",compact("supplier","pagnate","form"));
	}
	public function search()
	{
		$filter='';
		if(isset($_POST['supplier_name']) && $_POST['supplier_name'] !=""){
			$filter .=" where supplier_name like '%" . ($_POST["supplier_name"]) . "%'";
		}
		

		$supplier=$this->Supplier->loadarticle($filter);

	    foreach ( $supplier as $art1) {
	      echo "<tr>";
	      echo "<td>";
	      echo "<a href='index.php?p=supplier/edit&id=$art1->id' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
	      ?>
	      <a href='index.php?p=supplier/delete&id=<?php echo $art1->id; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' >حذف</a>
	      <?php
	      echo "</td>";
	      echo "<td>" . $art1->id ."</td>";
	      echo "<td>" . $art1->supplier_name ."</td>";
	      echo "<td>" . $art1->address ."</td>";
	      echo "<td>" . $art1->email ."</td>";
	      


	      echo "</tr>";
		}
	}
	public function delete()
	{
	  $this->Supplier->delete($_GET['id']);
	   header("Location:?p=supplier/index");
	  
	}

	public function add(){
	  $form=new Form($_POST);
	  $supplier=$this->Supplier->extract("id","supplier_name");

		if(!empty($_POST)){
		   $this->Supplier->create([
	      		'supplier_name'=>$_POST['supplier_name'],
				'address'=>$_POST['address'],
				'email'=>$_POST['email']
				
			

			]);
			 header("Location:?p=supplier/index");
		} 

	   $this->render("supplier/add",compact("form","supplier"));
	}

	public function edit()
	{
		$id=isset($_GET['id']) ? $_GET['id'] : 0;
	 	$supplier= $this->Supplier->find($id);

	  	$form=new Form($supplier);
		if(!empty($_POST)){
		   $this->Supplier->update($id,[
	      		'supplier_name'=>$_POST['supplier_name'],
				'address'=>$_POST['address'],
				'email'=>$_POST['email']		

			]);	
		    header("Location:?p=supplier/index");
		} 

	   $this->render("supplier/edit",compact("form","supplier"));
	} 
	public function model()
	{
	  $supplier=$this->Supplier->all();
	  $rs='';
	  foreach ( $supplier as $art) {
	     $rs .= '<tr>
	       <td>
	       <a href="#"  class="btn btn-info btn-xs" id="choose" style="margin-right:5px;"" supplier_id="' .  $art->id .'" onclick="selectsupplier(this);" >اختر</a>
	     
	       </td>
	       <td>' . $art->id . ' </td>
	       <td class="supplier_name">' . $art->supplier_name . '</td>
	       <td>' . $art->email .'</td>
     	</tr>';
                }
            return $rs;
	 
	}
}