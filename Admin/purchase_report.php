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
   <div id="date_search">
    <p style="color: red"> * You Can Search  With Date Filter</p>
<span>Search From:&nbsp; <input type="text" name="from_date" id="from_date"  placeholder="Enter Date"></span>
To <span> <input type="text" name="to_date" id="to_date" placeholder="Enter Date"> </span>

<button class="btn btn-sm btn-primary" id="filter">
  <i class="icon-search"></i>
  Search
</button>
<a class="btn-sm btn-success" href="purchase_report.php">
  <i class="icon-plus"></i>
Show All Result
</a> 
  </div><!-- end data_search div -->
</div>
<br>
<div class="table-responsive">
  <div id="order_table">
    <table class="table display" id="myTable">
        <thead class="thead-inverse">
            <tr>
                <th width="1%">S</th>

                <th width="2%">No</th>
                <th width="10%">Purchase Date</th>
                <th width="4%">Supplier</th>
               <th width="4%">T Qty</th>
               <th width="4%">T Amount</th>
            </tr>
        </thead>
        <tbody>

           <?php 


$query="SELECT  tbl_purchase.*,tbl_suppliers.id,tbl_suppliers.supplier_name FROM tbl_purchase LEFT JOIN tbl_suppliers ON tbl_purchase.supplier_id=tbl_suppliers.id ORDER BY tbl_purchase.id DESC ";
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
                <td><?php echo $result['supplier_name']; ?></td>
                <td><?php echo $result['purchase_qty']; ?></td>
                <td>
                  <?php
  $tsell  =  $result['purchase_qty'] * $result['purchase_price_unit'];
                 echo $tsell; ?>
                   
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
</div>

<?php include('includes/footer.php') ?>
<?php include('includes/script_js.php'); ?>
<!-- datatable -->
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/responsive.foundation.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>

<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>

<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>

<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">

<script>
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                download: 'open'
            },
            {
                extend: 'print',
                exportOptions: {
                columns: [ 0,1,2,3,4,5]
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
<!-- date Search -->
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>  
  $(document).ready(function()
  {  
       $.datepicker.setDefaults({  
            dateFormat: 'yy-mm-dd'   
       }); 
        
       $(function()
       {  
            $("#from_date").datepicker();  
            $("#to_date").datepicker();  
       });  
       $('#filter').click(function()
       {  
            var from_date = $('#from_date').val();  
            var to_date = $('#to_date').val();  
            if(from_date != '' && to_date != '')  
            {  
                 $.ajax({  
                      url:"Ajax_filter_search/purchase_report.php",  
                      method:"POST",  
                      data:{from_date:from_date, to_date:to_date},  
                      success:function(data) //response  
                      {  
                          $('#order_table').html(data);  
                      }  
                 });  
            }  
            else  
            {  
                 alert("Please Select Date");  
            }  
       });  
  });  
 </script>
  
  </body>
</html>