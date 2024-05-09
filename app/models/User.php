<?php

// user class 

class User extends Model {
  protected $table = 'users';
  protected $get_allowedColumns = [
                "username",
                "email",
                "password",
                "date",
                "role",
            ];


public function validate($data) {
  $errors = [];

    // check user name
      if(empty($data['username'])){
        $errors ['username']="user name is required !";
      }
      elseif(!preg_match('/[a-zA-Z]/',$data['username'])){
        $errors ['username']="Only letters and spaces allowed in user name";
      }
    
    // check user email
      elseif(empty($data['email'])){
        $errors ['email']="email is required !";
      }
      // elseif(filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
      //   $errors ['email']="Email is not valid";
      // }
    
    // check user password
      elseif(empty($data['password'])){
        $errors ['password']="password is required !";
      }
      elseif($data['password']!== $data['repassword']){
        $errors ['password']="password do not match";
      }
      elseif(strlen($data['password'])<8){
          $errors ['password']="Password must be at lest 8 characters log";
      }

 return $errors;
}

}






