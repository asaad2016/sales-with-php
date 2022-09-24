<?php
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;

		require_once ROOT.'/lib/vendor/autoload.php';
         ob_start();
         extract("code" =>$_GET['code']);
		include_once("info.php");
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
			$html2pdf->output("1.pdf");
		}
		catch(Html2PdfException $e){
			echo $e;
			exit();
		}
	} 