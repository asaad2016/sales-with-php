<link rel="stylesheet" type="text/css" href="<?= ROOT?>/public/css/pdf-style.css">

<div class="show">
  <h3 style="font-size: 25px"> اسم المنتج : <?= $article->desig;?></h3>
    
    <div style="background-color: #c5a1a1;	">
      <img src="images/1.jpg" alt="..." width="300" height="300" style="display: block; margin-right: -300px;float: right;">
      <p style="text-align: right;margin: 100px 300px 0 0;font-size: 20px">اسم المورد : <?= $article->supplier_name;?></p>
       <p style="text-align: right;margin: 10px 285px 0 0;font-size: 20px">اسم التصنيف : <?= $article->cat_name;?></p>
       <p style="text-align: right;margin: 10px 330px 0 0;font-size: 20px">الوحدة : <?= $article->u_name;?></p>
    
    </div> 
</div>
 


