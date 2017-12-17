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
<ol>Dashboard / Item</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Item Details</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
  <?php 
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='index_customer.php';</script>";
}
else{
    $id=$_GET['id'];
}
 ?>
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
      if ($product_code == "" || $product_name == "" || $product_dis == "") {
        echo "<span class='error'>Field Not Must be empty</span>";

    }
    else{
    $query="UPDATE tbl_product
    SET
    product_code='$product_code',
    product_name='$product_name',
    product_dis='$product_dis',
    product_price='$product_price',
    product_order_level='$product_order_level',
    product_status='$product_status',
    product_date='$product_date'
    WHERE id=$id";
    $update_product = $dbcon->update($query);
    if ($update_product) { 
        $msgType = "success";
        $msg = "success";
       header("Location: index_product.php?Message=" . urlencode($Message));

    }else 
    {
     echo "<span class='error'>Product Not Updated !</span>";
    }


        }

}
 ?>
</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
 
<?php $query="SELECT  * FROM tbl_product where id='$id'";
$product=$dbcon->select($query);
if ($customer) {
while ($result=$product->fetch_assoc()) { ?>
    <h3 class="text-info">
    Details Of
    <?php echo $result['product_name']; ?>
    </h3>
<?php }} ?>
    <span style="float: right; padding: 5px">
        <a href="index_customer.php" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Product List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="left">

    <ul>
        <li>product Code</li>
        <li>product Name</li>
        <li>product Discription</li>
        <li>product Price</li>
        <li>product Product Order Level</li>
        <li>product Status</li>
        <li>product Image</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">

      <ul style="list-style: none;">


<?php 

$query="SELECT  * FROM tbl_product where id='$id'";
$product=$dbcon->select($query);
if ($product) {
while ($result=$product->fetch_assoc()) { ?>
      <form action="" method="post">
        <li>
<input type="" name="product_code" value="<?php echo $result['product_code'] ?>">
        </li>
        <li>
<input type="" name="product_name" value="<?php echo $result['product_name'] ?>">

        </li>
        <li>
<input type="" name="product_dis" value="<?php echo $result['product_dis'] ?>">
        </li>
        <li>
<input type="" name="product_price" value="<?php echo $result['product_price'] ?>">
        </li>
        <li>
<input type="" name="product_order_level" value="<?php echo $result['product_order_level']; ?>">        
        </li>
        <?php if( $result['product_status'] == 1) { ?>
        <li class="text-success" style="list-style: none">
        <i class="icon-eye"></i>&nbsp;Active

            <select name="product_status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

        </li>
        <?php }  
        else{ ?>
         <li class="text-danger">
          <i class="icon-eye"></i>&nbsp;Inactive
          <select name="product_status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
      </li>
        <?php } ?>
        <li>
            <?php echo $result['product_date'];?>
            <input type="date" name="product_date">
        </li>
        <img src="<?php echo $result['product_image']; ?>" width="100" height="100">
        <br>
        <hr>
       <input type="submit" class="btn-primary p-1" cursor="pointer"  name="submit" value="Update">
<!-- <input type="hidden"  name="update" value="<?php echo $result['id'];?>"> -->
        <br><br>
      </form>

<?php } }?>
    </ul>
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