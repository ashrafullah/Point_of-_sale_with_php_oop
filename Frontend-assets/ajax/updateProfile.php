<?php
//login.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "cngstation");
if(isset($_POST["update"]))
{
    $id=$_GET['id'];
    $name=mysqli_real_escape_string($dbcon->link,$_POST['name']);
    $username=mysqli_real_escape_string($dbcon->link,$_POST['username']);
	$password =$dfm->validation(md5($_POST['password']));
    $email=mysqli_real_escape_string($dbcon->link,$_POST['email']);
    $aemail=mysqli_real_escape_string($dbcon->link,$_POST['aemail']);
    $cell=mysqli_real_escape_string($dbcon->link,$_POST['cell']);
    $gender=mysqli_real_escape_string($dbcon->link,$_POST['gender']);
    $birth=mysqli_real_escape_string($dbcon->link,$_POST['birth']);
    $blood=mysqli_real_escape_string($dbcon->link,$_POST['blood']);
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div       = explode('.', $file_name);
    $file_ext  = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;

 $query="UPDATE tbl_user 
    SET
    name='$name',
    gender='$gender',
    username='$username',
    password='$password',
    email='$email',
    aemail='$aemail',
    cell='$cell',
    birth='$birth',
    blood='$blood',
    image='$uploaded_image'
    WHERE id='$id'";
 $result = mysqli_query($connect, $query);
  echo json_encode([$id]);
 // if( $result)
 // {
 //  // $data = mysqli_fetch_assoc($result);
 //  //  echo $data["email"];
 //     $data = mysqli_fetch_assoc($result);
 // 	echo  $data;
 // }
 // else{
 // 	echo mysql_error();
 // }
}
?>