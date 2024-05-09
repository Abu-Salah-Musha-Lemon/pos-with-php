<?php
require_once view_path("./auth/login");

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $user = new User();
    $errors =$user->validate($_POST,'users');
     if ($row =$user->where(['email'=>$_POST['email']],"users")) {

       if (password_verify(($_POST['password']), $row['password'])) {
        authenticate($row);
        redirect('home'); 
      }else {
        $errors['password'] = 'password did not match';
      }
    }else {
      $errors['email'] = 'email did not match';
    }
        

}