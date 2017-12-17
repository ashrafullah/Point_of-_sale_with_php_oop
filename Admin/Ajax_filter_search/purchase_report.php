<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "db_pos_lict_batch4_oop"); 
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $output = '';  
      // $query = "  
      //   SELECT * FROM tbl_purchase  
      //   WHERE p_date BETWEEN '$from_date' AND '$to_date'  
      // "; 

  $query="SELECT  tbl_purchase.*,tbl_suppliers.supplier_name,tbl_product.product_name,tbl_product.product_image
 FROM 
 tbl_purchase
  LEFT JOIN tbl_suppliers ON tbl_purchase.supplier_id=tbl_suppliers.id 
  LEFT JOIN tbl_product ON tbl_purchase.product_id=tbl_product.id 

  WHERE p_date BETWEEN '$from_date' AND '$to_date'

  ";



      $result = mysqli_query($connect, $query);  
      $output .= ' 
      <div id="order_table"> 
           <table class="table display" id="myTable">
           <thead class="thead-inverse">  
                <tr>  
                     <th width="1%">S</th>  
                     <th width="2%">No</th>  
                     <th width="10%">Date</th>  
                     <th width="4%">Supplier</th>  
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
                          <td>'. $row["purchase_no"] .'</td>  
  <td>'.date('F d, Y', strtotime($row['p_date'])) .'</td>  
                          <td>$ '. $row["supplier_name"] .'</td>  
                          <td>'. $row["purchase_qty"] .'</td>  
                          <td>'. $row["purchase_qty"] .'</td>  
                     </tr>
                     </tbody>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '
                <tbody>   
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>
                </tbody>  
           ';  
      }  
      $output .= '</table>'.'</div>';
      echo $output;  
 }  
 ?>