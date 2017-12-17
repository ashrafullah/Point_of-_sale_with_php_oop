<?php
//login.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "db_pos_lict_batch4_oop");
if(isset($_POST["email"]) && isset($_POST["password"]))
{
 $email = $_POST["email"];
 $password = md5(mysqli_real_escape_string($connect, $_POST["password"]));
 $sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password." ";
 $result = mysqli_query($connect, $sql);
 $num_row = mysqli_num_rows($result);
 if($num_row > 0)
 {
  $data = mysqli_fetch_assoc($result);
  $_SESSION["id"] = $data["id"];
  $_SESSION["name"] = $data["name"];
  $_SESSION["email"] = $data["email"];
   echo $data["email"];
 }
}
?>