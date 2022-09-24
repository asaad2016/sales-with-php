<div class="header-content">
  <h1><span class="glyphicon glyphicon-home"></span>اضافة منتج جديد</h1>
<div class="main-info" style="margin-bottom: 20px;height: 360px;">
   <div class="col-sm-6 col-md-6">
      <div class="thumbnail">
        <div class="caption"><?php
         echo $form->filoutlbl("thumb","اختار الصورة","control-label","form-control hidden","form1",['onchange' => 'readdir(this);']); ?>
         <button id="chooseimg" class="btn btn-success center-block btn-lg">
            <i class="fa fa-choose"></i>
            <span class="hidden-xs hidden-sm">اختر صورة</span>
          </button>

        </div>
        <img src="upload/<?= $articles->thumb; ?>" width="370" height="170" id="uploadimg" class="img-thumbnail">

        <p  id="img_upload"></p>
      </div>
   </div>
  <div class="col-sm-6 col-md-6">
   <div class="panel panel-primary">
      <div class="panel-heading" style="height: 45px;">
        <span class="pull-right" style="font-size: 30px;margin-top: -10px;">اختر مورد</span>
        <button type="button" class="btn btn-primary btn-lg pull-left" data-toggle="modal" data-target="#1myModal" id="datatogle" style="margin-top: -5px;margin-left: -10px">
          <i class="fa fa-search fa-lg"></i>
        </button>
      </div>
      <div class="panel-body">
         <input type="text" name="supplier_info" id="supplier_info" style="background-color: #4489b1;color: #fff;font-size: 32px;padding-left: 5px;" form="form1" value="<?php echo $articles->supplier_id; ?>" >
    
        <h3 id="supplier_name" style="margin-bottom: 10px;"><?php echo $supplier->supplier_name; ?></h3>
      </div>
    </div> 
  </div>
</div>
<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="btn btn-lg" style="float: right;"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel" >الموردين</h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered text-center table-responsive table-stripped table-hover">
              <thead>
                <tr>
                  <th>التحكم</th>
                  <th>الرقم</th>
                  <th>الاسم</th>
                  <th>الايميل</th>
                </tr>
              </thead>
              <tbody>
               
              <tbody>
            </table>
          </div>
          <div class="modal-footer" style="text-align: right;">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left">الغاء</button>
          </div>
        </div>
      </div>
    </div>

  <div class="content-form">
    <form  action="" method="post" id="form1" enctype="multipart/form-data">
      <?php
      echo $form->input("ref","كود المنتج","control-label","form-control"); 
      echo $form->input("desig","اسم المنتج","control-label","form-control"); 
      echo $form->select("category_id","الصنف",$cat,"control-label","form-control");
     echo $form->select("unit_id","الوحدات",$unit,"control-label","form-control");
      echo $form->select("tax","الضريبة",$tax,"control-label","form-control");
     

      ?>

      <input type="submit" name="submit" value="تعديل" class="btn btn-primary">
    </form>
     
  </div>             
</div>                  