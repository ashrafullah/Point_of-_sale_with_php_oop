<?php include('includes/header.php');?>
<style type="text/css">
    .right .edit_item li a{
        list-style-type: none;
    }
</style>
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
<ol>Dashboard / Edit Supplier</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Edit Supplier Details</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <?php 
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='index_supplier.php';</script>";
}
else{
    $id=$_GET['id'];
}
 ?>
 <?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $s_code   = mysqli_real_escape_string($dbcon->link,$_POST['s_code']);
    $s_name   = mysqli_real_escape_string($dbcon->link,$_POST['s_name']);
    $s_address    = mysqli_real_escape_string($dbcon->link,$_POST['s_address']);
    $s_c_person = mysqli_real_escape_string($dbcon->link,$_POST['s_c_person']);
    $s_phone = mysqli_real_escape_string($dbcon->link,$_POST['s_phone']);
    $s_status = mysqli_real_escape_string($dbcon->link,$_POST['s_status']);
         if ($s_code == "" || $s_name == "") { 
        echo "<span class='error'>Field Not Must be empty</span>";

    }
    else{
    $query="UPDATE tbl_suppliers
    SET
    supplier_code='$s_code',
    supplier_name='$s_name',
    supplier_address='$s_address',
    supplier_contact_person='$s_c_person',
    supplier_phone='$s_phone',
    supplier_status='$s_status'
    WHERE id=$id";
    $update_supplier = $dbcon->update($query);
    if ($update_supplier) { 
        $msgType = "success";
        $msg = "success";
       header("Location: index_supplier.php?Message=" . urlencode($Message));

    }else 
    {
     echo "<span class='error'>Supplier Not Updated !</span>";
    }


        }

}
 ?>
<?php $query="SELECT  * FROM tbl_suppliers where id='$id'";
$supplier=$dbcon->select($query);
if ($supplier) {
while ($result=$supplier->fetch_assoc()) { ?>
    <h3 class="text-info">
    Details Of Company
    <?php echo $result['supplier_name']; ?>
    </h3>
<?php }} ?>
    <span style="float: right; padding: 5px">
        <a href="index_supplier.php" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Supplier List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="left">

    <ul>
        <li>Supplier Code</li>
        <li>Supplier Company</li>
        <li>Supplier Address</li>
        <li>Supplier Conatact Person</li>
        <li>Supplier Phone</li>
        <li>Supplier Status</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">

      <ul class="edit_item">
<?php 

$query="SELECT  * FROM tbl_suppliers where id='$id'";
$supplier=$dbcon->select($query);
if ($supplier) {
while ($result=$supplier->fetch_assoc()) { ?>
        <form action="" method="post" class="form-horizontal">
            <li>
    <input class="form-control" type="text" name="s_code" value="<?php echo $result['supplier_code'] ?>">
        </li>
        <li>
    <input class="form-control" type="text" name="s_name" value="<?php echo $result['supplier_name'] ?>">
        </li>
        <li>
    <input class="form-control" type="text" name="s_address" value="<?php echo $result['supplier_address'] ?>">
        </li>
        <li>
    <input class="form-control" type="text" name="s_c_person" value="<?php echo $result['supplier_contact_person'] ?>">
        </li>
        <li>
    <input class="form-control" type="text" name="s_phone" value="<?php echo $result['supplier_phone'] ?>">
        </li>
 
        <?php if( $result['suppier_status'] == 1) { ?>
        <li class="text-success" style="list-style: none">
        <i class="icon-eye"></i>&nbsp;Active

            <select name="s_status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

        </li>
        <?php }  
        else{ ?>
         <li class="text-danger">
          <i class="icon-eye"></i>&nbsp;Inactive
          <select name="s_status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </li>
         <hr>
       <input type="submit" class="btn-primary p-1" cursor="pointer"  name="submit" value="Update">
        </form>
        <?php }?>
       

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