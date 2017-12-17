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
<h4 class="card-title">Total Sales List</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<br>
<?php if (isset($_GET['Message'])) { ?>
      <h3 class="btn btn-success text-center"><?php echo 'Your Data updated Successfully';?></h3>
      <?php unset($_GET['Message']); ?>
<?php } ?>

 <?php 
if (isset($_GET['delid'])) {
$delid=$_GET['delid'];
$query="DELETE FROM tbl_sales WHERE id='$delid'";
 $delid=$dbcon->delete($query);
  if ($delid) {
echo "<span class='btn btn-success text-center'>Deleted Item</span>";
       }
       else{
        echo "No Deleted Customer";
       }
                    }
?>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <?php 
      $user_type= Session::get('user_type');
      if ($user_type == 'admin' OR $user_type =='super_admin') {?>
  <span style="float: right; padding: 5px">
        <a href="add_sales.php" class="btn btn-info">
        <i class="icon-plus"></i>
            Added Sale
        </a>
    </span> 
    <?php } ?>
</div>
<div class="table-responsive">
<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="1%">S</th>
                <th width="2%">No</th>
                <th width="10%">Sales Date</th>
                <th width="10%">Sales Price</th>
                <th width="4%">Customer</th>
                <th width="4%">Product Name</th>
                <th width="4%">Product Image</th>
               <th width="4%">T Qty</th>

               <th width="4%">T Amount</th>
      
               <th width="10%">Action</th>

            </tr>
        </thead>
        <tbody>

           <?php 

$query="SELECT  tbl_sales.*,tbl_customer.customer_name,tbl_product.product_name,tbl_product.product_image
 FROM 
 tbl_sales
  LEFT JOIN tbl_customer ON tbl_sales.customer_id=tbl_customer.id 
  LEFT JOIN tbl_product ON tbl_sales.product_id=tbl_product.id 

 ORDER BY tbl_sales.id DESC ";

$sales=$dbcon->select($query);
if ($sales) {
    $i=1;
while ($result=$sales->fetch_assoc()) {
?>
                <tr>
                <td scope="row">
                    <?php echo $i++; ?>
                </td>
                <td>
                    <?php echo $result['sale_no']; ?>
                </td>
                <td>
            <?php echo date('F d, Y', strtotime($result['sale_date']))?>
                <td><?php echo $result['sale_unit_price']; ?></td>
                <td><?php echo $result['customer_name']; ?></td>
                <td><?php echo $result['product_name']; ?></td>
                <td>
            <img src=" <?php echo $result['product_image'];?>" width="50" height="50">
                </td>
                <td><?php echo $result['sale_qty']; ?></td>
                <td>
                    <?php 
                    $total_amount = $result['sale_qty'] * $result['sale_unit_price']
                     ?>
                    <?php echo $total_amount; ?>
                         
                    </td>
  

  
                <td>
                    <a href="edit_sales.php?id=<?php echo $result['id']; ?>">
                        <i class="text-info icon-edit2"></i>
                    </a>
                    <a href="?delid=<?php echo $result['id']; ?>" onclick="return confirm('Are You Sure To Deleted')">
                        <i class="text-danger icon-remove">
                        </i>
                    </a>
                </td>

            </tr>
           <?php }}?>
            
           
        </tbody>
    </table>
        
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
<!-- datatable -->
 <?php include 'includes/data_table.php'; ?>
<script>
$(document).ready(function() {
    $('#myTable').DataTable( {

        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 
            {
                extend: 'pdfHtml5',
                download: 'open',
                  exportOptions: {
                columns: [ 0,1,2,3,4,5,6,7,8],
                stripHtml: false
                }
            },
            {
                extend: 'print',
                exportOptions: {
               columns: [ 0,1,2,3,4,5,6,7,8],
                stripHtml: false
                }
            },
            'colvis'
        ],
            responsive: {

            details: {

                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
            return 'Details for Customer '+data[4]+' Sale Date '+data[2];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()

            },

        },

         columnDefs: [ {
            targets: -1,
            visible: true
        } ],

    } );
} );
</script>

  </body>
</html>