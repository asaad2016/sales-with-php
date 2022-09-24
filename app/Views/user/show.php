<div class="container">
  <div class="row">
    <div class="col-sm-11">
      <h3><a href="index.php?p=user/edit&id=<?= $user->userid; ?>"> <i class="fa fa-edit"></i> اسم العضو : <?= $user->username;?></a></h3>
      <div class="thumbnail">
        <img src="upload/<?= $user->avtar; ?>" alt="..." width="400" height="400" style="display: inline-block;">

        <div class="caption" style="display: inline-block;">
          
          <p>االايميل : <?= $user->email;?></p>
          <p>الوظيفة : <?= $user->function;?></p>
          <p>الصلاحيات : <?= $user->rolename;?></p>
          <p>تاريخ الاضافة : <?= $user->created_by;?></p>
        
        </div>
      </div>
      <p class="text-center"><a href="index.php?p=user/editprofile&id=<?php echo $user->userid; ?>" class="btn btn-primary btn-lg" role="button">تعديل</a></p>
    </div>
  </div>
</div>


