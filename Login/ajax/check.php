<?php
  
  $host="localhost";
  $user="root";
  $pass="";
  $dbname="db_pos_lict_batch4_oop";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  // $dbcon = new mysqli($host, $user, $pass,$dbname);
  if(isset($_POST['name'])) 
  {
      $name = strip_tags($_POST['name']);
      
	  $stmt=$dbcon->prepare("SELECT name FROM users WHERE name=:name");
	  $stmt->execute(array(':name'=>$name));
	  $count=$stmt->rowCount();
	  	  
	  if($count>0)
	  {
		  echo "<span style='color:brown;'>Sorry username already taken !!!</span>";
	  }
	  else
	  {
		  echo "<span style='color:green;'>available</span>";
	  }
  }

  // Email Check
  if(isset($_POST['email'])) 
  {
      $email = strip_tags($_POST['email']);
      
	  $stmt=$dbcon->prepare("SELECT email FROM users WHERE email=:email");
	  $stmt->execute(array(':email'=>$email));
	  $count=$stmt->rowCount();
	  	  
	  if($count>0)
	  {
		  echo "<span style='color:brown;'>Sorry Email already Exists !!!</span>";
	  }
	  else
	  {
		  echo "<span style='color:green;'>available</span>";
	  }
  }
   