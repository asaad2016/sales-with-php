<?php

namespace app\Html;


class Form
{
	private $data;
	
	function __construct($data=array())
	{
		$this->data=$data;
	}
	function getvalue($index)
	{
		if(is_object($this->data)){
			return $this->data->$index;
		}
		return isset($this->data[$index]) ? $this->data[$index] : null;
	}
	public function surrount($html){
			return "<div class='form-group'>" . $html ."</div>";
	}
	public function input($name,$lbl,$l_c=null,$input_c=null,$attribute=[]){
		$label="<label class='".$l_c."' for='".$name."'>" . $lbl . "</label>    ";
		$input="<input type='text' name='".$name."' id='".$name."' class='".$input_c."' value='" . $this->getvalue($name) . "'" .  $this->extractattribute($attribute) . "/>";
		
		return $this->surrount($label.$input);
	}
	public function inputwithcol($name,$lbl,$l_c=null,$input_c=null,$col=6,$col2=12,$attribute=[]){
		$div="";
		$div .='<div class="col-md-"' . $col . '" col-sm-"' . $col2 . '">'; 
		$label="<label class='".$l_c."' for='".$name."'>" . $lbl . "</label>    ";
		$input="<input type='text' name='".$name."' id='".$name."' class='".$input_c."' value='" . $this->getvalue($name) . "'" .  $this->extractattribute($attribute) . "/>";
		$div .='</div>';
		
		return $this->surrount($div.$label.$input);
	}
	public function password($name,$lbl,$l_c=null,$input_c=null,$attribute=[]){
		$label="<label class='".$l_c."' for='".$name."'>" . $lbl . "</label>    ";
		$input="<input type='password' autocomplete='new-password' name='".$name."' id='".$name."' class='".$input_c."' value='" . $this->getvalue($name) . "'" .  $this->extractattribute($attribute) . "/>";
		
		return $this->surrount($label.$input);
	}
	public function email($name,$lbl,$l_c=null,$input_c=null,$attribute=[]){
		$label="<label class='".$l_c."' for='".$name."'>" . $lbl . "</label>    ";
		$input="<input type='email' name='".$name."' id='".$name."' class='".$input_c."' value='" . $this->getvalue($name) . "'" .  $this->extractattribute($attribute) . "/>";
		
		return $this->surrount($label.$input);
	}


	public function file($name,$lbl,$l_c=null,$input_c=null,$attribute=[],$form='form1'){
		$label="<label class='".$l_c."' for='".$name."'>" . $lbl . "</label>    ";
		$input="<input type='file' name='".$name."' id='".$name."' class='".$input_c."' value='" . $this->getvalue($name) ."' form='". $form ."'" .  $this->extractattribute($attribute) . "/>";
		
		return $this->surrount($label.$input);
	}
	public function filoutlbl($name,$lbl,$l_c=null,$input_c=null,$form=null,$attribute=[]){
		$input="<input type='file' name='".$name."' id='".$name."' class='".$input_c."' value='" . $this->getvalue($name) ."' form='". $form ."'" .  $this->extractattribute($attribute) . "/>";
		
		return $this->surrount($input);
	}

	public function submit($name,$label,$input_c=null){
	
		$input="<input type='submit' name='".$name."' id='".$name."'  class='".$input_c."' value='" . $label . "' >";
		
		return $this->surrount($input);
	}
	public function textarea($name,$lbl,$l_c=null,$input_c=null){
		$label="<label class='".$l_c."'>" . $lbl . "</label>    ";
		$input="<textarea name='".$name."' class='".$input_c."'>" . $this->getvalue($name) ."</textarea>";
		
		return $this->surrount($label.$input);
	}
	public function select($name,$lbl,$option,$l_c=null,$input_c=null)
	{
		$label="<label class='".$l_c."' for='" . $name ."'>" . $lbl . "</label>";	
		$select="<select name='" . $name . "' id='" . $name . "' class='".$input_c."'>";
		foreach ($option as $k=> $v) {
			$opattr='';
			if($k==$this->getvalue($name)){
				$opattr="selected";
			}
			$select.="<option value='{$k}' {$opattr}>{$v}</option>";
		}
		
		$select.="</select>";
		
		return $this->surrount($label.$select);
	}
	public function selectwithcoloutobj($name,$lbl,$l_c=null,$input_c=null,$col=6,$col2=12)
	{
		
		$div1 ="<div class='col-md-" . $col . " col-sm-" . $col2 . "'>"; 
		$label="<label class='".$l_c."' for='" . $name ."'>" . $lbl . "</label>";	
		$select="<select name='" . $name . "' id='" . $name . "' class='".$input_c."'>";
		$select.="<option value=1>نعم</option>";
		$select.="<option value=0>لا</option>";
	
		
		$select .="</select>";
		$div2 ="</div>";
		
		return $div1.$label.$select.$div2;
	}
	public function selectwithcardoutobj($name,$lbl,$l_c=null,$input_c=null,$col=6,$col2=12)
	{
		
		$div1 ="<div class='col-md-" . $col . " col-sm-" . $col2 . "'>"; 
		$panal1= "<div class='panel panel-primary'>";
		$panalheading1 ="<div class='panel-heading' style='height:50px'>";
		$span='<span class="pull-right" style="font-size: 30px;">' . $lbl . '</span>';
		$panalheading2="</div>";
		$panalbody1="<div class='panel-body'>";	
		$select="<select name='" . $name . "' id='" . $name . "' class='".$input_c."'>";
		$select.="<option value=1>نعم</option>";
		$select.="<option value=0>لا</option>";
	
		
		$select .="</select>";
		$panalbody2="</div>";
		$panal2="</div>";
		$div2 ="</div>";
		
		return $div1.$panal1.$panalheading1.$span.$panalheading2.$panalbody1.$select.$panalbody2.$panal2.$div2;
	}
	public function extractattribute($attribute){
		$arr='';
		foreach ($attribute as $key => $value) {
			$arr .=$key . "='" . $value . "' ";
		}
		return $arr;

	}
}