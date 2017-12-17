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
<ol>Dashboard / Employee</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Employee Details</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <?php 
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='index_employee.php';</script>";
}
else{
    $id=$_GET['id'];
}
 ?> 
<?php 
$query="SELECT * FROM tbl_employee where id='$id'";

$employee=$dbcon->select($query);
if ($employee) {
while ($result=$employee->fetch_assoc()) { ?>
    <h3 class="text-info">
    Details Of Employee
    <?php echo $result['employee_name']; ?>
    </h3>
<?php }} ?>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {

    $employee_name   = mysqli_real_escape_string($dbcon->link,$_POST['employee_name']);
    $email   = mysqli_real_escape_string($dbcon->link,$_POST['email']);
    $father_name    = mysqli_real_escape_string($dbcon->link,$_POST['father_name']);
    $mother_name = mysqli_real_escape_string($dbcon->link,$_POST['mother_name']);
    $present_address = mysqli_real_escape_string($dbcon->link,$_POST['present_address']);
    $parmanent_address = mysqli_real_escape_string($dbcon->link,$_POST['parmanent_address']);
    $designation = mysqli_real_escape_string($dbcon->link,$_POST['designation']);
    $department = mysqli_real_escape_string($dbcon->link,$_POST['department']);
    $mobile_number = mysqli_real_escape_string($dbcon->link,$_POST['mobile_number']);
    $date = $_POST['j_date'];
    $j_date = date('Y-m-d', strtotime($date));


    if ($employee_name == "" || $email == "") {
             $msgType = "danger";
        ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
      <span class="close" data-dismiss="alert">&times;</span>
          <?php echo 'Field Not Must be empty.';?>
        </div>
    <?php 
    }

    else{

    $query="UPDATE tbl_employee
    SET
    employee_name='$employee_name',
    email='$email',
    father_name='$father_name',
    mother_name='$mother_name',
    present_address='$present_address',
    parmanent_address='$parmanent_address',
    designation='$designation',
    department='$department',
    mobile_number='$mobile_number',
    joining_date='$j_date'
    WHERE id=$id";
    $update_employee = $dbcon->update($query);
    if ($update_employee) { 
        $msgType = "success";
        $msg = "success";
       header("Location: index_employee.php?Message=" . urlencode($Message));

    }else 
    {
     echo "<span class='error'>Employee Not Updated !</span>";
    }
}

}
?>
    <span style="float: right; padding: 5px">
        <a href="index_employee.php" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Employee List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="left">

    <ul>
        <li>Employee Name</li>
        <li>Employee Email</li>
        <li>Employee Father Name</li>
        <li>Employee Mother Name</li>
        <li>Employee Present Address</li>
        <li>Employee Parmanent Address</li>
        <li>Employee Designation</li>
        <li>Employee Department</li>
        <li>Employee Phone</li>
        <li>Joining Date</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">

      <ul style="list-style: none;">


<?php 

$query="SELECT  * FROM tbl_employee where id='$id'";
$employee=$dbcon->select($query);
if ($employee) {
while ($result=$employee->fetch_assoc()) { ?>
        <form action="" method="post">
           <li style="list-style: none">
            <input class="form-control" type="text" name="employee_name" value="<?php echo $result['employee_name'] ?>">
            </li>
        <li style="list-style: none">
            <input class="form-control" type="text" name="email" value="<?php echo $result['email'] ?>">    
        </li>
        <li style="list-style: none">
        <input class="form-control" type="text" name="father_name" value="<?php echo $result['father_name'] ?>">
        </li>
        <li style="list-style: none">
        <input class="form-control" type="text" name="mother_name" value="<?php echo $result['mother_name'] ?>">
        </li>
        <li style="list-style: none">
        <input class="form-control" type="text" name="present_address" value="<?php echo $result['present_address'] ?>">
        </li>
        <li style="list-style: none">
        <input class="form-control" type="text" name="parmanent_address" value="<?php echo $result['parmanent_address'] ?>">
        </li>
        <li style="list-style: none">
        <input class="form-control" type="text" name="designation" value="<?php echo $result['designation'] ?>">
        </li>
        <li style="list-style: none">
        <input class="form-control" type="text" name="department" value="<?php echo $result['department'] ?>">
        </li>
        <li style="list-style: none">
        <input class="form-control" type="text" name="mobile_number" value="<?php echo $result['mobile_number'] ?>">
        </li>
        <li>
        <?php echo date('F d, Y', strtotime($result['joining_date']))?>&nbsp;
        <input type="date" name="j_date">
        </li>
        <br>
        <input type="submit" value="Update" class="btn btn-primary"> 
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