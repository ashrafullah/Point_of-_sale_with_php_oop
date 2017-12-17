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
<ol>Dashboard / Category</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Category Details</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <?php 
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='index_category.php';</script>";
}
else{
    $id=$_GET['id'];
}
 ?> 
<?php 
$query="SELECT * FROM tbl_category where id='$id'";

$category=$dbcon->select($query);
if ($category) {
while ($result=$category->fetch_assoc()) { ?>
    <h3 class="text-info">
    Details Of Category
    <?php echo $result['c_name']; ?>
    </h3>
<?php }} ?>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {

    $c_name   = mysqli_real_escape_string($dbcon->link,$_POST['c_name']);
    $c_dis   = mysqli_real_escape_string($dbcon->link,$_POST['c_dis']);
    $c_slug   = mysqli_real_escape_string($dbcon->link,$_POST['c_slug']);
    $date = $_POST['c_date'];
    $c_date = date('Y-m-d', strtotime($date));


    if ($c_name == "" || $c_dis == "") {
             $msgType = "danger";
        ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
      <span class="close" data-dismiss="alert">&times;</span>
          <?php echo 'Field Not Must be empty.';?>
        </div>
    <?php 
    }

    else{

    $query="UPDATE tbl_category
    SET
    c_name='$c_name',
    c_dis='$c_dis',
    c_slug='$c_slug',
    c_date='$c_date'
    WHERE id=$id";
    $update_category = $dbcon->update($query);
    if ($update_category) { 
        $msgType = "success";
        $msg = "success";
       header("Location: index_category.php?Message=" . urlencode($Message));

    }else 
    {
     echo "<span class='error'>Category Not Updated !</span>";
    }
}

}
?>
    <span style="float: right; padding: 5px">
        <a href="index_category.php" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Category List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="left">

    <ul>
        <li>Category Name</li>
        <li>Category Discription</li>
        <li>Category Slug</li>
        <li>Category Date</li>
    </ul>
    </div>

    </div>        
    <div class="col-md-6">
        <div class="right">

      <ul style="list-style: none;">


<?php 

$query="SELECT  * FROM tbl_category where id='$id'";
$category=$dbcon->select($query);
if ($category) {
while ($result=$category->fetch_assoc()) { ?>
        <form action="" method="post">
       <li style="list-style: none">
        <input class="form-control" type="text" name="c_name" value="<?php echo $result['c_name'] ?>">
        </li>
        <li style="list-style: none">
        <input class="form-control" type="text" name="c_dis" value="<?php echo $result['c_dis'] ?>">
        </li>
        <li style="list-style: none">
        <input class="form-control" type="text" name="c_slug" value="<?php echo $result['c_slug'] ?>">
        </li>
        </li>
        <li>
        <?php echo date('F d, Y', strtotime($result['c_date']))?>&nbsp;
        <input type="date" name="c_date">
        </li>
        <br>
        <input type="submit" value="Update" class="btn btn-primary"> 
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