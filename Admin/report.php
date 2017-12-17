<?php include('includes/header.php');?>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

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
            <ol>Dashboard / Report</ol>
        </div>
    </div>
   <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="red">
                                <i class="icon-circle-thin"></i></h3>
                            <span>
                            <a href="purchase_report.php">
                                Purchase Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-file-pdf-o red font-large-2 float-xs-right"></i>
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
                            <h3 class="orange">
                                <i class="icon-circle-thin"></i></h3>
                            <span>
                            <a href="sales_report.php">
                                Sales Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-file-pdf-o orange font-large-2 float-xs-right"></i>
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
                                <i class="icon-circle-thin"></i></h3>
                            <span>
                            <a href="item_report.php">
                                Item Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-file-pdf-o green font-large-2 float-xs-right"></i>
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
                                <i class="icon-circle-thin"></i></h3>
                            <span>
                            <a href="employee_report.php">
                                HR Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-file-pdf-o blue font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
  
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
