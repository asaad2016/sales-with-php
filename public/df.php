<div class="header-content">
  <h1><span class="glyphicon glyphicon-home"></span>اضافة منتج جديد</h1>
  <section class="" style="margin: 15px">
    <div class="row">
       <div class="col-sm-8 pull-right" style="margin-left: -4px !important;">  
        <div  class="information block">
          <div class="panel panel-primary">
         
            <div class="panel-heading">

            </div>
              
            <div class="panel-body">
               <input type="text" name="search" class="form-control" style="margin-bottom: 20px;background-color: #337ab7;color: #fff;width: 91%">
               <button  style="position: absolute;top: 37px;left: 18px;height: 33px;background-color:#337ab7;border-radius: 3px;width: 73px;"><i class="fa fa-search fa-lg"><span style="margin-right: 5px;">بحث</span></i></button>
               
               <input type="text" name="supplier_id1"/>
               <h5>Supplier 1</h5>
               <p>assut</p>
               <p>akidfn nrjkn</p>
               
           </div>
          </div>
        </div>
       </div>   
         <div class="col-sm-4 pull-left">  
        <div class="information block ">
          <div class="panel panel-primary">
         
            <div class="panel-heading">

            </div>
              
            <div class="panel-body"  style="padding: 10px 10px 10px 0">
           
               
               
              <img src="" height="200" width="200">
              <input type="file" name="thumb1">

            </div>
          </div>
        </div>
       </div>                   
    </div>
  </section>

          <section class="content pull-right" style="margin-right: -200px;margin-top: -380px;">
            <div class="container">
          <div class="row">
          <div class="col-sm-12">
          

    
    <form  action="" method="post" name="form-article-add" enctype="multipart/form-data">
    <?php
     echo $form->input("ref","كود المنتج","control-label","form-control"); 
      echo $form->input("desig","اسم المنتج","control-label","form-control"); 
    echo $form->select("category_id","الصنف",$cat,"control-label","form-control");
   /*echo $form->select("unit_id","الوحدات",$unit,"control-label","form-control");
       echo $form->select("tax","الضريبة",$tax,"control-label","form-control");*/
        echo $form->input("supplier_id","اسم المورد","control-label","form-control"); 
         echo $form->file("thumb","اختار الصورة","control-label","form-control"); 
          echo $form->submit("save","حفظ","btn btn-primary");
    ?>
     
     
     
    </form>
  </div>
  </div>

</div>
          </section>
               
           </div>

            
        
         