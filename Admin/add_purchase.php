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
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->
<div class="row">
    <div class="card">
         <div class="card-block">
            <ol>Dashboard / Inventory</ol>
        <a class="btn-sm btn-primary" href="index_purchase.php">
        <i class="fa fa-list">
        </i>
        Back To Purchase List
        </a>

        </div>
        
        <br>
    </div>
    <div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">Add Purchase</h4>
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

    $p_no   = mysqli_real_escape_string($dbcon->link,$_POST['p_no']);
    $product_id   = mysqli_real_escape_string($dbcon->link,$_POST['product_id']);
    $supplier_id    = mysqli_real_escape_string($dbcon->link,$_POST['supplier_id']);
    $p_unit_price = mysqli_real_escape_string($dbcon->link,$_POST['p_unit_price']);
    $p_qty = mysqli_real_escape_string($dbcon->link,$_POST['p_qty']);
    $date = $_POST['p_date'];
    $p_date = date('Y-m-d', strtotime($date));

    if ($p_no == "" || $p_unit_price == "") {
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
    tbl_purchase
    (
    purchase_no,
    product_id,
    supplier_id,
    purchase_qty,
    p_date,
    purchase_price_unit) 
    VALUES(
    '$p_no',
    '$product_id',
    '$supplier_id',
    '$p_qty',
    '$p_date',
    '$p_unit_price')";
    $inserted_rows = $dbcon->insert($query);
    if ($inserted_rows) {
         $msgType = "success";
        ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
      <span class="close" data-dismiss="alert">&times;</span>
          <?php echo 'Add Purchae Successfully.';?>
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
                    <label for="sale_no">
                        Purchase No 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="p_no" class="form-control round"  placeholder="1002" name="p_no">
         

                </div>

                <div class="form-group">
                    <label for="complaintinput2">
                        Select Item
                         <span class=" text-danger">*
                         </span>
                    </label>
                  
            <select name="product_id" class="form-control round" id="">

        <option>Select Item</option>
<?php 
$query="SELECT  * FROM tbl_product ORDER BY id DESC ";
$product=$dbcon->select($query);
if ($product) {

    while ($result=$product->fetch_assoc()) {?>
        <option value="<?php echo $result['id']; ?>">
            <?php echo $result['product_name']; ?>
        </option>
<?php }} ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="complaintinput3">Purchase Date
                         <span class=" text-danger">*</span>
                    </label>
            <input type="date" id="p_date" class="form-control round" name="p_date">
                </div>


                <div class="form-group">
                    <label for="complaintinput4">
                    Purchase Qty <span class=" text-danger">*</span></label>
                    <input type="text" id="p_qty" class="form-control round" placeholder="Enter Qty" name="p_qty" value="0">
                </div>


                <div class="form-group">
                    <label for="complaintinput5">Price Per Unit</label>
               
                     <input type="text" id="p_unit_price" class="form-control round" placeholder="Keep Blank for Default Price" value="" name="p_unit_price">
                </div>


                <div class="form-group">
                    <label for="supplier_id">Select Supplier <span class=" text-danger">*</span></label>
            <select name="supplier_id" class="form-control round" id="customer_id">
        <option value="0">Select Supplier</option>
            <?php 
$query="SELECT  * FROM tbl_suppliers ORDER BY id DESC ";
$supplier=$dbcon->select($query);
if ($supplier) {

    while ($result=$supplier->fetch_assoc()) {?>
        <option value="<?php echo $result['id']; ?>">
            <?php echo $result['supplier_name']; ?>
        </option>
<?php }} ?>
                    
                    </select>
                </div>

            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-plus"></i> Add Purchase
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
