<?php
namespace app\Entity;

class UserEntity{

  public function __get($key){
    $method='get'.($key);
    $this->$key=$this->$method();
    return $this->$key;
  }
  function getoldpassword(){
    return null;
  }
  function getcurrentpassword(){
    return null;
  }
  function getconfirmpassword(){
    return null;
  }
}

















/*
<div id="search-box-user" style="display: none;position: absolute;top: 250px;right: 370px;background-color: rgb(64, 127, 165);">
  <form  action="" method="post">
    <div class="col-sm-12 col-md-12">
      <?= $form->input("username","الاسم","control-label","form-control");  ?>
    </div>
    <div class="col-sm-12 col-md-12">
      <?= $form->input("email","الايميل","control-label","form-control");  ?>
    </div>
    <div class="col-sm-12 col-md-12 text-center">
      <?= $form->submit("saveuser","بحث","btn btn-primary");  ?>
    </div>
  </form>
</div>*/