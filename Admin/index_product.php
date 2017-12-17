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
<ol>Dashboard / Item</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Item List</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<?php if (isset($_GET['Message'])) { ?>
      <h3 class="btn btn-success text-center"><?php echo 'Your Data updated Successfully';?></h3>
      <?php unset($_GET['Message']); ?>
<?php } ?>

 <?php 
if (isset($_GET['delid'])) {
$delid=$_GET['delid'];
$query="DELETE FROM tbl_product WHERE id='$delid'";
 $delid=$dbcon->delete($query);
  if ($delid) {
echo "<span class='btn btn-success text-center'>Deleted Item</span>";
       }
       else{
        echo "No Deleted Customer";
       }
                    }
?>
 <?php 
if (isset($_GET['statusid'])) {
$statusid=$_GET['statusid'];
$query="UPDATE tbl_product SET product_status=0 WHERE id = '$statusid'";
 $statusid=$dbcon->update($query);
  if ($statusid) {
echo "<span class='btn btn-danger text-center'
>Product DeActivated Successfully</span>";
       }
       else{
        echo "No Updated Product Activated";
       }
  }
if (isset($_GET['Instatusid'])) {
$Instatusid=$_GET['Instatusid'];
$query="UPDATE tbl_product SET product_status=1 WHERE id = '$Instatusid'";
 $Instatusid=$dbcon->update($query);
  if ($Instatusid) {
echo "<span class='btn btn-success text-center'
>Product Activated Successfully</span>";
       }
       else{
        echo "No Updated Product DeActivated";
       }
                    }
?>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <span style="float: right; padding: 5px">
        <a href="add_product.php" class="btn btn-info">
        <i class="icon-plus"></i>
            Added Item
        </a>
    </span> 
</div>
<!-- <button>Print</button> -->
<div class="table-responsive">
<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="4%">SL</th>
                <th width="4%">Code</th>
                <th width="5%">Name</th>
                <th width="5%">Price</th>
                <th width="10%">Order Level</th>
                <th width="4%">Photo</th>
                <th width="4%">Date</th>
                <th width="4%">Active</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>

           <?php 
$query="SELECT  * FROM tbl_product ORDER BY id DESC ";
$product=$dbcon->select($query);
if ($product) {
    $i=1;
while ($result=$product->fetch_assoc()) {
?>
                <tr>
                <td scope="row">
                    <?php echo $i++; ?>
                </td>
                <td>
                    <?php echo $result['product_code']; ?>
                </td>
                <td><?php echo $result['product_name']; ?></td>
                <td><?php echo $result['product_price']; ?></td>
                <td><?php echo $result['product_order_level']; ?></td>
                <td>
            <img src="<?php echo $result['product_image'];?>" width="50" height="50">
                </td>
                <td>
                 <?php echo date('F d, Y', strtotime($result['product_date']))?>
                </td>
                <td>
                    <?php if( $result['product_status'] == 1) { ?>
                      <li class="text-success" style="list-style: none">
                         <a onclick="return confirm('AreYou Sure To Deactivated')" href="?statusid=<?php echo $result['id']; ?>">
                           <i class="icon-eye"></i>&nbsp;Active
                         </a>
                     </li>
                    <?php }  
                     else{ ?>
                         <li class="text-warning"  style="list-style: none;color: red">
                    <a style="color: red" onclick="return confirm('AreYou Sure To Activated')" href="?Instatusid=<?php echo $result['id']; ?>">
                           <i class="icon-eye"></i>&nbsp;Inactive
                         </a>
                        </li>
                        <?php } ?>
                </td>
                
                <td>
                    <a href="edit_product.php?id=<?php echo $result['id']; ?>">
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

<!-- <script type="text/javascript">
  function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
</script> -->
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
                download: 'open'
            },
            {
                extend: 'print',
                exportOptions: {
                columns: [ 0,1,2,3,4,5,6],
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
            return 'Details for '+data[2]+' Price '+data[3];
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