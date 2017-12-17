<?php include('includes/header.php');?>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
<?php include('includes/navbar-fixed-top.php'); ?>

    <!-- main menu-->
   
    <!-- / main menu-->
<?php include('includes/main-menu.php') ?>
<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->
<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / User</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View User Details</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <?php 
// if (!isset($_GET['id']) || $_GET['id'] == NULL) {
//     echo "<script>window.location='index_user.php';</script>";
// }
// else{
//     $id=Session::get('id');
// }
 ?> 
<?php
$id = Session::get('id');
 $query="SELECT  * FROM users where id='$id'";
$User=$dbcon->select($query);
if ($User) {
while ($result=$User->fetch_assoc()) { ?>
    <h3 class="text-info">
    Details Of 
    <?php echo $result['name']; ?>
    </h3>
<?php }} ?>
    <span style="float: right; padding: 5px">
        <a href="index_user.php" class="btn btn-info">
        <i class="icon-list"></i>
            Back To User List
        </a>
    </span>
</div>

<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
   $name = mysqli_real_escape_string($dbcon->link,$_POST['name']);
   $email   = mysqli_real_escape_string($dbcon->link,$_POST['email']);
    $cell = mysqli_real_escape_string($dbcon->link,$_POST['cell']);
    $address = mysqli_real_escape_string($dbcon->link,$_POST['address']);
    $urole = mysqli_real_escape_string($dbcon->link,$_POST['urole']);

      if ($name == "" || $cell == "" || $email == "") {
        echo "<span class='error'>Field Not Must be empty</span>";

    }
    else{
    $query="UPDATE users
    SET
    name='$name',
    email='$email',
    address='$address',
    cell='$cell',
    urole='$urole'
    WHERE id=$id";
    $update_user = $dbcon->update($query);
    if ($update_user) { 
        $msgType = "success";
        $msg = "success";
       header("Location: index_user.php?Message=" . urlencode($Message));

    }else 
    {
     echo "<span class='error'>User Not Updated !</span>";
    }


        }

}
 ?>
<div class="row">
    <div class="col-md-5">
        <div class="left">

    <ul>
        <li>User Name</li>
        <li>User Email</li>
        <li>User Address</li>
        <li>User Phone Number</li>
        <li>User Type</li>
        <li>User Image</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">

      <ul style="list-style: none;">


<?php 

$query="SELECT  * FROM users where id='$id'";
$User=$dbcon->select($query);
if ($User) {
while ($result=$User->fetch_assoc()) { ?>
        <form action="" method="post">
        <li>
        <input class="form-control" type="text" name="name" value="<?php echo $result['name'] ?>">
        </li>
        <li>
        <input class="form-control" type="email" name="email" value="<?php echo $result['email']; ?>">
        </li>
        <li>
            <input class="form-control" type="address" name="address" value="<?php echo $result['address']; ?>">
        </li>
        <li>
            <input class="form-control" type="text" name="cell" value="<?php echo $result['cell']; ?>">
        </li>
        <li>
            <?php echo $result['user_type'];?>
 
        </li>

            <?php
            if ($result['image'] == 'image') {?>
               <li>
        <img src="<?php echo $result['image'] ?>" width="100" height="80">
                </li>
            <?php }
            else{ ?>
        <li>
            <i class="icon-user"></i></li>

        
            <?php }?> 
        <input type="file" class="form-control" name="image" value="Upload User Image">
        <br>
        <input class="btn btn-info" type="submit" value="Update User">
            </form>
<?php } }?>
    </ul>
    <br>
    <br>
    <br>
    <br>
</div>
    </div> 
  

</div>
</div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>

<?php include('includes/footer.php') ?>
<?php include('includes/script_js.php'); ?>


  
  </body>
</html>