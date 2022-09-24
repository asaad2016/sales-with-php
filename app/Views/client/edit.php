<?php  
$mytitle="تعديل بيانات العميل";?>
<div class="header-content">
  <ol class="breadcrumb">
      <li><a href="?p=client/add">
      <i class="fa fa-plus">اضافة عميل جديد</i></a>
      </li>
      <li><a href="?p=client/"><i class="fa fa-dashboard"></i> لوحة تحكم العملاء</a></li>
      <li><a href="/"><i class="fa fa-home"></i>الرئسية</a></li>
  </ol>
  <h1><span class="glyphicon glyphicon-home"></span>تعديل بيانات العميل</h1> 
  <div class="content-form">
    <form  action="" method="post" id="form1" enctype="multipart/form-data">
      <?php
      echo $form->input("client_name","اسم العميل","control-label","form-control",['required' =>'required']); 
       echo $form->input("address","العنوان","control-label","form-control",['required' =>'required']); 
        echo $form->input("email","الايميل","control-label","form-control",['required' =>'required']); 
      ?>
       <input type="submit" name="submit" value="تعديل" class="btn btn-primary">  
         
    </form>       
  </div>              
</div>                 