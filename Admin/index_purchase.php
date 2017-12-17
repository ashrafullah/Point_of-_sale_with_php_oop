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
<h4 class="card-title">Total Purchase List</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<br>
<?php if (isset($_GET['Message'])) { ?>
      <h3 class="btn btn-success text-center"><?php echo 'Your Data updated Successfully';?></h3>
      <?php unset($_GET['Message']); ?>
<?php } ?>

 <?php 
if (isset($_GET['delid'])) {
$delid=$_GET['delid'];
$query="DELETE FROM tbl_purchase WHERE id='$delid'";
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
  <span style="float: right; padding: 5px">
        <a href="add_purchase.php" class="btn btn-info">
        <i class="icon-plus"></i>
            Added Purchase
        </a>
    </span>  
</div>
<div class="table-responsive">
<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="1%">S</th>
                <th width="2%">No</th>
                <th width="10%">Purchase Date</th>
                <th width="10%">Price</th>
                <th width="10%">Product Name</th>
                <th width="4%">Supplier</th>
               <th width="4%">Product Image</th>
               <th width="4%">Purchase Qty</th>
               <th width="4%">T Amount</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>

           <?php 



$query="SELECT  tbl_purchase.*,tbl_suppliers.supplier_name,tbl_product.product_name,tbl_product.product_image
 FROM 
 tbl_purchase
  LEFT JOIN tbl_suppliers ON tbl_purchase.supplier_id=tbl_suppliers.id 
  LEFT JOIN tbl_product ON tbl_purchase.product_id=tbl_product.id ORDER BY tbl_purchase.id DESC ";
$purchase=$dbcon->select($query);
if ($purchase) {
    $i=1;
while ($result=$purchase->fetch_assoc()) {
?>
                <tr>
                <td scope="row">
                    <?php echo $i++; ?>
                </td>
                <td>
                    <?php echo $result['purchase_no']; ?>
                </td>
                <td>
            <?php echo date('F d, Y', strtotime($result['p_date']))?>
                <td><?php echo $result['purchase_price_unit']; ?></td>
                <td><?php echo $result['product_name']; ?></td>
                <td><?php echo $result['supplier_name']; ?></td>
                <td><img src="<?php echo $result['product_image'] ?>" width="50" height="50"></td>
                <td>
                  <?php echo $result['purchase_qty']; ?>
                </td>
                <td>
                  <?php
  $tsell  =  $result['purchase_qty'] * $result['purchase_price_unit'];
                 echo $tsell; ?>
                </td>

                <td>
                    <a href="edit_purchase.php?id=<?php echo $result['id']; ?>">
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
            return 'Details for Customer '+data[4]+' Purchase Date '+data[2];
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