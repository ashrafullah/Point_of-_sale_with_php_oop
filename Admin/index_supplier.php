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
<ol>Dashboard / Supplier</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Supplier List</h4>
<a class="heading-elements-toggle">
    <i class="icon-ellipsis font-medium-3"></i></a>
<br/>
<?php if (isset($_GET['Message'])) { ?>
      <h3 class="btn btn-success text-center"><?php echo 'Your Data updated Successfully';?></h3>
      <?php unset($_GET['Message']); ?>
<?php } ?>

 <?php 
if (isset($_GET['delid'])) {
$delid=$_GET['delid'];
$query="DELETE FROM tbl_suppliers WHERE id='$delid'";
 $delid=$dbcon->delete($query);
  if ($delid) {
echo "<span class='btn btn-success text-center'>Deleted Supplier</span>";
       }
       else{
        echo "No Deleted Supplier";
       }
                    }
?>
 <?php 
if (isset($_GET['statusid'])) {
$statusid=$_GET['statusid'];
$query="UPDATE tbl_suppliers SET supplier_status=0 WHERE id = '$statusid'";
 $statusid=$dbcon->update($query);
  if ($statusid) {
echo "<span class='btn btn-danger text-center'
>Supplier Deactivated Successfully</span>";
       }
       else{
        echo "No Updated Supplier Activated";
       }
  }
if (isset($_GET['Instatusid'])) {
$Instatusid=$_GET['Instatusid'];
$query="UPDATE tbl_suppliers SET supplier_status=1 WHERE id = '$Instatusid'";
 $Instatusid=$dbcon->update($query);
  if ($Instatusid) {
echo "<span class='btn btn-success text-center'
>Supplier Activated Successfully</span>";
       }
       else{
        echo "No Supplier Deactivated";
       }
                    }
?>
</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <span style="float: right; padding: 5px">
        <a href="add_supplier.php" class="btn btn-info">
        <i class="icon-plus"></i>
            Added Supplier
        </a>
    </span>
</div>

<div class="table-responsive">
<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="2%">SL</th>
                <th width="4%">Code</th>
                <th width="5%">Company</th>
                <th width="4%">Address</th>
                <th width="4%">Contact Person</th>
                <th width="4%">Mobile</th>
               <th width="4%">Active</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>

           <?php 
$query="SELECT  * FROM tbl_suppliers ORDER BY id DESC ";
$Supplier=$dbcon->select($query);
if ($Supplier) {
    $i=1;
while ($result=$Supplier->fetch_assoc()) {?>
                <tr>
                <td scope="row">
                    <?php echo $i++; ?>
                </td>
                <td>
                    <?php echo $result['supplier_code']; ?>
                </td>
                <td><?php echo $result['supplier_name']; ?></td>
                <td>
                    <?php echo $result['supplier_address']; ?>
                </td>
                <td>
                    <?php echo $result['supplier_contact_person']; ?>
                </td>
                <td>
                    <?php echo $result['supplier_phone']; ?>
                </td>
                <td>
                    <?php if( $result['supplier_status'] == 1) { ?>
                         <li class="text-success" style="list-style: none">
                         <a onclick="return confirm('AreYou Sure To Deactivated')" href="?statusid=<?php echo $result['id']; ?>">
                           <i class="icon-eye"></i>&nbsp;Active
                         </a>
                     </li>
                    <?php }  
                     else{ ?>
                         <li class="text-danger"  style="list-style: none">
                    <a style="color: red" onclick="return confirm('AreYou Sure To Activated')" href="?Instatusid=<?php echo $result['id']; ?>">
                           <i class="icon-eye"></i>&nbsp;Inactive
                         </a>
                  </li>
                        <?php } ?>
                </td>

                <td>
                    <a href="edit_supplier.php?id=<?php echo $result['id']; ?>">
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
                columns: [ 0,1,2,3,4,5],
                stripHtml: false
                }
            },
            {
                extend: 'print',
                exportOptions: {
                columns: [ 0,1,2,3,4,5],
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
            return 'Details for Company '+data[2]+' Cell Number '+data[5];
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