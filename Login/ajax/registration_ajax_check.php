<?php
  
  $host="localhost";
  $user="root";
  $pass="";
  $dbname="db_pos_lict_batch4_oop";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);


	      $name = $_POST['name'];
	      $email = $_POST['email'];
	      $password= md5($_POST['password']);
	      $address = $_POST['address'];
	      $user_type = $_POST['user_type'];
		  $stmt = $dbcon->prepare("INSERT INTO users(name,email,password,address,user_type) VALUES(:name, :email, :password, :address, :user_type)");
 
		$stmt->bindparam(':name', $name);
		$stmt->bindparam(':email', $email);
		$stmt->bindparam(':password', $password);
		$stmt->bindparam(':address', $address);
		$stmt->bindparam(':user_type', $user_type);
		if ($name == '' || $email == '' || $password == '') {
			$error="field Not Must be empty";
		  echo json_encode($error);
		}
		if($stmt->execute())
		{
		  $res="Thank Your Registration Successfully";
		  echo json_encode($res);
		}
		else {
		  $error="Not Inserted,Some Probelm occur.";
		  echo json_encode($error);
		}

?>