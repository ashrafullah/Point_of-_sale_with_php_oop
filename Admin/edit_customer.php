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
<ol>Dashboard / Edit Customer</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Edit Customer</h4>
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
    $uid =$_POST['update'];
    $customer_code   = mysqli_real_escape_string($dbcon->link,$_POST['customer_code']);
    $customer_name   = mysqli_real_escape_string($dbcon->link,$_POST['customer_name']);
    $customer_address    = mysqli_real_escape_string($dbcon->link,$_POST['customer_address']);
    $country    = mysqli_real_escape_string($dbcon->link,$_POST['country']);
    $customer_email    = mysqli_real_escape_string($dbcon->link,$_POST['customer_email']);
    $status  = mysqli_real_escape_string($dbcon->link,$_POST['status']);

      if ($customer_code == "" || $customer_name == "" || $customer_address == "") {
        echo "<span class='error'>Field Not Must be empty</span>";

    }
    else{
    $query="UPDATE tbl_customer
    SET
    customer_code='$customer_code',
    customer_name='$customer_name',
    customer_address='$customer_address',
    country='$country',
    customer_email='$customer_email',
    -- customer_image='$customer_image',
    status='$status'
    WHERE id=$id";
    $update_customer = $dbcon->update($query);
    if ($update_customer) { 
        $msgType = "success";
        $msg = "success";
       header("Location: index_customer.php?Message=" . urlencode($Message));

    }else 
    {
     echo "<span class='error'>Customer Not Updated !</span>";
    }


        }

}
 ?>
</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
 
<?php $query="SELECT  * FROM tbl_customer where id='$id'";
$customer=$dbcon->select($query);
if ($customer) {
while ($result=$customer->fetch_assoc()) { ?>
    <h3 class="text-info">
    Details Of
    <?php echo $result['customer_name']; ?>
    </h3>
<?php }} ?>
    <span style="float: right; padding: 5px">
        <a href="index_customer.php" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Employee List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="left">

    <ul>
        <li>Customer Code</li>
        <li>Customer Name</li>
        <li>Customer Email</li>
        <li>Customer Address</li>
        <li>Customer Country</li>
        <li>Customer Status</li>
        <li>Customer Image</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">

      <ul style="list-style: none;">


<?php 

$query="SELECT  * FROM tbl_customer where id='$id'";
$customer=$dbcon->select($query);
if ($customer) {
while ($result=$customer->fetch_assoc()) { ?>
      <form action="" method="post">
        <li>
<input type="" name="customer_code" value="<?php echo $result['customer_code'] ?>">
        </li>
        <li>
<input type="" name="customer_name" value="<?php echo $result['customer_name'] ?>">

        </li>
        <li>
<input type="" name="customer_email" value="<?php echo $result['customer_email'] ?>">
        </li>
        <li>
<input type="" name="customer_address" value="<?php echo $result['customer_address'] ?>">
        </li>
        <li>
<input type="" name="country" value="<?php echo $result['country']; ?>">        
        </li>
        <?php if( $result['status'] == 1) { ?>
        <li class="text-success" style="list-style: none">
        <i class="icon-eye"></i>&nbsp;Active

            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

        </li>
        <?php }  
        else{ ?>
         <li class="text-danger">
          <i class="icon-eye"></i>&nbsp;Inactive
          <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
      </li>
        <?php } ?>
        <li><img src="<?php echo $result['customer_image']; ?>" width="100" height="100"></li>
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