<?php
setcookie("sales","",time() + 24*36400);
$mytitle="السلع";?>
<style>
  .marginheader{
    margin-top: 340px;
  }
</style>
<div class="header-content">
  <h1><span class="glyphicon glyphicon-home"></span>السلع</h1>
  <section class="pull-left">
    <a href="?p=article/add" class="btn btn-info">
      <i class="fa fa-plus"></i>
      <span class="hidden-xs hidden-sm">اضافة</span>
    </a>
    <a href="#" class="btn btn-primary" id="search">
      <i class="fa fa-search"></i>
      <span class="hidden-xs hidden-sm">بحث</span>
    </a>
    <a href="?p=article/printlist" class="btn btn-danger">
      <i class="fa fa-print"></i>
      <span class="hidden-xs hidden-sm">طباعة</span>
    </a>
  </section>
  <section class="content">
   <table class="table table-bordered text-center table-responsive table-stripped table-hover">
    <thead>
      <tr>
       <th>التحكم</th>
       <th>الرقم</th>
       <th>كود المنتج</th>
       <th>اسم المنتج</th>
       <th>اسم المورد</th>
       <th>الضريبة</th>
       <th>الصنف</th>
       <th>تاوحدة</th>
     </tr>
   </thead>
   <tbody>
    <?php

    foreach ( $article as $art) {
     echo "<tr>";
     echo "<td>";
     echo "<a href='index.php?p=article/show&id=$art->id' class='btn btn-success btn-xs' style='margin-right:5px;'>عرض</a>";
     echo "<a href='index.php?p=article/edit&id=$art->id' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
     ?>
     <a href='index.php?p=article/delete&id=<?php echo $art->id; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' onclick="deleteart()" art_id="<?php echo $art->id; ?>" >حذف</a>
     <?php
     echo "</td>";
     echo "<td>" . $art->id ."</td>";
     echo "<td>" . $art->ref ."</td>";
     echo "<td>" . $art->desig ."</td>";
     echo "<td>" . $art->supplier_name ."</td>";
     echo "<td>" . $art->tax ."</td>";
     echo "<td>" . $art->cat_name ."</td>";
     echo "<td>" . $art->u_name ."</td>";
     
     
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
<div id="search-box" style="display: none;position: absolute;top: 245px;right: 206px;background-color: rgb(64, 127, 165);">
  <form  action="" method="post" name="form-article-add1">
    <div class="col-sm-12 col-md-6">
      <?= $form->input("ref","كود المنتج","control-label","form-control");   ?>
    </div>
    <div class="col-sm-12 col-md-6">
      <?= $form->input("desig","اسم المنتج","control-label","form-control");  ?>
    </div>
    <div class="col-sm-12 col-md-6">
      <?= $form->select("category_id","الصنف",$cat,"control-label","form-control");   ?>
    </div>
    <div class="col-sm-12 col-md-6">
      <?= $form->select("unit_id","الوحدات",$unit,"control-label","form-control");  ?>
    </div>
    <div class="col-sm-12 col-md-6">
      <?= $form->select("tax","الضريبة",$tax,"control-label","form-control");  ?>
    </div>
    <div class="col-sm-12 col-md-6">
      <?= $form->select("supplier_id","اسم المورد",$supplier,"control-label","form-control");  ?>
    </div>
    <div class="col-sm-12 col-md-6">
      <?= $form->submit("save","بحث","btn btn-primary");  ?>
    </div>
  </form>
</div>