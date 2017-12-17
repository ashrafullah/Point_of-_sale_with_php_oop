<?php include('includes/header.php');?>
 

    <!-- navbar-fixed-top-->
<?php include('includes/navbar-fixed-top.php');?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
   
    <!-- / main menu-->
<?php include('includes/main-menu.php');?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->
<div class="row blank-page">
    <div class="card">
         <div class="card-block">
            <ol>Dashboard / Inventory</ol>
  
            Welcome Back <span class="btn btn-info">
         <?php
             $id = Session::get('id');
              $query="SELECT  * FROM users where id ='$id'";
              $result=$dbcon->select($query);
              $value=$result->fetch_assoc();
                echo $value['name'];
            ?>
        </span>
<hr>
            <h4 class="text-center">
            <?php echo "Today Is ".date('l'); ?>
            <?php echo date('M-Y'); ?>
            </h4>

        </div>
    </div>
    <?php 

      $id = Session::get('id');
      $query="SELECT  * FROM users where id ='$id'";
      $result=$dbcon->select($query);
     $value=$result->fetch_assoc();
    if ($value['user_type'] == 'super_admin' OR $value['user_type'] == 'admin') {?>

   <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="red">
                                <i class="icon-plus"></i></h3>
                            <span>
                            <a href="add_sales.php">
                                New Sell
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus red font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                          
    <?php 
    $query="SELECT  count(id) FROM tbl_sales ORDER BY id DESC ";
        $sales=$dbcon->select($query);
        if ($sales) {
        while ($result=$sales->fetch_array()) { ?>
            <h3 class="blue"><?php echo $result[0]; ?></h3>
    <?php } }?>
                            <span>
                            <a href="index_sales.php">
                             Sell List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list blue font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="green">
                                <i class="icon-plus"></i></h3>
                            <span>
                            <a href="add_purchase.php">
                                New Purchase
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus green font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <?php 
    $query="SELECT  count(id) FROM tbl_purchase ORDER BY id DESC ";
        $sales=$dbcon->select($query);
        if ($sales) {
        while ($result=$sales->fetch_array()) { ?>
            <h3 class="blue"><?php echo $result[0]; ?></h3>
    <?php } }?>
                            <span>
                            <a href="index_purchase.php">
                                Purchase List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list orange font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="blue">
                                <i class="icon-plus"></i></h3>
                            <span>
                            <a href="add_supplier.php">
                                New Supplier
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus blue font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                           <?php 
    $query="SELECT  count(id) FROM tbl_suppliers ORDER BY id DESC ";
        $sales=$dbcon->select($query);
        if ($sales) {
        while ($result=$sales->fetch_array()) { ?>
            <h3 class="blue"><?php echo $result[0]; ?></h3>
    <?php } }?>
                            
                            <span>
                            <a href="index_supplier.php">
                                Supplier List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list black font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">

                        <h3 class="yellow"><i class="icon-plus"></i></h3>
                            
                            <span>
                            <a href="add_customer.php">
                                New Customer
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus yellow font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
    <?php 
    $query="SELECT  count(id) FROM tbl_customer ORDER BY id DESC ";
        $sales=$dbcon->select($query);
        if ($sales) {
        while ($result=$sales->fetch_array()) { ?>
            <h3 class="blue"><?php echo $result[0]; ?></h3>
    <?php } }?>
                            <span>
                            <a href="index_customer.php">
                             Customer List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="brown ">
                                <i class="icon-plus"></i></h3>
                            <span>
                            <a href="add_product.php">
                             Add  Item
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus brown  font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
    <?php 
    $query="SELECT  count(id) FROM tbl_product ORDER BY id DESC ";
        $sales=$dbcon->select($query);
        if ($sales) {
        while ($result=$sales->fetch_array()) { ?>
            <h3 class="blue"><?php echo $result[0]; ?></h3>
    <?php } }?>
                           
                            <span>
                            <a href="index_product.php">
                             Item List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list green font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="brown ">
                                <i class="icon-plus"></i></h3>
                            <span>
                            <a href="add_user.php">
                             Add  User
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus brown  font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
    <?php 
    $query="SELECT  count(id) FROM users ORDER BY id DESC ";
        $sales=$dbcon->select($query);
        if ($sales) {
        while ($result=$sales->fetch_array()) { ?>
            <h3 class="blue"><?php echo $result[0]; ?></h3>
    <?php } }?>
                           
                            <span>
                            <a href="index_user.php">
                             User List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list green font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php } ?>
     <!-- cahier -->
     <?php if ($value['user_type'] == 'cashier') {?>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                          
    <?php 
    $query="SELECT  count(id) FROM tbl_sales ORDER BY id DESC ";
        $sales=$dbcon->select($query);
        if ($sales) {
        while ($result=$sales->fetch_array()) { ?>
            <h3 class="blue"><?php echo $result[0]; ?></h3>
    <?php } }?>
                            <span>
                            <a href="index_sales.php">
                             Sell List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list blue font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
     <!-- customer -->
<?php if ($value['user_type'] == 'customer') {?>
 <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
    <?php 
    $query="SELECT  count(id) FROM tbl_customer ORDER BY id DESC ";
        $sales=$dbcon->select($query);
        if ($sales) {
        while ($result=$sales->fetch_array()) { ?>
            <h3 class="blue"><?php echo $result[0]; ?></h3>
    <?php } }?>
                            <span>
                            <a href="index_customer.php">
                             Customer List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>

<!-- Recent invoice with Statistics -->
<div class="row match-height">


</div>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<?php include('includes/footer.php') ?>
<?php include 'includes/script_js.php'; ?>

  
  </body>
</html>
