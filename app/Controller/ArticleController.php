<?php
namespace app\Controller;

use app\Model\ArticleModel;
use app\Model\CategoryModel;
use app\Model\UnitModel;
use app\Model\TaxModel;
use app\Model\UploadModel;
use app;
use app\Html\Form;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
class ArticleController extends Controller{
	
	public function __construct(){
		parent::__construct();
		$this->loadmodel("Article");
		$this->loadmodel("Category");
		$this->loadmodel("Unit");
		$this->loadmodel("Tax");
		$this->loadmodel("Supplier");
		
	}

	public function index()
	{
	  $article=$this->Article->loadarticle();
	  $cat= $this->Category->extract("id","cat_name");
	  $unit= $this->Unit->extract("id","u_name");
	  $tax= $this->Tax->extract("tax","tax");
	  $supplier= $this->Supplier->extract("id","supplier_name");
	  $form=new Form($_POST);
	  $pagnate=$this->Article->paginate();
	  $this->render("article/index",compact("article",'cat','unit','supplier','tax','form','pagnate'));
	}
	public function search()
	{
		$filter='';
		if(isset($_POST['ref']) && $_POST['ref'] !=""){
			$filter .=" and ref like '%" . ($_POST["ref"]) . "%'";
		}
		if(isset($_POST['desig']) && $_POST['desig']!=""){
			$filter .=" and desig like '%" . ($_POST["desig"]) . "%'";;
		}
		if(isset($_POST['supplier_name']) && $_POST['supplier_name']!=""){
			$filter .=" and supplier_name = " . ($_POST["supplier_name"]) . "";
		}
		if(isset($_POST['tax']) && $_POST['tax'] !=""){
			$filter .=" and tax = " . ($_POST["tax"]) . "";
		}
		if(isset($_POST['cat_name']) && $_POST['cat_name'] !=""){
			$filter .=" and cat_name = " . $_POST['cat_name'] . ""; 
		}
		if(isset($_POST['u_name']) && $_POST['u_name']!=""){
			$filter .=" and u_name = " . ($_POST["u_name"]) . "";  ;
		}
		$_SESSION['filter']=$filter;
		$articles=$this->Article->loadarticle($filter);
		foreach ( $articles as $art1) {
			echo "<tr>";
			echo "<td>";
			echo "<a href='#' class='btn btn-success btn-xs' style='margin-right:5px;'>عرض</a>";
			echo "<a href='index.php?p=article/edit&id=$art1->id' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
			?>
			<a href='index.php?p=article/delete&id=<?php echo $art1->id; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' onclick="deleteart()" art_id="<?php echo $art->id; ?>" >حذف</a>
			<?php
			echo "</td>";
			echo "<td>" . $art1->id ."</td>";
			echo "<td>" . $art1->ref ."</td>";
			echo "<td>" . $art1->desig ."</td>";
			echo "<td>" . $art1->supplier_name ."</td>";
			echo "<td>" . $art1->tax ."</td>";
			echo "<td>" . $art1->cat_name ."</td>";
			echo "<td>" . $art1->u_name ."</td>";


			echo "</tr>";
			$pagnate=$this->Article->paginate();
		}
	}
	public function delete()
	{
	  $artdelete=new ArticleModel(app::getinstance()->getdb());
	  $artdelete->delete($_GET['id']);
	  
	}

	public function add(){
	  $cat= $this->Category->extract("id","cat_name");
	  $unit= $this->Unit->extract("id","u_name");
	  $tax= $this->Tax->extract("tax","tax");
	  $form=new Form($_POST);
	  	if(isset($_POST['submit']) && !empty($_POST)){
		 $this->Article->create([
	      'ref'=>$_POST['ref'],
				'desig'=>$_POST['desig'],
				'supplier_id'=>$_POST['supplier_info'],
				'tax'=>$_POST['tax'],
				'unit_id'=>$_POST['unit_id'],
				'category_id'=>$_POST['category_id'],
				
				'created_by'=>date("d-m-Y"),
				'updated_by'=>date("d-m-Y"),
				'thumb'=>$_FILES['thumb']['name']

				]);
			UploadModel::once($_FILES['thumb'],$_FILES['thumb']['name']);
		   header("Location:?p=article/index");
			
		} 

		
	   $this->render("article/add",compact("form","cat","unit","tax"));
	}

	public function edit()
	{
		$id=$_GET['id'];
		$cat= $this->Category->extract("id","cat_name");
	  	$unit= $this->Unit->extract("id","u_name");
	  	$tax= $this->Tax->extract("tax","tax");
	 	$articles= $this->Article->find($id);
	 	$supplier= $this->Supplier->findsupplier($articles->supplier_id);
		$form=new Form($articles);
	 	if(isset($_POST['submit']) && !empty($_POST)){
			$this->Article->update($id,[
	      		'ref'=>$_POST['ref'],
				'desig'=>$_POST['desig'],
				'supplier_id'=>$_POST['supplier_info'],
				'tax'=>$_POST['tax'],
				'unit_id'=>$_POST['unit_id'],
				'category_id'=>$_POST['category_id'],			
				'updated_by'=>date("d-m-Y"),
				'thumb'=>$_FILES['thumb']['name']

				]);
			UploadModel::once($_FILES['thumb'],$_FILES['thumb']['name']);
			 header("Location:?p=article/index");
		   		
		}

		 $this->render("article/edit",compact("form","cat","unit","tax","articles","supplier")); 

		
	}
	public function printlist()
	{
		$filter='';
		
		if(isset($_SESSION['filter'])){
			$filter=($_SESSION['filter']);
			
		}
		$article=$this->Article->loadarticle($filter);
		 $this->renderpdf("article/printlist",compact("article")); 

	
		
	}
	public function show()
	{
		
		$id=$_GET['id'];
		$article=$this->Article->findarticle($id);
		 $this->render("article/show",compact("article")); 
	}
	public function printshow()
	{
		$id=$_GET['id'];
		$article=$this->Article->findarticle($id);
		 $this->renderpdfarabic("article/printshow",compact("article")); 
		
	}
} 