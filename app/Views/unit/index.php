<?php
setcookie("sales","",time() + 24*36400);
?>
<style>
  .marginheader{
    margin-top: 280px;
  }
</style>
<div class="header-content">
  <h1><span class="glyphicon glyphicon-home"></span>السلع</h1>
  <section class="pull-left">
    <a href="?p=unit/add" class="btn btn-info">
      <i class="fa fa-plus"></i>
      <span class="hidden-xs hidden-sm">اضافة</span>
    </a>
    <a href="#" class="btn btn-primary" id="search-unit">
      <i class="fa fa-search"></i>
      <span class="hidden-xs hidden-sm">بحث</span>
    </a>
  </section>
  <section class="content">
   <table class="table table-bordered text-center table-responsive table-stripped table-hover">
    <thead>
      <tr>
      <th>لوحة التحكم</th>
       <th>الرقم</th>
       <th>اسم الوحدة</th>
       <th>اسم التصنيف</th>
             
     </tr>
   </thead>
   <tbody>
    <?php

   foreach ( $units as $art1) {
      echo "<tr>";
      echo "<td>";
      echo "<a href='index.php?p=unit/edit&id=$art1->id' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
      ?>
      <a href='index.php?p=unit/delete&id=<?php echo $art1->id; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' >حذف</a>
      <?php
      echo "</td>";
      echo "<td>" . $art1->id ."</td>";
       echo "<td>" . $art1->u_name ."</td>";
      echo "<td>" . $art1->cat_name ."</td>";
      


      echo "</tr>";
    }
   ?>
   <tbody>
   </table>
   <div class="text-center">
     <?php
        echo $pagnate;
      ?>
    </div>
 </section>               
</div> 
<div id="search-box-unit" style="display: none;position: absolute;top: 250px;right: 370px;background-color: rgb(64, 127, 165);">
  <form  action="" method="post">
    <div class="col-sm-12 col-md-12">
      <?= $form->input("u_name","اسم التصنيف","control-label","form-control");  ?>
    </div>
   <div class="col-sm-12">
      <?= $form->select("c_id","التصنيف",$cats,"control-label","form-control");   ?>
    </div>
    <div class="col-sm-12 col-md-12 text-center">
      <?= $form->submit("saveunit","بحث","btn btn-primary");  ?>
    </div>
  </form>
</div>
