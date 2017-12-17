<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "db_pos_lict_batch4_oop"); 
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $output = '';  

$query="SELECT * FROM tbl_employee WHERE  joining_date BETWEEN '$from_date' AND '$to_date'";


      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table">
           <thead class="thead-inverse">  
                <tr>  
                     <th width="1%">SL</th>  
                     <th width="2%">Name</th>  
                     <th width="10%">P Address</th>  
                     <th width="4%">Mobile No</th>  
                  <th width="4%">Joining Date</th>  
                </tr>
            </thead>
      ';  
      if(mysqli_num_rows($result) > 0) 

      {  
        $i=1;
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $i++ .'</td>  
                          <td>'. $row["employee_name"] .'</td>  
  <td>'.$row['present_address'] .'</td>  
      <td>'. $row["mobile_number"] .'</td>  
  <td>'. date('F d, Y', strtotime($row['joining_date'])) .'</td>  
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Item Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>