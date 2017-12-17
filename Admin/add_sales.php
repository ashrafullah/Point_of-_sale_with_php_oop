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
            <ol>Dashboard / Add Sales</ol>
        </div>
    </div>
    <div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                
                <h4 class="card-title" id="basic-layout-round-controls">Add Sales</h4>
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

$sale_no   = mysqli_real_escape_string($dbcon->link,$_POST['sale_no']);
$sale_qty   = mysqli_real_escape_string($dbcon->link,$_POST['sale_qty']);
$sale_unit_price    = mysqli_real_escape_string($dbcon->link,$_POST['sale_unit_price']);
$product_id = mysqli_real_escape_string($dbcon->link,$_POST['product_id']);
$customer_id = mysqli_real_escape_string($dbcon->link,$_POST['customer_id']);
$sale_note = mysqli_real_escape_string($dbcon->link,$_POST['sale_note']);
$date = $_POST['sale_date'];
$sale_date = date('Y-m-d', strtotime($date));

    if ($sale_no == "" || $sale_note == "") {
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
    tbl_sales
    (
    sale_no,
    sale_qty,
    sale_unit_price,
    product_id,
    customer_id,
    sale_note,
    sale_date) 
    VALUES(
    '$sale_no',
    '$sale_qty',
    '$sale_unit_price',
    '$product_id',
    '$customer_id',
    '$sale_note',
    '$sale_date')";
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
                        Sales No 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round"  placeholder="1002" name="sale_no">
         

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
                    <label for="complaintinput3">Sales Date
                         <span class=" text-danger">*</span>
                    </label>
            <input type="date" id="sale_date" class="form-control round" name="sale_date">
                </div>


                <div class="form-group">
                    <label for="complaintinput4">
                    Sales Qty <span class=" text-danger">*</span></label>
                    <input type="text" id="sale_qty" class="form-control round" placeholder="Enter Qty" name="sale_qty" value="0">
                </div>


                <div class="form-group">
                    <label for="complaintinput5">Price Per Unit</label>
               
                     <input type="text" id="sale_unit_price" class="form-control round" placeholder="Keep Blank for Default Price" value="" name="sale_unit_price">
                </div>


                <div class="form-group">
                    <label for="customer_id">Select Customer <span class=" text-danger">*</span></label>
            <select name="customer_id" class="form-control round" id="customer_id">
        <option value="0">Select Customer</option>
            <?php 
$query="SELECT  * FROM tbl_customer ORDER BY id DESC ";
$customer=$dbcon->select($query);
if ($customer) {

    while ($result=$customer->fetch_assoc()) {?>
        <option value="<?php echo $result['id']; ?>">
            <?php echo $result['customer_name']; ?>
        </option>
<?php }} ?>
                    
                    </select>
                </div>
                <div class="form-group">
                    <label for="complaintinput5">Sale Note</label>
               
                     <input type="text" id="sale_note" class="form-control round" placeholder="Enter Sale Note" value="" name="sale_note">
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-plus"></i> Add Sales
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
