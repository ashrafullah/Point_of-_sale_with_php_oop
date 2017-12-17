<?php
//login.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "cngstation");
if(isset($_POST["email"]) && isset($_POST["password"]))
{
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $password = md5(mysqli_real_escape_string($connect, $_POST["password"]));
 $sql = "SELECT * FROM tbl_user WHERE email = '".$email."' AND password = '".$password."'";
 $result = mysqli_query($connect, $sql);
 $num_row = mysqli_num_rows($result);
 if($num_row > 0)
 {
  $data = mysqli_fetch_assoc($result);
  $_SESSION["id"] = $data["id"];
  $_SESSION["name"] = $data["name"];
  $_SESSION["username"] = $data["username"];
  $_SESSION["email"] = $data["email"];
  $_SESSION["image"] = $data["image"];
   echo $data["email"];
 }
}
?>