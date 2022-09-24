<?php
setcookie("sales","",time() + 24*36400);
$mytitle="الصلاحيات";?>
<style>
  .marginheader{
    margin-top: 340px;
  }
</style>
<div class="header-content">
  <h1><span class="glyphicon glyphicon-home"></span>الصلاحيات</h1>
  <section class="pull-left">
    <a href="?p=roles/add" class="btn btn-info">
      <i class="fa fa-plus"></i>
      <span class="hidden-xs hidden-sm">اضافة</span>
    </a>
  </section>
  <section class="content">
   <table class=" text-center table table-responsive   table-responsive table-stripped table-hover">
   <tbody>
    <?php
  
    foreach ( $roles as $art) {?>
    <tr>
      <td>
        <a href="index.php?p=roles/edit&id=<?= $art->roleid;?>"" class='btn btn-warning' style='margin-right:5px;'">تعديل</a>
        <?php if($art->roleid > 1){?>
          <a href="index.php?p=roles/delete&id=<?= $art->roleid;?>"" class='btn btn-danger' style='margin-right:5px;'">حذف</a>
          <?php
          echo "<h4>" . $art->rolename . "</h4>";
        }else{
           echo "<h4> ادمن </h4>";
        }?>
        </td>
        <td class="td-roles">
          <p>
            <span>العملاء</span>
           
             <?php 
             if($art->show_client == 1){ ?>
                <span class="fa-roles-true">
                  <i class="fa fa-circle"></i>
                </span>
              <?php 
              }else{ ?>
                <span class="fa-roles-false">
                  <i class="fa fa-circle"></i>
                </span>

            <?php } 
            if($art->aed_client == 1){ ?>
                <span class="fa-roles-true">
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>
              <?php 
              }else{ ?>
                <span class="fa-roles-false">
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>

            <?php } ?>
          </p>
          <p>
            <span>المبيعات</span>
           
             <?php 
             if($art->show_sales == 1){ ?>
                <span class="fa-roles-true">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>
              <?php 
              }else{ ?>
                <span class="fa-roles-false">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>

            <?php } ?>
          </p>
          <p>
            <span>المشتريات</span>
           
             <?php 
             if($art->show_purchase == 1){ ?>
                <span class="fa-roles-true">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>
              <?php 
              }else{ ?>
                <span class="fa-roles-false">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>

            <?php } ?>
          </p>
          <p>
            <span>المنتجات</span>
           
             <?php 
             if($art->show_article == 1){ ?>
                <span class="fa-roles-true">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>
              <?php 
              }else{ ?>
                <span class="fa-roles-false">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>

            <?php } ?>
          </p>
          <p>
            <span>المخازن</span>
           
             <?php 
             if($art->show_stock == 1){ ?>
                <span class="fa-roles-true">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>
              <?php 
              }else{ ?>
                <span class="fa-roles-false">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>

            <?php } ?>
          </p>
          <p>
            <span>صلاحيات المستخدمين</span>
           
             <?php 
             if($art->show_users_roles == 1){ ?>
                <span class="fa-roles-true">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>
              <?php 
              }else{ ?>
                <span class="fa-roles-false">
                  <i class="fa fa-circle"></i>
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-remove"></i>
                </span>

            <?php } ?>
          </p>
        </td>
    </tr>
   <?php
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
