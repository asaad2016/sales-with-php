<?php

namespace app\Controller;


use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
class Controller{
   protected $viewpath;
   protected $template="default";
	public function __construct(){
		$this->viewpath=ROOT."/app/Views/";
	}
	protected function loadmodel($model_name){
        $this->$model_name=\app::getinstance()->getmodel($model_name);
	}
	public function render($view,$varible=[]){
         ob_start();
		 

         extract($varible);
         global $mytitle;
		include_once($this->viewpath.$view.".php");
		include_once(ROOT."/app/lib/funcsalses.php");
		$content=ob_get_clean();
		include_once($this->viewpath."templates/".$this->template.".php");

	}
	public function renderpdf($view,$varible=[]){
		require_once ROOT.'/lib/vendor/autoload.php';
         ob_start();
         extract($varible);
		include_once($this->viewpath.$view.".php");
		$content=ob_get_clean();
		try{
			$arr=array();
			$arr['a_meta_charset']="UTF-8";
			$arr['a_meta_dir']="rtl";
			$arr['a_meta_language']="fa";
			$arr['w_page']="page";
			$html2pdf = new Html2Pdf("P","A4","en");
			//$html2pdf->pdf->setLanguageArray($arr);
			$html2pdf->writeHTML($content);
			$html2pdf->output("articlekrkr.pdf");
		}
		catch(Html2PdfException $e){
			echo $e;
			exit();
		}
	} 
	public function renderpdfarabic($view,$varible=[]){
		require_once ROOT.'/lib/vendor/autoload.php';
         ob_start();
         extract($varible);
		include_once($this->viewpath.$view.".php");
		$content=ob_get_clean();
		try{
			$arr=array();
			$arr['a_meta_charset']="UTF-8";
			$arr['a_meta_dir']="rtl";
			$arr['a_meta_language']="fa";
			$arr['w_page']="page";
			$html2pdf = new Html2Pdf("P","A4","en");
			$html2pdf->pdf->setLanguageArray($arr);
			$html2pdf->writeHTML($content);
			$html2pdf->output("articlekrkr.pdf");
		}
		catch(Html2PdfException $e){
			echo $e;
			exit();
		}
	} 
	
	public function redirect($url){
		header("Location:" .$url);
	}
}