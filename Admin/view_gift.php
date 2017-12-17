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
<ol>Dashboard / Gift</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Gift Card Details</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <?php 
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='index_gift.php';</script>";
}
else{
    $id=$_GET['id'];
}
 ?> 
    <span style="float: right; padding: 5px">
        <a href="index_gift.php" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Gift Card List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-10">
        <div id="card_details">
            <h3>Gift Card</h3>
            <?php $query="SELECT  * FROM tbl_gift where id='$id'";
$giftcard=$dbcon->select($query);
if ($giftcard) {
while ($result=$giftcard->fetch_assoc()) { ?>
<span class="card_number">
            <?php  echo $result['card_no']; ?></span>
            <h1>USD   <?php  echo $result['value']; ?></span></h1>
            <p>Expiry  : <?php echo date('F d, Y', strtotime($result['card_date']))?>

            </p>
<?php }}?> 
            
        </div>
        <br>
        <hr>
        <div id="card_details_back">
            <h3>Gift Card</h3> 
            <p></p>
        </div>
    </div> 
  

</div>
<br><br>
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