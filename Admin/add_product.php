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
                <h4 class="card-title" id="basic-layout-round-controls">Add Item</h4>
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

    $product_code   = mysqli_real_escape_string($dbcon->link,$_POST['product_code']);
    $product_name   = mysqli_real_escape_string($dbcon->link,$_POST['product_name']);
    $product_dis    = mysqli_real_escape_string($dbcon->link,$_POST['product_dis']);
    $product_price    = mysqli_real_escape_string($dbcon->link,$_POST['product_price']);
    $product_order_level    = mysqli_real_escape_string($dbcon->link,$_POST['product_order_level']);
    $product_status    = mysqli_real_escape_string($dbcon->link,$_POST['product_status']);
    $date = $_POST['product_date'];
    $product_date = date('Y-m-d', strtotime($date));
    // $customer_image  =$imageUrl;


    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['product_image']['name'];
    $file_size = $_FILES['product_image']['size'];
    $file_temp = $_FILES['product_image']['tmp_name'];
    $div       = explode('.', $file_name);
    $file_ext  = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if ($product_name == "" || $product_dis == "") {
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
    tbl_product
    (
    product_code,
    product_name,
    product_dis,
    product_price,
    product_order_level,
    product_status,
    product_date,
    product_image) 
    VALUES(
    '$product_code',
    '$product_name',
    '$product_dis',
    '$product_price',
    '$product_order_level',
    '$product_status',
    '$product_date',
    '$uploaded_image')";
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
     echo "<span class='error'>Item Not Added !</span>";
    }
}

}
?>
       <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

            <div class="form-body">

                <div class="form-group">
                    <label for="product_code">Item Code 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="product_code" class="form-control round"  name="product_code" placeholder="1002">

                </div>

                <div class="form-group">
                    <label for="product_name">Item Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="product_name" class="form-control round" placeholder="Enter Item name"  name="product_name">
      
                </div>
                <div class="form-group">
                    <label for="product_dis">Item Discription 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" placeholder="Enter Item  Discription" name="product_dis">
   
                </div>
                <div class="form-group">
                    <label for="product_price">Item Min Sale Price 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="product_price" class="form-control round"  placeholder="Enter Item Price" name="product_price">


                </div>

                <div class="form-group">
                    <label for="product_order_level">
                    Item Order Level<span class=" text-danger">*</span></label>
                    <input type="text" id="product_order_level" class="form-control round" placeholder="Enter Item Order Level" name="product_order_level">
    
                </div>


                <div class="form-group">
                    <label for="status">Select Status <span class=" text-danger">*</span></label>
                    <select name="product_status" class="form-control round" id="status">
                    <option>Select Item status
                    </option>
                    <option value="1">
                    Active
                    </option>
                    <option value="0">
                    Inactive
                    </option>
                    </select>
          
                </div>
                <div class="form-group">
                    <label for="product_image">Select Item Image <span class=" text-danger">*</span></label>
                    <input type="file" name="product_image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="product_image">Select Item Date <span class=" text-danger">*</span></label>
                    <input type="date" name="product_date" class="form-control">
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Add Item
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
