<?php include('includes/header.php');?>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
<?php include('includes/navbar-fixed-top.php'); ?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
   
    <!-- / main menu-->
<?php include('includes/main-menu.php') ?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">

        <div class="content-body"><!-- stats -->
<div class="row">
    <div class="card">
         <div class="card-block">
            <ol>Dashboard / User</ol>
        </div>
    </div>
    <div class="row match-height tex-center">
    <div class="col-md-offset-2 col-md-8 ">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">Add User</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                   
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {

    $name   = mysqli_real_escape_string($dbcon->link,$_POST['name']);
    $email   = mysqli_real_escape_string($dbcon->link,$_POST['email']);
    $address    = mysqli_real_escape_string($dbcon->link,$_POST['address']);
    $cell    = mysqli_real_escape_string($dbcon->link,$_POST['cell']);
    $urole    = mysqli_real_escape_string($dbcon->link,$_POST['urole']);
    $password    = mysqli_real_escape_string($dbcon->link,$_POST['password']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div       = explode('.', $file_name);
    $file_ext  = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if ($name == "" || $email == "") {
             $msgType = "danger";
        ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
      <span class="close" data-dismiss="alert">&times;</span>
          <?php echo 'Field Not Must be empty.';?>
        </div>
    <?php 
    }
   elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
 }
    else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO  
    users
    (
    name,
    email,
    password,
    cell,
    address,
    urole,
    image) 
    VALUES(
    '$name',
    '$email',
    '$password',
    '$cell',
    '$address',
    '$urole',
    '$uploaded_image')";
    $inserted_rows = $dbcon->insert($query);
    if ($inserted_rows) {
         $msgType = "success";
        ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
      <span class="close" data-dismiss="alert">&times;</span>
          <?php echo 'Add User Successfully.';?>
        </div>
    <?php } 
    else 
    {
     echo "<span class='error'>Item Not Added !</span>";
    }
}

}
?>
       <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

            <div class="form-body">

                <div class="form-group">
                    <label for="name">User Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="name" class="form-control round"  name="name" placeholder="Enter User Name">

                </div>

                <div class="form-group">
                    <label for="name">User Email 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="email" id="email" class="form-control round"  name="email" placeholder="Enter User Email">

                </div>

                <div class="form-group">
                    <label for="product_name">User Password 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="password" id="password" class="form-control round" placeholder="Enter Password"  name="password">
      
                </div>
                <div class="form-group">
                    <label for="product_dis">User Phone 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="cell" class="form-control round" placeholder="Enter Phone  Discription" name="cell">
   
                </div>
                <div class="form-group">
                    <label for="product_price">User Address 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="address" class="form-control round"  placeholder="Enter User Address" name="address">


                </div>

                <div class="form-group">
                    <label for="status">
                    Select User Role
                     <span class=" text-danger">*</span></label>
                    <select name="urole" class="form-control round" id="urole">
                    <option>Select User Role
                    </option>
                    <option value="1">
                    Admin
                    </option>
                    <option value="0">
                    Editor
                    </option>
                    </select>
          
                </div>
                <div class="form-group">
                    <label for="image">
                    Select User Image 
                    <span class=" text-danger">*</span></label>
                    <input type="file" name="image" class="form-control round">
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-plus"></i> Add User
                </button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<?php include('includes/footer.php') ?>
<?php include('includes/script_js.php'); ?>


  
  </body>
</html>
