<div class="header-content" style="padding-right: 15px;padding-left: 15px;">
  <h1><span class="glyphicon glyphicon-home"></span>اضافة تصنيف ديد جديد</h1> 
  <div class="content-form">
    <form  action="" method="post" id="form1" enctype="multipart/form-data">
      <?php
      echo $form->input("cat_name","اسم التصنيف","control-label","form-control",['required' =>'required']); 
      ?>
       <input type="submit" name="submit" value="حفظ" class="btn btn-primary">  
         
    </form>       
  </div>              
</div>                 