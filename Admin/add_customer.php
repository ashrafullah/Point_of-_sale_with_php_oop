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
            <ol>Dashboard / Inventory</ol>
        </div>
    </div>
    <div class="row match-height tex-center">
    <div class="col-md-offset-2 col-md-8 ">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">Add Customer</h4>
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

    $customer_code   = mysqli_real_escape_string($dbcon->link,$_POST['customer_code']);
    $customer_name   = mysqli_real_escape_string($dbcon->link,$_POST['customer_name']);
    $customer_address    = mysqli_real_escape_string($dbcon->link,$_POST['customer_address']);
    $country    = mysqli_real_escape_string($dbcon->link,$_POST['country']);
    $customer_email    = mysqli_real_escape_string($dbcon->link,$_POST['customer_email']);
    $status    = mysqli_real_escape_string($dbcon->link,$_POST['status']);
    // $customer_image  =$imageUrl;


    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['customer_image']['name'];
    $file_size = $_FILES['customer_image']['size'];
    $file_temp = $_FILES['customer_image']['tmp_name'];
    $div       = explode('.', $file_name);
    $file_ext  = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if ($customer_name == "") {
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
    tbl_customer
    (
    customer_code,
    customer_name,
    customer_address,
    country,
    customer_email,
    customer_image,
    status) 
    VALUES(
    '$customer_code',
    '$customer_name',
    '$customer_address',
    '$country',
    '$customer_email',
    '$uploaded_image',
    '$status')";
    $inserted_rows = $dbcon->insert($query);
    if ($inserted_rows) {
         $msgType = "success";
        ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
      <span class="close" data-dismiss="alert">&times;</span>
          <?php echo 'Add Customer Successfully.';?>
        </div>
    <?php } 
    else 
    {
     echo "<span class='error'>User Not Added !</span>";
    }
}

}
?>
    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="form-body">

                <div class="form-group">
                    <label for="customer_code">
                        Customer Code 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" name="customer_code" placeholder="1002">
                    
                    <span class="help-block">
                        <strong></strong>
                        </span>
                   
                </div>

                <div class="form-group">
                    <label for="sale_no">Customer Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="customer_name" class="form-control round"  placeholder="Enter Customer name"  name="customer_name">
           
                <span class="help-block">
                    <strong></strong>
                </span>
           
                </div>
                <div class="form-group">
                    <label for="customer_address">Customer Address 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round"  placeholder="Enter Customer Address"  name="customer_address">
          
                <span class="help-block">
                    <strong></strong>
                </span>
           
                </div>

                <div class="form-group">
                    <label for="country">Select Country
                    <span class=" text-danger">*
                    </span>
                    </label>
                  
                    <select name="country" class="form-control round" id="country">
                <option value="bn">
                    Bangladesh
                </option>
                <option value="an">
                    Australia
                </option>
                <option value="usa">
                    Amarica
                </option>
                <option value="en">
                    England
                </option>

                    </select>
                      
                <span class="help-block">
                    <strong></strong>
                </span>
          
                </div>


                <div class="form-group">
                    <label for="customer_email">
                    Customer Email <span class=" text-danger">*</span></label>
                    <input type="email" id="customer_email" class="form-control round" placeholder="Enter Email address" name="customer_email">

                <span class="help-block">
                    <strong>

                    </strong>
                </span>

                </div>


                <div class="form-group">
                    <label for="status">Select Status <span class=" text-danger">*</span></label>
                    <select name="status" class="form-control round" id="status">
                    <option>Select Customer status
                    </option>
                    <option value="1">
                    Active
                    </option>
                    <option value="0">
                    Inactive
                    </option>
                    </select>

                <span class="help-block">
                    <strong>

                            </strong>
                        </span>

                </div>
                <div class="form-group">
                    <label for="customer_image">Select Customer Image <span class=" text-danger">*</span></label>
                    <input type="file" name="customer_image" class="form-control">
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                </button>
            <button type="submit" class="btn btn-primary">
                    <i class="icon-plus"></i> Add Customer
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
