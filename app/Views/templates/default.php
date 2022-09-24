<!Doctype html/>
<html>
      <head>
        <meta charset="utf-8">
        <title><?php gettitle($mytitle); ?></title>
   
 
 <link rel="stylesheet" href='<?= app::$path; ?>css/bootstrap.min.css' />
           <link rel="stylesheet" href='<?= app::$path; ?>css/font-awesome.min.css'  />

          <link rel="stylesheet" href="<?= app::$path; ?>css/ab.css" />
    </head>
        <body class="body-sidebar">
<nav class="navbar navbar-default">
  
    <!-- Brand and toggle get grouped for better mobile display -->
    <!--div class="navbar-header">
      <button id="togglecollapse">
     
        <span class="glyphicon glyphicon-menu-hamburger"></span>
       
      </button-->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="togglecollapse1" aria-expanded="false">
     
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--a class="navbar-brand" href="#">Brand</a>
           <img src="images/child.jpeg" />
    </div-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
    
     
       
       <li class="dropdown dds">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-flag"></span>
              <img src="<?= app::$path; ?>images/child.jpeg" width="40" height="40px"/>
              <span class="username"><p>
              <?php if(isset($_SESSION['username'])){
                  echo $_SESSION['username'][0]->username;
                } 
                 else
                { 
                  echo "Hi";
                }
                ?></p></span>
                 </a>
          <ul class="dropdown-menu">
            <li class="user-header"><img src="<?= app::$path; ?>images/child.jpeg"  width="40" height="40px"/>
              <span class="username"><p><?php if(isset($_SESSION['username'])) echo $_SESSION['username'][0]->username; else echo "";?></p></span></li>
            <li class="user-body">
              <div class="col-xs-4"><a href="#">المبيعات</a></div>
                <div class="col-xs-4"><a href="#">المشتريات</a></div>
                  <div class="col-xs-4"><a href="#">خيار</a></div>
              </li>
               <li class="user-footer">
              <button class="pull-right btn btn-success">تسجيل الدخول</button>
                    <button class="pull-left btn btn-danger">خروج</button>
              
              </li>
            
          </ul>
        </li>
        <?php
          if(isset($_SESSION['username'])){
            echo '<li><a href="index.php?p=user/logout">تسجيل الخروج</a></li>';
           
          }else{
             echo ' <li> <a href="index.php?p=user/login">تسجيل الدخول</a></li>';
             echo '<li><a href="index.php?p=user/register">تسجيل عضوية جديدة</a></li>';
          }

        ?>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
    
      
         
                    <button id="togglecollapse">
     
        <span class="glyphicon glyphicon-menu-hamburger"></span>
       
      </button>
              </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  <div class="logo"><h2>الشعار</h2></div>
