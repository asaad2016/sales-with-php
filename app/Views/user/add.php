<section class="content-header">
  <h1>
    <small>اضافة بيانات العضو</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="?p=user/add">اضافة مستخدم جديد</a>
      <i class="fa fa-plus"></i>
      </li>
      <li><a href="?p=user/index"><i class="fa fa-dashboard"></i> لوحة التحكم في المستخدمين </a></li>
      <li><a href="?p=article/index">الرئيسية</a></li>
      </li>
  </ol>
</section>
  <div class="col-md-3">
      <div class="thumbnail">
        <div class="caption"><?php
         echo $form->filoutlbl("avtar","اختار الصورة","control-label","form-control hidden","form1",['onchange' => 'readdir(this);']); ?>
         <button id="chooseimg" class="btn btn-success center-block btn-lg">
            <i class="fa fa-choose"></i>
            <span class="hidden-xs hidden-sm">اختر صورة</span>
          </button>
        </div>
        <img src="upload/image1.jpg" width="370" height="170" id="uploadimg" class="img-thumbnail">
        <p  id="img_upload"></p>
      </div>
    </div>
 <div class="col-md-9">
<div class="content-form">
   <form  action="" method="post" id="form1" enctype="multipart/form-data">
   
      <?php
      echo $form->input("username","الاسم","control-label","form-control",["required" => "required"]); 
      echo $form->password("password","كلمة المرور","control-label","form-control",["required" => "required"]); 
      echo $form->email("email","الايميل","control-label","form-control",["required" => "required"]);
     echo $form->input("phone","التليفون","control-label","form-control",["required" => "required"]);
      echo $form->input("function","الوظيفة","control-label","form-control",["required" => "required"]);
      echo $form->select("roleid","الصلاحيات",$role,"control-label","form-control",["required" => "required"]);
      ?>
       <input type="submit" name="submit" value="حفظ" class="btn btn-primary">
     
    </form> 
     
  </div>
</div>