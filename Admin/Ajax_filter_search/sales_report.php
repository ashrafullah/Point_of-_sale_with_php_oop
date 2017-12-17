<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "db_pos_lict_batch4_oop"); 
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $output = '';  

$query="SELECT  tbl_sales.*,tbl_customer.customer_name,tbl_product.product_name
 FROM 
 tbl_sales
  LEFT JOIN tbl_customer ON tbl_sales.customer_id=tbl_customer.id 
  LEFT JOIN tbl_product ON tbl_sales.product_id=tbl_product.id 

   WHERE sale_date BETWEEN '$from_date' AND '$to_date'";


      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table display" id="myTable">
           <thead class="thead-inverse">  
                <tr>  
                     <th width="1%">S</th>  
                     <th width="2%">No</th>  
                     <th width="10%">Date</th>  
                     <th width="4%">Customer</th>  
                     <th width="4%">T Q</th>  
                     <th width="4%">T Amount</th>  
                </tr>
            </thead>
      ';  
      if(mysqli_num_rows($result) > 0) 

      {  
        $i=1;
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                <tbody>
                     <tr>  
                          <td>'. $i++ .'</td>  
                          <td>'. $row["sale_no"] .'</td>  
  <td>'.date('F d, Y', strtotime($row['sale_date'])) .'</td>  
                          <td>$ '. $row["customer_name"] .'</td>  
                          <td>'. $row["sale_qty"] .'</td>  
                          <td>'. $row["sale_qty"] .'</td>  
                     </tr>
                </tbody>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Sales Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>