<?php
//search to days date if exits
function todays_date($db){
	  $current_date=date("d:m:y");
	  $sql="select date from admin_employee where date='$current_date' ";
	  $result=mysqli_query($db,$sql);
	  $row=mysqli_num_rows($result);
	  return $row;
}

//if  not exits then insert new date with all employee
  function insert($db){
	  
	  $current_date=date("d:m:y");
	  $e_sql="select name,username from e_login";
	  $e_result=mysqli_query($db,$e_sql);
	  while($e_rows=mysqli_fetch_assoc($e_result))
	  {
		  
		  $e_name=$e_rows['name'];
		  $e_id=$e_rows['username'];
		  $status=0;
		  $e_sql_nested="INSERT INTO `admin_employee`(`name`,`username`, `date`, `status`) VALUES 
		  ('$e_name','$e_id','$current_date','$status')";
		  $result=mysqli_query($db,$e_sql_nested);
		  
	  }
	  mysqli_close($db);
	  
}
//show employee history at table
  function show_employee($db){
	  $sql="SELECT * FROM `admin_employee` ORDER BY date DESC";
	  $result=mysqli_query($db,$sql);
	  while($rows=mysqli_fetch_assoc($result))
	  {
		  echo 
		    '
	    <tr>
         <td>'.$rows['date'].'</td>
         <td>'.$rows['name'].'</td>
         <td>'.$rows['username'].'</td>
		 ' ;
		   
		   if($rows['status']==0)
		   {
			   echo '
			      <td>--</td>
                  <td>--</td>
                  <td>--</td>
				  <td>Absent</td>
			   ';
			
			}
			else{
				echo '
				 <td>'.$rows['log_in'].'</td>
                 <td>'.$rows['log_out'].'</td>
                 <td>'.$rows['late'].'</td>
				 <td>Present</td>';
				}
		 
		echo '
		 
		</tr>';
      
	  }
	  
	  
}
?>