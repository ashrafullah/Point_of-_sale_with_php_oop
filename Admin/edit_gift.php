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
<ol>Dashboard / Edit Gift Card</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Edit Gift Card Details</h4>
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
    $card_no   = mysqli_real_escape_string($dbcon->link,$_POST['card_no']);
    $value   = mysqli_real_escape_string($dbcon->link,$_POST['value']);
    $date = $_POST['c_date'];
    $c_date = date('Y-m-d', strtotime($date));

         if ($card_no == "" || $value == "") { 
        echo "<span class='error'>Field Not Must be empty</span>";

    }
    else{
    $query="UPDATE tbl_gift
    SET
    card_no='$card_no',
    value='$value',
    card_date='$c_date'
    WHERE id=$id";
    $update_gift = $dbcon->update($query);
    if ($update_gift) { 
        $msgType = "success";
        $msg = "success";
       header("Location: index_gift.php?Message=" . urlencode($Message));

    }else 
    {
     echo "<span class='error'>Gift Card Not Updated !</span>";
    }


        }

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
    <div class="col-md-5">
        <div class="left">

    <ul>
        <li>Card Number</li>
        <li>Card Price</li>
        <li>Card Date</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">

      <ul class="edit_item">
<?php 

$query="SELECT  * FROM tbl_gift where id='$id'";
$gift=$dbcon->select($query);
if ($gift) {
while ($result=$gift->fetch_assoc()) { ?>
        <form action="" method="post" class="form-horizontal">
            <li>
    <input class="form-control" type="text" name="card_no" value="<?php echo $result['card_no'] ?>">
        </li>
        <li>
    <input class="form-control" type="text" name="value" value="<?php echo $result['value'] ?>">
        </li>
        <li><?php echo date('F d, Y', strtotime($result['card_date']))?>&nbsp;
        <input class="form-control" type="date" name="c_date">
            
        </li>
         <hr>
       <input type="submit" class="btn-primary p-1" cursor="pointer"  name="submit" value="Update">
        </form>       

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