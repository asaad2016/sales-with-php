<section class="content-header">
  
  <ol class="breadcrumb">
      <li><a href="?p=article/index">الرئيسية</a></li>
  </ol>
  <h1>
    <small>بروفايل العضو</small>
  </h1>
</section>
<div class="error text-center h3" style="width: 500px;margin: auto;">
  <?php
    if(isset($errorconfirmpass) && $errorconfirmpass == true){?>
    <div class="alert alert-danger">كلمتا المرور غير متطابقتان</div>
    <?php } ?>
     <?php
    if(isset($erroroldpass) && $erroroldpass == true){?>
    <div class="alert alert-danger">كلمت المرور القديمة غير صحيحة</div>
    <?php } ?>
</div>
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
       echo $form->password("oldpassword","كلمة المرور القديمة","control-label","form-control",["required" => "required"]);
       echo $form->password("currentpassword","كلمة المرور","control-label","form-control",["required" => "required"]); 
      echo $form->password("confirmpassword","تاكيد كلمة المرور","control-label","form-control",["required" => "required"]); 
      echo $form->email("email","الايميل","control-label","form-control",["required" => "required"]);
     echo $form->input("phone","التليفون","control-label","form-control",["required" => "required"]);
     
      ?>
       <input type="submit" name="submit" value="تعديل" class="btn btn-primary">
     
    </form> 
     
  </div>
</div>