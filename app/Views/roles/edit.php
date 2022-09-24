<?php  
$mytitle="تعديل بيانت الصلاحية";?>
<div class="header-content">
  <h1><span class="glyphicon glyphicon-home"></span>اضافة صلاحية جديدة</h1>
  <div class="content-form">
     <form  action="" method="post" id="form1" enctype="multipart/form-data">
      <?php
      echo $form->inputwithcol("rolename","اسم الصلاحية","control-label","form-control",12); 
      echo $form->selectwithcardoutobj("show_client","العملاء","control-label","form-control",4); 
      echo $form->selectwithcardoutobj("aed_client","اضافة العملاء","control-label","form-control",4);
     echo $form->selectwithcardoutobj("show_sales","المبيعات","control-label","form-control",4);
     echo $form->selectwithcardoutobj("aed_sales","اضافة المبيعات","control-label","form-control",4);

     echo $form->selectwithcardoutobj("show_purchase","المشتريات","control-label","form-control",4);
     echo $form->selectwithcardoutobj("aed_purchase","اضافة المشتريات","control-label","form-control",4);
     echo $form->selectwithcardoutobj("show_article","المنتجات","control-label","form-control",4);
    echo $form->selectwithcardoutobj("aed_article","اضافة المنتج","control-label","form-control",4);
     echo $form->selectwithcardoutobj("show_stock","المخزون","control-label","form-control",4);
     echo $form->selectwithcardoutobj("show_users_roles","المستخدمين","control-label","form-control",4);
     echo $form->selectwithcardoutobj("aed_users_roles","اضافة المستخدمين","control-label","form-control",4 . " pull-right");
   
      ?>
      <div class="form-group col-sm-12 text-center">
        <input type="submit" name="submit" value="حفظ" class="btn btn-primary btn-lg">
      </div>
       
    </form> 
     
  </div>              
</div>                