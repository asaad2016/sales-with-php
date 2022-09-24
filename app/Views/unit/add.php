<div class="header-content">
  <ol class="breadcrumb">
      <li><a href="?p=unit/add">
      <i class="fa fa-plus">اضافة وحدة جديد</i></a>
      </li>
      <li><a href="?p=unit/"><i class="fa fa-dashboard"></i> لوحة تحكم الوحدات</a></li>
      <li><a href="?p=article/index"><i class="fa fa-home"></i>الرئسية</a></li>
  </ol>
  <h1><span class="glyphicon glyphicon-home"></span>اضافة وحدة ديد جديد</h1> 
  <div class="content-form">
    <form  action="" method="post" id="form1" enctype="multipart/form-data">
      <?php
      echo $form->input("u_name","اسم الوحدة","control-label","form-control",['required' =>'required']); 
      
      echo $form->select("c_id","اسم التصنيف",$cats,"control-label","form-control",['required' =>'required']); 
      ?>
       <input type="submit" name="submit" value="حفظ" class="btn btn-primary">  
         
    </form>       
  </div>              
</div>                 