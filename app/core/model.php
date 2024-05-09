<?php

class Model extends Database{

  // protected $table = 'users';


protected function allowedColumns($data) {
  if(!empty($this->get_allowedColumns)){
  foreach($data as $key=>$value){
    if (!in_array($key,$this->get_allowedColumns)) {
      unset($data[$key]);
    }
  }
}
  return $data;
}

// insert 
  public function insert($data){
      $clean_array =$this-> allowedColumns($data);
      $key = array_keys($clean_array);
      $query = "INSERT INTO $this->table";
      $query.= "(".implode(",",$key).")value";
      $query.= "(:".implode(",:",$key).")";
      $db = new Database();
      $db->query($query,$clean_array);
  }

// update
public function update($id, $data)
{
    $clean_array = $this->allowedColumns($data);
    $key = array_keys($clean_array);
    $query = "UPDATE $this->table SET ";
    
    foreach ($key as $column) {
        $query .= "$column=:$column, ";
    }

    $query = rtrim($query, ', ');
    $query .= " WHERE id = :id";
    
    $clean_array['id'] = $id;

    $db = new Database();
    $db->query($query, $clean_array);
}

// delete
public function delete($id)
{
    $query = "DELETE FROM $this->table WHERE id= :id limit 1 ";
    
    $clean_array['id'] = $id;

    $db = new Database();
    $db->query($query, $clean_array);
}


  // public function where($data,$limit = 10,$offset = 0,$order = "desc",$order_column = "id"){
  //   $keys = array_keys($data);
  //   $query = "SELECT * FROM $this->table WHERE ";
    
  //   foreach ($keys as $key) {
  //       $query .= "$key = :$key AND ";
  //   }
  
  //   $query = trim($query, "AND ");
  //   $db = new Database();
  //   return $db->query($query, $data)->fetch(PDO::FETCH_ASSOC); // Use fetch(PDO::FETCH_ASSOC) to fetch as an associative array
  // }

  public function where($data,$limit = 10,$offset = 0,$order = "desc",$order_column = "id")
	{

		$keys = array_keys($data);
		
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			// code...
			$query .= "$key = :$key AND";
		}

		$query = trim($query,"AND");
		$query .= " order by $order_column $order limit $limit offset $offset";

		$db = new Database;
		return $db->query($query, $data);

	}

	public function getAll($limit = 10,$offset = 0,$order = "desc",$order_column = "id"){

		$query = "select * from $this->table order by $order_column $order limit $limit offset $offset";
  		
		$db = new Database;
		return $db->query($query);	

	}




//// search id
  public function first($data) {
    $keys = array_keys($data);
    $query = "SELECT * FROM $this->table WHERE ";
    
    foreach ($keys as $key) {
        $query .= "$key = :$key AND ";
    }
  
    $query = trim($query, "AND ");
    $db = new Database();
    $res= $db->query($query, $data)->fetch(PDO::FETCH_ASSOC); // Use fetch(PDO::FETCH_ASSOC) to fetch as an associative array
    if ($res) {
      return $res;
    }return false;
  }

}














































