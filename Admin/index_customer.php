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
<ol>Dashboard / Customer</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Customer List</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<br>
<?php if (isset($_GET['Message'])) { ?>
      <h3 class="btn btn-success text-center"><?php echo 'Your Data updated Successfully';?></h3>
      <?php unset($_GET['Message']); ?>
<?php } ?>

 <?php 
if (isset($_GET['delid'])) {
$delid=$_GET['delid'];
$query="DELETE FROM tbl_customer WHERE id='$delid'";
 $delid=$dbcon->delete($query);
  if ($delid) {
echo "<span class='btn btn-success text-center'>Deleted Customer</span>";
       }
       else{
        echo "No Deleted Customer";
       }
                    }
?>
 <?php 
if (isset($_GET['statusid'])) {
$statusid=$_GET['statusid'];
$query="UPDATE tbl_customer SET status=0 WHERE id = '$statusid'";
 $statusid=$dbcon->update($query);
  if ($statusid) {
echo "<span class='btn btn-danger text-center'
>Customer DeActivated Successfully</span>";
       }
       else{
        echo "No Updated Customer Activated";
       }
  }
if (isset($_GET['Instatusid'])) {
$Instatusid=$_GET['Instatusid'];
$query="UPDATE tbl_customer SET status=1 WHERE id = '$Instatusid'";
 $Instatusid=$dbcon->update($query);
  if ($Instatusid) {
echo "<span class='btn btn-success text-center'
>Customer Activated Successfully</span>";
       }
       else{
        echo "No Updated Customer Deactivated";
       }
                    }
?>
</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <span style="float: right; padding: 5px">
        <a href="add_customer.php" class="btn btn-info">
        <i class="icon-plus"></i>
            Added Customer
        </a>
    </span> 

</div>
<div class="table-responsive">
<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="2%">SL</th>
                <th width="4%">Code</th>
                <th width="5%">Name</th>
                <th width="5%">Address</th>
                <th width="5%">Country</th>
                <th width="8%">Email</th>
                <th width="4%">Photo</th>
               <th width="4%">Active</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>

           <?php 
$query="SELECT  * FROM tbl_customer ORDER BY id DESC ";
$customer=$dbcon->select($query);
if ($customer) {
    $i=1;
while ($result=$customer->fetch_assoc()) {
?>  
                <tr>
                <td scope="row">
                    <?php echo $i++; ?>
                </td>

                <td>
                    <?php echo $result['customer_code']; ?>
                </td>
                <td>
                  <?php echo $result['customer_name']; ?>
                    
                  </td>
                <td>
                     <?php echo $result['customer_address']; ?>
                </td>
                <td><?php echo $result['country']; ?></td>
                <td>
                     <?php echo $result['customer_email']; ?>
                </td>

                <td>
            <img src="<?php echo $result['customer_image'];?>" width="50" height="50">
                </td>
                <td>
                    <?php if( $result['status'] == 1) { ?>
                         <li class="text-success" style="list-style: none">
                         <a onclick="return confirm('AreYou Sure To Activated')" href="?statusid=<?php echo $result['id']; ?>">
                           <i class="icon-eye"></i>&nbsp;Active
                         </a>
                     </li>
                    <?php }  
                     else{ ?>
                         <li style="list-style: none;" class="text-danger">
                   <a style="color: red" onclick="return confirm('AreYou Sure To Activated')" href="?Instatusid=<?php echo $result['id']; ?>">
                           <i class="icon-eye"></i>&nbsp;Inactive
                         </a>
                </li>
                        <?php } ?>
                </td>
  
                <td>
                    <a href="edit_customer.php?id=<?php echo $result['id']; ?>">
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
            return 'Details for '+data[2]+' Address '+data[3];
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