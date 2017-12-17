<?php include('includes/header.php');?>
<?php include('includes/script.php'); ?>
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
                <h4 class="card-title" id="basic-layout-round-controls">Add Supplier</h4>
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

    $s_code   = mysqli_real_escape_string($dbcon->link,$_POST['s_code']);
    $s_name   = mysqli_real_escape_string($dbcon->link,$_POST['s_name']);
    $s_address    = mysqli_real_escape_string($dbcon->link,$_POST['s_address']);
    $s_c_person = mysqli_real_escape_string($dbcon->link,$_POST['s_c_person']);
    $s_phone = mysqli_real_escape_string($dbcon->link,$_POST['s_phone']);
    $s_status = mysqli_real_escape_string($dbcon->link,$_POST['s_status']);


    if ($s_code == "" || $s_name == "") {
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
    tbl_suppliers
    (
    supplier_code,
    supplier_name,
    supplier_address,
    supplier_contact_person,
    supplier_phone,
    supplier_status) 
    VALUES(
    '$s_code',
    '$s_name',
    '$s_address',
    '$s_c_person',
    '$s_phone',
    '$s_status')";
    $inserted_rows = $dbcon->insert($query);
    if ($inserted_rows) {
         $msgType = "success";
        ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
      <span class="close" data-dismiss="alert">&times;</span>
          <?php echo 'Add Item Successfully.';?>
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
                    <label for="s_code">Supplier Code 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="s_code" class="form-control round"  name="s_code" placeholder="1002">
         
                </div>

                <div class="form-group">
                    <label for="s_name">Supplier Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="s_name" class="form-control round" placeholder="Enter Supplier Name"  name="s_name">
  
                </div>
                <div class="form-group">
                    <label for="s_address">Address 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="s_address" class="form-control round"  placeholder="Enter Supplier  Address" name="s_address">
         
                </div>
                <div class="form-group">
                    <label for="s_c_person">Contact Person 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="s_c_person" class="form-control round" placeholder="Enter Supplier Contact Person" name="s_c_person">
           
                </div>
                <div class="form-group">
                    <label for="product_order_level">
                    Phone No<span class=" text-danger"> *</span></label>
                    <input type="text" id="s_phone" class="form-control round" placeholder="Enter Supplier Number" name="s_phone">
   
                </div>


                <div class="form-group{{ $errors->has('s_status') ? ' has-error' : '' }}">
                    <label for="s_status">Select Status <span class=" text-danger">*</span></label>
                    <select name="s_status" class="form-control round" id="s_status">
                    <option>Select Supplier status
                    </option>
                    <option value="1">
                    Active
                    </option>
                    <option value="0">
                    Inactive
                    </option>
                    </select>
                 
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-plus"></i> Add Supplier
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
