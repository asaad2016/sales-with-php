<?php  
$mytitle="اضافة فاتورة بيع";?>
<div class="header-content">
  <h1><span class="glyphicon glyphicon-home"></span>تعديل فاتورة البيع</h1>

  <div class="content-form">
     <form  action="" method="post" id="form1">
      <?php
      echo $form->input("num","رقم الفاتورة","control-label","form-control"); 
      echo $form->input("object","الموضوع","control-label","form-control"); 
      echo $form->input("discr","الوصف","control-label","form-control"); 
      echo $form->select("client_id","ااختر العميل",$clients,"control-label","form-control");
      ?>
       <input type="submit" name="submit" value="حفظ" class="btn btn-primary">
       
    </form> 
     
  </div>              
</div>                   