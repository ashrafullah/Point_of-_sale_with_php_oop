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

        <div class="content-body"><!-- stats -->
<div class="row">
    <div class="card">
         <div class="card-block">
            <ol>Dashboard / Gift Card</ol>
        </div>
    </div>
    <div class="row match-height tex-center">
    <div class="col-md-offset-2 col-md-8 ">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">
                Add Gift Card</h4>
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

    $card_no   = mysqli_real_escape_string($dbcon->link,$_POST['card_no']);
    $value   = mysqli_real_escape_string($dbcon->link,$_POST['value']);
    $date = $_POST['c_date'];
    $c_date = date('Y-m-d', strtotime($date));

    if ($card_no == "" || $value == "") {
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
    tbl_gift
    (
    card_no,
    value,
    card_date) 
    VALUES(
    '$card_no',
    '$value',
    '$c_date')";
    $inserted_rows = $dbcon->insert($query);
    if ($inserted_rows) {
         $msgType = "success";
        ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
      <span class="close" data-dismiss="alert">&times;</span>
          <?php echo 'Add Gift Successfully.';?>
        </div>
    <?php } 
    else 
    {
     echo "<span class='error'>Gift Not Added !</span>";
    }
}

}
?>
          <form class="form-horizontal" method="POST" action="">

            <div class="form-body">

                <div class="form-group">
                    <label for="s_code">Card Number 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="card_no" class="form-control round"  name="card_no" placeholder="Enter Card Number">
         
                </div>

                <div class="form-group">
                    <label for="s_name">Price 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="value" class="form-control round" placeholder="Enter Card Price"  name="value">
  
                </div>
                <div class="form-group">
                    <label for="card_date">Card Date 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="date" id="c_date" class="form-control round" name="c_date">
         
                </div>
                
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-plus"></i> Add Gift
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