</nav>
  <div class="sidebar">
            <section class="main-sidebar">
             <div class="gnav">
                <div class="gnav-header">
                 <a class="has-childs collapsed" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                 <span class="glyphicon glyphicon-edit"></span>
                 <span class="hidden-on-collapse">المنتجات</span>
                    </a>
                 </div>
                  <ul class="subnav collapse" id="collapseExample">
                  <?php 
                  if(isset($_SESSION['username']) && $_SESSION['username'][0]->show_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=article/index">
                         <span class="glyphicon glyphicon-edit"></span>
                     <span class="hidden-on-collapse">عرض المنتجات</span>
                        </a>
                     </li>
                   <?php endif; 
                   if(isset($_SESSION['username']) && $_SESSION['username'][0]->aed_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=article/add">
                       <span class="glyphicon glyphicon-edit"></span>
                   <span class="hidden-on-collapse">اضافة منتج</span>
                      </a>
                   </li>
                    <?php endif; ?>
                  </ul>
             </div>
              <div class="gnav">
                <div class="gnav-header">
                 <a class="has-childs collapsed" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                 <span class="glyphicon glyphicon-edit"></span>
                 <span class="hidden-on-collapse">التصنيفات</span>
                    </a>
                 </div>
                  <ul class="subnav collapse" id="collapseExample1">
                  <?php 
                  if(isset($_SESSION['username']) && $_SESSION['username'][0]->show_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=category/index">
                         <span class="glyphicon glyphicon-edit"></span>
                     <span class="hidden-on-collapse">التصنيف</span>
                        </a>
                     </li>
                   <?php endif; 
                   if(isset($_SESSION['username']) && $_SESSION['username'][0]->aed_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=category/add">
                       <span class="glyphicon glyphicon-edit"></span>
                   <span class="hidden-on-collapse">اضافة تصنيف</span>
                      </a>
                   </li>
                    <?php endif; ?>
                  </ul>
             </div>
              <div class="gnav">
                <div class="gnav-header">
                 <a class="has-childs collapsed" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                 <span class="glyphicon glyphicon-edit"></span>
                 <span class="hidden-on-collapse">الموردين</span>
                    </a>
                 </div>
                  <ul class="subnav collapse" id="collapseExample">
                  <?php 
                  if(isset($_SESSION['username']) && $_SESSION['username'][0]->show_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=supplier/index">
                         <span class="glyphicon glyphicon-edit"></span>
                     <span class="hidden-on-collapse">الموردين</span>
                        </a>
                     </li>
                   <?php endif; 
                   if(isset($_SESSION['username']) && $_SESSION['username'][0]->aed_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=supplier/add">
                       <span class="glyphicon glyphicon-edit"></span>
                   <span class="hidden-on-collapse">اضافة مورد</span>
                      </a>
                   </li>
                    <?php endif; ?>
                  </ul>
             </div>
               <div class="gnav">
                <div class="gnav-header">
                 <a class="has-childs collapsed" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                 <span class="glyphicon glyphicon-edit"></span>
                 <span class="hidden-on-collapse">العملاء</span>
                    </a>
                 </div>
                  <ul class="subnav collapse" id="collapseExample2">
                  <?php 
                  if(isset($_SESSION['username']) && $_SESSION['username'][0]->show_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=client/index">
                         <span class="glyphicon glyphicon-edit"></span>
                     <span class="hidden-on-collapse">العملاء</span>
                        </a>
                     </li>
                   <?php endif; 
                   if(isset($_SESSION['username']) && $_SESSION['username'][0]->aed_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=client/add">
                       <span class="glyphicon glyphicon-edit"></span>
                   <span class="hidden-on-collapse">اضافة العميل</span>
                      </a>
                   </li>
                    <?php endif; ?>
                  </ul>
             </div>
              <div class="gnav">
                <div class="gnav-header">
                 <a class="has-childs collapsed" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                 <span class="glyphicon glyphicon-edit"></span>
                 <span class="hidden-on-collapse">المستخدمين</span>
                    </a>
                 </div>
                  <ul class="subnav collapse" id="collapseExample3">
                  <?php 
                  if(isset($_SESSION['username']) && $_SESSION['username'][0]->show_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=user/index">
                         <span class="glyphicon glyphicon-edit"></span>
                     <span class="hidden-on-collapse">المستخدمين</span>
                        </a>
                     </li>
                   <?php endif; 
                   if(isset($_SESSION['username']) && $_SESSION['username'][0]->aed_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=user/add">
                       <span class="glyphicon glyphicon-edit"></span>
                   <span class="hidden-on-collapse">اضافة مستخدم</span>
                      </a>
                   </li>
                    <?php endif; ?>
                  </ul>
             </div>
              <div class="gnav">
                <div class="gnav-header">
                 <a class="has-childs collapsed" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
                 <span class="glyphicon glyphicon-edit"></span>
                 <span class="hidden-on-collapse">الوحدات</span>
                    </a>
                 </div>
                  <ul class="subnav collapse" id="collapseExample4">
                  <?php 
                  if(isset($_SESSION['username']) && $_SESSION['username'][0]->show_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=unit/index">
                         <span class="glyphicon glyphicon-edit"></span>
                     <span class="hidden-on-collapse">الوحدات</span>
                        </a>
                     </li>
                   <?php endif; 
                   if(isset($_SESSION['username']) && $_SESSION['username'][0]->aed_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=unit/add">
                       <span class="glyphicon glyphicon-edit"></span>
                   <span class="hidden-on-collapse">اضافة وحده</span>
                      </a>
                   </li>
                    <?php endif; ?>
                  </ul>
             </div>
              <div class="gnav">
                <div class="gnav-header">
                 <a class="has-childs collapsed" role="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="false" aria-controls="collapseExample">
                 <span class="glyphicon glyphicon-edit"></span>
                 <span class="hidden-on-collapse">الصلاحيات</span>
                    </a>
                 </div>
                  <ul class="subnav collapse" id="collapseExample5">
                  <?php 
                  if(isset($_SESSION['username']) && $_SESSION['username'][0]->show_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=roles/index">
                         <span class="glyphicon glyphicon-edit"></span>
                     <span class="hidden-on-collapse">الصلاحية</span>
                        </a>
                     </li>
                   <?php endif; 
                   if(isset($_SESSION['username']) && $_SESSION['username'][0]->aed_article == 1): ?>
                    <li><a href="/sales_pro_new/public/index.php?p=roles/add">
                       <span class="glyphicon glyphicon-edit"></span>
                   <span class="hidden-on-collapse">اضافة صلاحية</span>
                      </a>
                   </li>
                    <?php endif; ?>
                  </ul>
             </div>
             </section>
            </div>
           <div class="content-wraper">
            <?= $content;  ?>
           </div>
        <footer>
            </footer>
            
            <script src="<?= app::$path; ?>js/jquery-3.1.0.min.js"></script>
            
             <script src="<?= app::$path; ?>js/bootstrap.min.js"></script>
            <script src="<?= app::$path; ?>js/<?php echo app::getinstance()->curent_page; ?>.js"></script>
          <script>
              $(document).ready(function () {
            $("#togglecollapse").click(function () { 
           
                if($("body").hasClass("body-sidebar"))
                  $("body").removeClass("body-sidebar")
           
                else
              
                   $("body").addClass("body-sidebar")
             
                
                
            });
                   $("#togglecollapse1").click(function () { 
           
                if($("body").hasClass("body-sidebar"))
                  $("body").removeClass("body-sidebar")
           
                else
              
                   $("body").addClass("body-sidebar")
             
                
                
            });
            
            });
            
            
            </script>
            <script src="<?= app::$path; ?>js/main.js"></script>
                </body>
    
   
    
</html>