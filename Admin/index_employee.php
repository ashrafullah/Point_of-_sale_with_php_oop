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
<ol>Dashboard / Human Resource</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Employee List</h4>
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
$query="DELETE FROM tbl_employee WHERE id='$delid'";
 $delid=$dbcon->delete($query);
  if ($delid) {
echo "<span class='btn btn-danger text-center'>Deleted Employeer</span>";
       }
       else{
        echo "No Deleted Employee";
       }
                    }
?>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <span style="float: right; padding: 5px">
        <a href="add_employee.php" class="btn btn-info">
        <i class="icon-plus"></i>
            Added Employee
        </a>
    </span>
 
</div>
<div class="table-responsive">
<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="2%">SL</th>
                <th width="4%">Joining Date</th>
                <th width="4%">E Name</th>
                <th width="4%">Email</th>
                <th width="5%">Present Address</th>
                <th width="5%">Parmanent Address</th>
                <th width="5%">Father Name</th>
                <th width="5%">Mother Name</th>
                <th width="4%">Mobile No</th>
                <th width="4%">Designation</th>
                <th width="4%">Department</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>

           <?php 
$query="SELECT  * FROM tbl_employee ORDER BY id DESC ";
$employee=$dbcon->select($query);
if ($employee) {
    $i=1;
while ($result=$employee->fetch_assoc()) {?>
                <tr>
                <td scope="row">
                    <?php echo $i++; ?>
                </td>
                <td>
                    <?php echo date('F d, Y', strtotime($result['joining_date']))?>
                </td>
                <td>
                    <?php echo $result['employee_name']; ?>
                </td>
                <td>
                    <?php echo $result['email']; ?>
                </td>
                <td><?php echo $result['present_address']; ?></td>
              <td><?php echo $result['parmanent_address']; ?></td>
              <td><?php echo $result['father_name']; ?></td>
              <td><?php echo $result['mother_name']; ?></td>
              <td><?php echo $result['mobile_number'];?></td>
              <td><?php echo $result['designation'];?></td>
              <td><?php echo $result['department'];?></td>

                <td>
                    <a href="edit_employee.php?id=<?php echo $result['id']; ?>">
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
            return 'Details for Employee '+data[2]+' Email '+data[3];
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