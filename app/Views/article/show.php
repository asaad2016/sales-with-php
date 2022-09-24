<div class="container">
  <div class="row">
    <div class="col-sm-11">
      <h3><a href="index.php?p=article/edit&id=<?= $article->id; ?>"> <i class="fa fa-edit"></i> اسم المنتج : <?= $article->desig;?></a></h3>
      <div class="thumbnail">
        <img src="upload/<?= $article->thumb; ?>" alt="..." width="400" height="400" style="display: inline-block;">

        <div class="caption" style="display: inline-block;">
          
          <p>اسم المورد : <?= $article->supplier_name;?></p>
          <p>اسم التصنيف : <?= $article->cat_name;?></p>
          <p>الوحدة : <?= $article->u_name;?></p>
          <p>تاريخ الاضافة : <?= $article->created_by;?></p>
        
        </div>
      </div>
      <p class="text-center"><a href="index.php?p=article/printshow&id=<?php echo $article->id; ?>" class="btn btn-primary btn-lg" role="button">طباعة</a></p>
    </div>
  </div>
</div>


