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
<ol>Dashboard / User List</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total User List</h4>
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
$query="DELETE FROM users WHERE id='$delid'";
 $delid=$dbcon->delete($query);
  if ($delid) {
echo "<span class='btn btn-danger text-center'>Deleted User</span>";
       }
       else{
        echo "No User Employee";
       }
                    }
?>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <span style="float: right; padding: 5px">
        <a href="add_user.php" class="btn btn-info">
        <i class="icon-plus"></i>
            Added User
        </a>
    </span> 
</div>
<div class="table-responsive">
<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="2%">SL</th>
                <th width="4%">Name</th>
                <th width="4%">Email</th>
                <th width="3%">Mobile</th>
                <th width="3%">Address</th>
                <th width="4%">Role</th>
                <th width="4%">Image</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>

           <?php 
$query="SELECT  * FROM users order by id desc ";
$user=$dbcon->select($query);
if ($user) {
    $i=1;
while ($result=$user->fetch_assoc()) {?>
                <tr>
                <td scope="row">
                    <?php echo $i++; ?>
                </td>
                <td>
                    <?php echo $result['name']; ?>
                </td>
                <td>
                    <?php echo $result['email']; ?>
                </td>
                <td>
              <?php echo $result['cell'];?> 
              </td>
                <td>
              <?php echo $result['address'];?> 
              </td>
               <td>
                 <?php echo $result['user_type'];?>
              </td>
               <td>
                <?php 
                  if ($result['image'] == 'image') {?>
                <img src=" <?php echo $result['image'];?>" width="50" height="50">
                 <?php } else{?>
                  <i class="icon-user"></i>
                 <?php }?>

              </td>
           
                <td>
                    <a href="edit_user.php?id=<?php echo $result['id']; ?>">
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
            return 'Details for User '+data[1]+' Address '+data[4];
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