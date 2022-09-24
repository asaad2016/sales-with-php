<?php

namespace app\Model;
use app\database;
use app\Entity\EntityArticle;
class Model{
	protected $table="article";
	protected $db;


	function __construct(database $db){
		$this->db=$db;
	}

	function create($fields){
		$sql_part=[];
		$attribute=[];
		foreach ($fields as $k => $v) {
			$sql_part[]="$k=?";
			$attribute[]=$v;
		}
		$sql_part=implode(", ", $sql_part);
			$this->query("insert into {$this->table} set $sql_part ",$attribute);
		}

	function update($id,$fields,$field="id"){
		$sql_part=[];
		$attribute=[];
		foreach ($fields as $k => $v) {
			$sql_part[]="$k=?";
			$attribute[]=$v;
		}
		$attribute[]=$id;

	$sql_part=implode(", ", $sql_part);
	$this->query("update  {$this->table} set $sql_part where ".  $field . "=?",$attribute);
	}
	function delete($id,$filed="id"){
	 return $this->query("delete from " . $this->table . " where " .  $filed ."=?",[$id],true);
	}
	function search($id,$fields=null){

	}
	function find($id,$filed="id"){
	 return $this->query("select *  from " . $this->table . " where " . $filed . " =?",[$id],true);
	}
	public function query($stmt,$attribute=null,$one=false){
		if($attribute){
		return $this->db->prepare(
			$stmt,
			$attribute,
			$one,
			str_replace("Model", "Entity",get_class($this))
			);

		}
		else
		{
			return $this->db->query(
				$stmt,
				$one,
				str_replace("Model", "Entity",get_class($this))
			);
		}
	}
	function all(){
		return $this->query("select * from " . $this->table);
	}
	function extract($key,$value){
		$records=$this->all();
		$arr=[];
		foreach ($records as $row) {
			$arr[$row->$key]=$row->$value;
		}
		return $arr;

	}
	public function count1(){
		return $this->db->querycount("select * from " . $this->table);
	}
	public function links(){
    $a=explode(",", $this->changeperpage());
    $rows=$this->count1();
    $countrow=floor($rows/$a[1]);
    return $countrow;

 }
 public function getpageandperpage($page=1){
  if(isset($_GET['page']))
    {
      return $page=$_GET['page'];
    }
    else{
       return $page;
    }
 }
 function pageperpage($perpage,$page){
    $start=($this->getpageandperpage($page) * $perpage) - $perpage;
    return $start . ',' . $perpage;
 }
 function changeperpage($perpage=5,$page=1){
   return $this->pageperpage($perpage,$page);
 }
 function paginate(){
  $linkurl='';
  $a=explode(",", $this->changeperpage());
  for ($i=1; $i <= $this->links(); $i++) { 
            $linkurl .= "<a href='index.php?p=$this->table/index&page=$i&perpage=$a[1]' class='btn btn-warning btn-xs' style='margin-right:5px;'>$i</a>";
         }
         return $linkurl;
    } 
}