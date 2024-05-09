<?php
// v1
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     // show($_POST);

//     $_POST['role'] = 'user';
//     $_POST['date'] = date("Y-m-d H:i:s");

//     $originalQuery = "INSERT INTO `users` (username, email, password, date, role) VALUES (:username, :email, :password, :date, :role)";
//     $filteredData = allowedColumns($_POST, "users");
//     // $filteredData = allowed_columns($_POST, "users");

//     $result = executeQuery($originalQuery, $filteredData);

//     // if ($result !== false) {
//     //     echo "Query executed successfully!";
//     // }
// }

// v2

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // show($_POST);
    $user = new User();
    $_POST['role'] = 'user';
    $_POST['date'] = date("Y-m-d H:i:s");
    $errors =$user-> validate($_POST,'users');
    if (empty($errors)) {

        // encrypt password
        $_POST['password']= password_hash($_POST['password'],PASSWORD_DEFAULT);

        $user->insert($_POST,"users");
        redirect('login');
        
    }
}

require_once view_path("./auth/signup");
