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
<ol>Dashboard / Purchase</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Purchase Details</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
  <?php 
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='index_purchase.php';</script>";
}
else{
    $id=$_GET['id'];
}
 ?>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
 
<?php $query="SELECT  * FROM tbl_purchase where id='$id'";
$purchase=$dbcon->select($query);
if ($purchase) {
while ($result=$purchase->fetch_assoc()) { ?>
    <h3 class="text-info">
    Details Of
    <?php echo $result['purchase_no']; ?>
    </h3>
<?php }} ?>
    <span style="float: right; padding: 5px">
        <a href="index_purchase.php" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Purchase List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="left">

    <ul>
        <li>Purchase No</li>
        <li>Purchase Date</li>
        <li>Purchase Item</li>
        <li>Purchase Item Image</li>
        <br><br>
        <li>Purchase Supplier</li>
        <li>Purchase Quantity</li>
        <li>Purchase Price Unit</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">

      <ul style="list-style: none;">


<?php 


$query="SELECT  tbl_purchase.*,tbl_suppliers.supplier_name,tbl_product.product_name,tbl_product.product_image
 FROM 
 tbl_purchase
  LEFT JOIN tbl_suppliers ON tbl_purchase.supplier_id=tbl_suppliers.id 
  LEFT JOIN tbl_product ON tbl_purchase.product_id=tbl_product.id 

  where tbl_purchase.id ='$id'";
$purchase=$dbcon->select($query);
if ($purchase) {
while ($result=$purchase->fetch_assoc()) { ?>
      <form action="" method="post">
        <li><?php echo $result['purchase_no'] ?></li>

        <li>
          <?php echo date('F d, Y', strtotime($result['p_date']))?>
        </li>
        <li>
          <?php echo $result['product_name'] ?>
            
          </li>
        <li>
          
          <img src="<?php echo $result['product_image'] ?>" width="80" height="80">
        </li>
        <li>
          <?php echo $result['supplier_name'] ?>
            
          </li>
        <li>
          <?php echo $result['purchase_qty'] ?>
            
          </li>
        <li>
          <?php echo $result['purchase_price_unit'] ?>
            
          </li>
        <br>
        <hr>
         <button class="btn btn-primary">
            <a style="color: white" href="Reports/purchase_report.php?id=<?php echo $result['id'];?>">
               <i class="icon-file-pdf-o"></i> 
               Download Pdf 
            </a>      
        </button>
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