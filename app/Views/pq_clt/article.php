<?php
setcookie("sales","",time() + 24*36400);
$mytitle="المبيعات";?>
<style>
  .marginheader{
    margin-top: 290px;
  }
</style>
<div class="header-content">
  <h1><span class="glyphicon glyphicon-home"></span>السلع</h1>
  <section class="pull-left">
    <a href="?p=pq_clt/add" class="btn btn-info">
      <i class="fa fa-plus"></i>
      <span class="hidden-xs hidden-sm">اضافة</span>
    </a>
    <a href="#" class="btn btn-primary" id="search">
      <i class="fa fa-search"></i>
      <span class="hidden-xs hidden-sm">بحث</span>
    </a>
    <a href="?p=pq_clt/printlist" class="btn btn-danger">
      <i class="fa fa-print"></i>
      <span class="hidden-xs hidden-sm">طباعة</span>
    </a>
  </section>
  <section class="content">
   <table class="table table-bordered text-center table-responsive table-stripped table-hover">
    <thead>
      <tr>
       <th>&nbsp;</th>
       <th>ID</th>
       <th>Num</th>
       <th>pproducct name</th>
       <th>qty</th>
       <th>Added By</th>
       <th>created_at</th>
     </tr>
   </thead>
   <tbody>
    <?php

    foreach ( $prs_clt as $art) {
     echo "<tr>";
     echo "<td>";
     echo "<a href='index.php?p=pq_clt/show&id=$art->id' class='btn btn-success btn-xs' style='margin-right:5px;'>عرض</a>";
     echo "<a href='index.php?p=pq_clt/edit&id=$art->id' class='btn btn-warning btn-xs' style='margin-right:5px;'>تعديل</a>";
     ?>
     <a href='index.php?p=pq_clt/delete&id=<?php echo $art->id; ?>'  class='btn btn-danger btn-xs' style='margin-right:5px;' onclick="deleteart()" art_id="<?php echo $art->id; ?>" >حذف</a>
     <?php
      echo "</td>";
      echo "<td>" . $art->id ."</td>";
      echo "<td>" . $art->pr_id ."</td>";
      echo "<td>" . $art->desig ."</td>";
      echo "<td>" . $art->qty ."</td>";
      echo "<td>" . $art1->username ."</td>";
      echo "<td>" . $art1->created_at ."</td>";
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
