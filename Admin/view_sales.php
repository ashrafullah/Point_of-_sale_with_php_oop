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
<ol>Dashboard / Sales</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Sales Details</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
  <?php 
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='index_sales.php';</script>";
}
else{
    $id=$_GET['id'];
}
 ?>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
 
<?php $query="SELECT  * FROM tbl_sales where id='$id'";
$sales=$dbcon->select($query);
if ($sales) {
while ($result=$sales->fetch_assoc()) { ?>
    <h3 class="text-info">
    Details Of
    <?php echo $result['sale_no']; ?>
    </h3>
<?php }} ?>
    <span style="float: right; padding: 5px">
        <a href="index_sales.php" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Sales List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="left">

    <ul>
        <li>Sale No</li>
        <li>Sale Date</li>
        <li>Sale Item</li>
        <li>Sale Customer</li>
        <li>Sale Quantity</li>
        <li>Sale Price Unit</li>
        <li>Sale Total Amount</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">

      <ul style="list-style: none;">


<?php 


$query="SELECT  tbl_sales.*,tbl_customer.customer_name,tbl_product.product_name
 FROM 
 tbl_sales
  LEFT JOIN tbl_customer ON tbl_sales.customer_id=tbl_customer.id 
  LEFT JOIN tbl_product ON tbl_sales.product_id=tbl_product.id 

  where tbl_sales.id ='$id'";
$sales=$dbcon->select($query);
if ($sales) {
while ($result=$sales->fetch_assoc()) { ?>
      <form action="" method="post">
        <li><?php echo $result['sale_no'] ?></li>

        <li>
          <?php echo date('F d, Y', strtotime($result['sale_date']))?>
        </li>
        <li>
          <?php echo $result['product_name'] ?>
            
          </li>
        <li>
          <?php echo $result['customer_name'] ?>
            
          </li>
        <li>
          <?php echo $result['sale_qty'] ?>
            
          </li>
        <li>
          <?php echo $result['sale_unit_price'] ?>
          <?php echo $result['updated_at'] ?>
            
          </li>
        <li>
            <?php 
                    $total_amount = $result['sale_qty'] * $result['sale_unit_price']
                     ?>
                    <?php echo $total_amount; ?>
            
          </li>
        <br>
        <hr>
        <button class="btn btn-primary">
            <a style="color: white" href="Reports/sales_report.php?id=<?php echo $result['id'];?>">
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