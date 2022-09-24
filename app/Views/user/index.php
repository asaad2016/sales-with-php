<?php
setcookie("sales","",time() + 24*36400);
?>
<style>
  .marginheader{
    margin-top: 280px;
  }
  .avtarimg{
    width: 100px;
    height: 100px;
  }
</style>
<div class="header-content">
  <h1><span class="glyphicon glyphicon-home"></span>السلع</h1>
  <section class="pull-left">
    <a href="?p=user/add" class="btn btn-info">
      <i class="fa fa-plus"></i>
      <span class="hidden-xs hidden-sm">اضافة</span>
    </a>
    <a href="#" class="btn btn-primary" id="search-user">
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
       <th>الاسم</th>
       <th>الصورة</th>
       <th>الايميل</th>
       <th>التليفون</th>
       <th>الصلاحيات</th>
             
     </tr>
   </thead>
   <tbody>
    <?php

   foreach ( $users as $art1) {
      echo "<tr>";
      echo "<td>";
      echo "<a href='index.php?p=user/show&id=$art1->userid' class='btn btn-success btn-xs' style='margin-right:5px;'>عرض</a>";
      echo "<a href='index.php?p=user/edit&id=$art1->userid' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
      ?>
      <a href='index.php?p=user/delete&id=<?php echo $art1->userid; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' >حذف</a>
      <?php
      echo "</td>";
      echo "<td>" . $art1->userid ."</td>";
      echo "<td>" . $art1->username ."</td>";
      echo "<td><img class='img-thumbnail img-circle avtarimg' src='upload/" . $art1->avtar . "'</td>";
      echo "<td>" . $art1->email ."</td>";
      echo "<td>" . $art1->phone ."</td>";
      echo "<td>" . $art1->rolename ."</td>";
      


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

