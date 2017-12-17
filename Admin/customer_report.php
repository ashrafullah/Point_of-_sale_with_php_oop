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
</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
  <div id="date_search">
    <p style="color: red"> * You Can Search  With Date Filter</p>
<span>Search From:&nbsp; <input type="text" name="from_date" id="from_date"></span>
To <span> <input type="text" name="to_date" id="to_date"> </span>
<input type="button" class="btn-sm btn-primary" name="filter" value="Search" id="filter"> 
  </div>
</div>
<div class="table-responsive">
  <div id="order_table">
    <table class="table">
        <thead class="thead-inverse">
            <tr>
                <th width="2%">SL</th>
                <th width="4%">Code</th>
                <th width="5%">Name</th>
                <th width="4%">Photo</th>
               <th width="4%">Active</th>
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
                <td><?php echo $result['customer_name']; ?></td>
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
                      url:"Ajax_filter_search/filter.php",  
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