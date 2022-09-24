<?php
namespace app\Model;

class UploadModel extends Model  
{
 public static function once($files,$fileupload){
 	move_uploaded_file($files['tmp_name'], "upload/" . $fileupload);
 }

}