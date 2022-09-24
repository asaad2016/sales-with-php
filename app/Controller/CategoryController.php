<?php
namespace app\Controller;
use app\Model\CategoryModel;
use app;
use app\Html\Form;
class CategoryController extends Controller{
	
	public function __construct(){
		parent::__construct();
		$this->loadmodel("Category");
		
	}

	public function index()
	{
	  $cats=$this->Category->loadarticle();
	  $pagnate=$this->Category->paginate();
	  $form=new Form($_POST);
	  $this->render("category/index",compact('cats','pagnate','form'));
	}
	public function search()
	{
		$filter='';
		if(isset($_POST['cat_name']) && $_POST['cat_name'] !=""){
			$filter .=" where cat_name like '%" . ($_POST["cat_name"]) . "%'";
		}
		$cats=$this->Category->loadarticle($filter);
		foreach ( $cats as $art1) {
			echo "<tr>";
			echo "<td>";
			echo "<a href='#' class='btn btn-success btn-xs' style='margin-right:5px;'>عرض</a>";
			echo "<a href='index.php?p=category/edit&id=$art1->id' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
			?>
			<a href='index.php?p=category/delete&id=<?php echo $art1->id; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' >حذف</a>
			<?php
			echo "</td>";
			echo "<td>" . $art1->id ."</td>";
			echo "<td>" . $art1->cat_name ."</td>";
			


			echo "</tr>";
		}
	}
	public function delete()
	{
	  $this->Category->delete($_GET['id']);
	   header("Location:?p=category/index");
	}

	public function add(){
	  $cats= $this->Category->extract("id","cat_name");
	  $form=new Form($_POST);
	  	if(isset($_POST['submit']) && !empty($_POST)){
		 $this->Category->create([
				'cat_name'=>$_POST['cat_name']

				]);
		   header("Location:?p=category/index");
			
		} 
	   $this->render("category/add",compact("form","cats"));
	}

	public function edit()
	{
		$id=$_GET['id'];
		$cats= $this->Category->find($id);
		$form=new Form($cats);
	 	if(isset($_POST['submit']) && !empty($_POST)){
			$this->Category->update($id,[
				'cat_name'=>$_POST['cat_name']

				]);		
			 header("Location:?p=category/index");		   		
		}
		$this->render("category/edit",compact("form","cats"));
		
	}
}