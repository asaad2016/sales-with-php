<?php
namespace app\Controller;
use app\Model\Pq_cltModel;
use app\Model\Pr_clt_artModel;
use app\Model\ClientModel;
use app;
use app\Html\Form;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
class Pq_cltController extends Controller{
	
	public function __construct(){
		parent::__construct();
		$this->loadmodel("Pq_clt");
		$this->loadmodel("Pr_clt_art");
		$this->loadmodel("Client");
		$this->loadmodel("User");		
	}

	public function index()
	{
	  $prs=$this->Pq_clt->loadarticle();
	  $users=$this->User->extract("userid","username");
	  $clients=$this->Client->extract("id","client_name");
	  $form=new Form($_POST);
	  $pagnate=$this->Pq_clt->paginate();
	  $this->render("pq_clt/index",compact("prs",'form','pagnate','users','clients'));
	}
	public function article()
	{
	  $prs_clt=$this->Pr_clt_art->loadarticle();
	  $form=new Form($_POST);
	  $pagnate=$this->Pr_clt_art->paginate();
	  $this->render("pq_clt/article",compact("prs_clt",'form','pagnate','users','clients'));
	}
	public function search()
	{
		$filter='';
		if(isset($_POST['created_by']) && $_POST['created_by'] !=""){
			$filter .=" and created_by like = " . ($_POST["created_by"]) . "";
		}
		if(isset($_POST['num']) && $_POST['num']!=""){
			$filter .=" and num like = " . ($_POST["num"]) . "";
		}
		if(isset($_POST['client_id']) && $_POST['client_id']!=""){
			$filter .=" and client_id like = " . ($_POST["client_id"]) . "";
		}
		$_SESSION['filter']=$filter;
		$prs=$this->Pq_clt->loadarticle($filter);
		foreach ( $prs as $art1) {
			echo "<tr>";
			echo "<td>";
			echo "<a href='#' class='btn btn-success btn-xs' style='margin-right:5px;'>عرض</a>";
			echo "<a href='index.php?p=pq_clt/edit&id=$art1->id' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
			?>
			<a href='index.php?p=pq_clt/delete&id=<?php echo $art1->id; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' onclick="deleteart()" art_id="<?php echo $art->id; ?>" >حذف</a>
			<?php
			echo "</td>";
			echo "<td>" . $art1->id ."</td>";
			echo "<td>" . $art1->num ."</td>";
			echo "<td>" . $art1->discr ."</td>";
			echo "<td>" . $art1->object ."</td>";
			echo "<td>" . $art1->client_name ."</td>";
			echo "<td>" . $art1->created_at ."</td>";
			echo "<td>" . $art1->username ."</td>";


			echo "</tr>";
			$pagnate=$this->pq_clt->paginate();
		}
	}
	public function delete()
	{
	  $this->Pq_clt->delete($_GET['id']);
	   header("Location:?p=pq_clt/index");
	  
	}

	public function add(){
		$clients=$this->Client->extract("id","client_name");
		$form=new Form($_POST);
	  	if(isset($_POST['submit']) && !empty($_POST)){
		 $this->Pq_clt->create([
	      'num'=>$_POST['num'],
				'discr'=>$_POST['discr'],
				'object'=>$_POST['object'],
				'client_id'=>$_POST['client_id'],
				'created_by'=>$_SESSION['username'][0]->userid,
				'updated_by'=>$_SESSION['username'][0]->userid,
			]);
		   header("Location:?p=pq_clt/index");
			
		} 

		
	   $this->render("pq_clt/add",compact("form","clients"));
	}

	public function edit()
	{
		$id=$_GET['id'];
		$clients=$this->Client->extract("id","client_name");
	 	$prs= $this->Pq_clt->find($id);
		$form=new Form($prs);
	 	if(isset($_POST['submit']) && !empty($_POST)){
			$this->Pq_clt->update($id,[
	      		'num'=>$_POST['num'],
				'discr'=>$_POST['discr'],
				'object'=>$_POST['object'],
				'client_id'=>$_POST['client_id'],
				'created_by'=>$_SESSION['username'][0]->userid,
				'updated_by'=>$_SESSION['username'][0]->userid,
			]);
		   header("Location:?p=pq_clt/index");
			
		} 

		
	   $this->render("pq_clt/edit",compact("form","clients"));
	}
} 