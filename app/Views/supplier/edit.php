<?php  
$mytitle="تعديل بيانات المورد";?>
<div class="header-content">
  <ol class="breadcrumb">
      <li><a href="?p=supplier/add">
      <i class="fa fa-plus">اضافة مورد جديد</i></a>
      </li>
      <li><a href="?p=supplier/"><i class="fa fa-dashboard"></i> لوحة تحكم الموردين</a></li>
      <li><a href="?p=article/index"><i class="fa fa-home"></i>الرئسية</a></li>
  </ol>
  <h1><span class="glyphicon glyphicon-home"></span>تعديل بيانات المورد</h1> 
  <div class="content-form">
    <form  action="" method="post" id="form1" enctype="multipart/form-data">
      <?php
      echo $form->input("supplier_name","اسم المورد","control-label","form-control",['required' =>'required']); 
       echo $form->input("address","العنوان","control-label","form-control",['required' =>'required']); 
        echo $form->input("email","الايميل","control-label","form-control",['required' =>'required']); 
      ?>
       <input type="submit" name="submit" value="تعديل" class="btn btn-primary">  
         
    </form>       
  </div>              
</div>                 