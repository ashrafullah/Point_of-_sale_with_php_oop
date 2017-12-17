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
            <ol>Dashboard / Human Resource</ol>
        </div>
    </div>
    <div class="row match-height tex-center">
    <div class="col-md-offset-2 col-md-8 ">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">Add Employee</h4>
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
    $query = "INSERT INTO  
    tbl_employee
    (
    employee_name,
    email,
    father_name,
    mother_name,
    present_address,
    parmanent_address,
    designation, 
    department,
    mobile_number,
    joining_date) 
    VALUES(
    '$employee_name',
    '$email',
    '$father_name',
    '$mother_name',
    '$present_address',
    '$parmanent_address',
    '$designation',
    '$department',
    '$mobile_number',
    '$j_date')";
    $inserted_rows = $dbcon->insert($query);
    if ($inserted_rows) {
         $msgType = "success";
        ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
      <span class="close" data-dismiss="alert">&times;</span>
          <?php echo 'Add Employee Successfully.';?>
        </div>
    <?php } 
    else 
    {
     echo "<span class='error'>Supplier Not Added !</span>";
    }
}

}
?>
          <form class="form-horizontal" method="POST" action="">

            <div class="form-body">

                <div class="form-group">
                    <label for="s_code">Employee Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="employee_name" class="form-control round"  name="employee_name" placeholder="Enter Employee Name">
         
                </div>

                <div class="form-group">
                    <label for="email">Email 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="email" id="email" class="form-control round" placeholder="Enter Email"  name="email">
  
                </div>
                <div class="form-group">
                    <label for="s_address">Father Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="father_name" class="form-control round"  placeholder="Enter Father Name  Address" name="father_name">
         
                </div>
                <div class="form-group">
                    <label for="s_c_person">Mother Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="mother_name" class="form-control round" placeholder="Enter Mother Name" name="mother_name">
           
                </div>
                <div class="form-group">
                    <label for="present_address">
                    Present Address<span class=" text-danger"> *</span></label>
                    <input type="text" id="present_address" class="form-control round" placeholder="Enter Present Address" name="present_address">
   
                </div>
                <div class="form-group">
                    <label for="parmanent_address">
                    Parmanent Address<span class=" text-danger"> *</span></label>
                    <input type="text" id="parmanent_address" class="form-control round" placeholder="Enter Parmanent Address" name="parmanent_address">
   
                </div>
                <div class="form-group">
                    <label for="parmanent_address">
                    Designation<span class=" text-danger"> *</span></label>
                    <input type="text" id="designation" class="form-control round" placeholder="Enter Designation " name="designation">
   
                </div>
                <div class="form-group">
                    <label for="parmanent_address">
                    Department<span class="text-danger"> *</span></label>
                    <input type="text" id="department" class="form-control round" placeholder="Enter Department" name="department">
   
                </div>
                <div class="form-group">
                    <label for="parmanent_address">
                   Mobile Number<span class=" text-danger"> *</span></label>
                    <input type="text" id=" mobile_number" class="form-control round" placeholder="Enter Mobile NUmber" name="  mobile_number">
   
                </div>
                <div class="form-group">
                    <label for="parmanent_address">
                   Joining Date<span class=" text-danger"> *</span></label>
                    <input type="date" id=" j_date" class="form-control round" name="j_date">
   
                </div>

            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-plus"></i>
                     Add Employee
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
