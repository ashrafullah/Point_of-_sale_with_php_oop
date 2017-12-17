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
<ol>Dashboard / Categories</ol>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Categories List</h4>
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
$query="DELETE FROM tbl_category WHERE id='$delid'";
 $delid=$dbcon->delete($query);
  if ($delid) {
echo "<span class='btn btn-danger text-center'>Deleted Category Successfully</span>";
       }
       else{
        echo "No Deleted Category";
       }
                    }
?>

</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <span style="float: right; padding: 5px">
        <a href="add_category.php" class="btn btn-info">
        <i class="icon-plus"></i>
            Added Category
        </a>
    </span> 
</div>
<div class="table-responsive">
<table class="table display" id="myTable">
        <thead class="thead-inverse">
            <tr>
                <th width="2%">SL</th>
                <th width="8%">Name</th>
                <th width="8%">Dis</th>
                <th width="8%">Slug</th>
                <th width="15%">Date</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>

           <?php 
$query="SELECT  * FROM tbl_category ORDER BY id DESC ";
$category=$dbcon->select($query);
if ($category) {
    $i=1;
while ($result=$category->fetch_assoc()) {?>
                <tr>
                <td scope="row">
                    <?php echo $i++; ?>
                </td>
                <td>
                    <?php echo $result['c_name']; ?>
                </td>
                <td>
              <?php echo $result['c_dis']; ?> </td>
                <td>
              <?php echo $result['c_slug'];?> 
              </td>
                <td>
              <?php echo date('F d, Y', strtotime($result['c_date']))?>
              </td>
          <?php $user_type= Session::get('user_type');
        if ($user_type =='super_admin') {?>
                <td>
                    <a href="edit_category.php?id=<?php echo $result['id']; ?>">
                        <i class="text-info icon-edit2"></i>
                    </a>
      

       
                    <a href="?delid=<?php echo $result['id']; ?>" onclick="return confirm('Are You Sure To Deleted')">
                        <i class="text-danger icon-remove">
                        </i>
                    </a>
                </td>
                 <?php } ?>

              <?php if($user_type =='admin') { ?>
                <td>
                    <a href="edit_category.php?id=<?php echo $result['id']; ?>">
                        <i class="text-info icon-edit2"></i>
                    </a>
      
                </td>
                <?php } ?>
            </tr>
           
            <?php } }?>
           
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
                columns: [ 0,1,2,3,4],
                stripHtml: false
                }
            },
            'colvis'
        ],
         columnDefs: [ {
            targets: -1,
            visible: true
        } ]
    } );
} );
</script>

  
  </body>
</html>