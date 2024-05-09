<?php 

function show($data){
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}
function view_path($view){
  if (file_exists('../app/view/'.$view.'.view.php')) {
    return '../app/view/'.$view.'.view.php';
  }else{
    echo "view $view not exist";
  }
}

function esc($str){
  echo htmlspecialchars($str);
}

// connection();
// function connection(){
//   $serverName = "localhost";
//   $database = "pos_db";
//   $username = "root";
//   $password = "";
//   $con = mysqli_connect($serverName,$username,$password,$database);
//   if (!$con) {
//     echo'connection failed';
//   }
//   return $con;
// }

// function query($query, $data = array()){

//   $con = connection();
//   $smt = mysqli_prepare($con,$query);
//   $check = mysqli_execute($data);

//   if($check){
//     $result = mysqli_fetch_assoc($check);
//     if(is_array($result)&& count($result)>0){
//       return $result;
//     }
//   }
//   return false;
// }

// this function is cell in the database.php file
// function connection(){
//   $serverName = "localhost";
//   $database = "pos_db";
//   $username = "root";
//   $password = "";
//   try {
//     $con = new PDO("mysql:host=$serverName;dbname=$database",$username,$password);

//   } catch (PDOException $e) {
//     echo $e->getMessage();
//   }
  

//   return $con;
// }


// function executeQuery($query, $params = []) {
//     $con = connection();

//     try {
//         $stmt = $con->prepare($query);
//         $stmt->execute($params);
//         return $stmt;
//     } catch (PDOException $e) {
//         // Handle exceptions as needed (log, display, etc.)
//         echo "Error: " . $e->getMessage();
//         return false;
//     }
// }

// function allowedColumns($data, $table) {
//   if ($table == "users") {
//       $allowedColumns = [
//           "username",
//           "email",
//           "password",
//           "date",
//           "role",
//       ];

//       return array_intersect_key($data, array_flip($allowedColumns));
//   }

//   return $data;
// }

// function insert($data , $table){
//   $clean_array = allowedColumns($data, $table);
//   $key = array_keys($clean_array);
//   $query = "INSERT INTO `users`";
//   $query.= "(".implode(",",$key).")value";
//   $query.= "(:".implode(",:",$key).")";
//   $db ->Database();
//   $db->executeQuery($query,$clean_array);
// }

// function validate($data, $table) {
//   $errors = [];
//   if ($table == "users") {
//     // check user name
//       if(empty($data['username'])){
//         $errors ['username']="user name is required !";
//       }
//       elseif(!preg_match('/[a-zA-Z]/',$data['username'])){
//         $errors ['username']="Only letters and spaces allowed in user name";
//       }
    
//     // check user email
//       elseif(empty($data['email'])){
//         $errors ['email']="email is required !";
//       }
//       // elseif(filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
//       //   $errors ['email']="Email is not valid";
//       // }
    
//     // check user password
//       elseif(empty($data['password'])){
//         $errors ['password']="password is required !";
//       }
//       elseif($data['password']!== $data['repassword']){
//         $errors ['password']="password do not match";
//       }
//       elseif(strlen($data['password'])<8){
//           $errors ['password']="Password must be at lest 8 characters log";
//       }
     
//   }
 
//  return $errors;
// }

function set_value($key, $default =''){
  if (!empty($_POST[$key])) {
    return $_POST[$key];
  }
  return $default;
}

function redirect($page){
  header("Location: index.php?page_name=".$page);
  die;
}

function authenticate($row){
  $_SESSION['user']= $row;
}
function auth($column){
  if (!empty($_SESSION['user'][$column])) {
    return $_SESSION['user'][$column];
  }
  return 'unknown';
}

// before crop image enable the following things apache > config > php.ini
// extension=gd
// upload_max_filesize=140M

function crop($filename,$size = 400){

	$ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
	$cropped_file = preg_replace("/\.$ext$/", "_cropped.".$ext, $filename);

	if(file_exists($cropped_file))
	{
		return $cropped_file;
	}

	// create image resource
	switch ($ext) {
		case 'jpg':
		case 'jpeg':
			$src_image = imagecreatefromjpeg($filename);
			break;
		
		case 'gif':
			$src_image = imagecreatefromgif($filename);
			break;
		
		case 'png':
			$src_image = imagecreatefrompng($filename);
			break;
		
		default:
			return $filename;
			break;
	}
  // Inside the switch statement where you save the final image

	//set cropping params

	//assign values
	$dst_x = 0;
	$dst_y = 0;
	$dst_w = (int)$size;
	$dst_h = (int)$size;

	$original_width = imagesx($src_image);
	$original_height = imagesy($src_image);

	if($original_width < $original_height)
	{
		$src_x = 0;
		$src_y = ($original_height - $original_width) / 2;
		$src_w = $original_width;
		$src_h = $original_width;

	}else{

		$src_y = 0;
		$src_x = ($original_width - $original_height) / 2;
		$src_w = $original_height;
		$src_h = $original_height;
	}
 
	$dst_image = imagecreatetruecolor((int)$size, (int)$size);
	imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

	//save final image
	switch ($ext) {
		case 'jpg':
		case 'jpeg':
			imagejpeg($dst_image,$cropped_file,90);
			break;
		
		case 'gif':
			imagegif($dst_image,$cropped_file);
			break;
		
		case 'png':
			imagepng($dst_image,$cropped_file);
			break;
		
		default:
			return $filename;
			break;
	}

	imagedestroy($dst_image);
	imagedestroy($src_image);

	return $cropped_file;
}

// function where($data , $table){
  
//   $keys = array_keys($data);
//   $query = "SELECT * FROM $table WHERE ";

//   foreach ($keys as $key) {
//     $query.= "$keys = :$key";
//   }
//   $query =trim($query,"&& ");
//   return  executeQuery($query,$data);
// }

// function where($data, $table) {
//   $keys = array_keys($data);
//   $query = "SELECT * FROM $table WHERE ";
  
//   foreach ($keys as $key) {
//       $query .= "$key = :$key AND ";
//   }

//   $query = trim($query, "AND ");
//   $db = new Database();
//   return $db->executeQuery($query, $data)->fetch(PDO::FETCH_ASSOC); // Use fetch(PDO::FETCH_ASSOC) to fetch as an associative array
// }




























