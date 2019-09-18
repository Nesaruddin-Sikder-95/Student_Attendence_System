<?php
  function late_calculation(){
	        if(date("a")=="pm")
			{
				
				if(date("h")<12)
				{
				 $late_h=date('h')+2;
				 $late_m=date('i');
				}
				else
				{
				
					$late_h=date('h')-10;
				    $late_m=date('i');
				}
			//echo $total_late=$late_h*60+$late_m; 
			return $total_late=$late_h*60+$late_m; 
			}
			else if(date("a")=="am")
			{
				
				 if(date("h")>=10)
				 {
				
				$late_h=date("h")-10;
				$late_m=date('i');
			 // echo  $total_late=$late_h*60+$late_m;
				return $total_late=$late_h*60+$late_m;
				 }
				 else
				 
				 return 0;
			}    
			
	      
		}


function insert($user_name,$user_id,$late,$db){
	
	         
			 //if employee log in for the first time today;
			 
			 function first_insert($user_name,$user_id,$late,$db){
				 
			 $current_time=date("h:i:sa");
	         $current_date=date("d:m:y");		
			 $status=1;
			 $sql="UPDATE `admin_employee` SET `log_in`='$current_time',`late`='$late',`status`='$status'
			 where `date`='$current_date' and `username`='$user_id';
			 "; 
			 mysqli_query($db,$sql);
				  }
				  
			//if employee log in for next time today
			  function check_log_in_status($db,$user_id){
				  
				  $current_date=date("d:m:y");
				  $status=1;
				  $sql="SELECT status FROM `admin_employee` WHERE status='1' and `date`='$current_date' and `username`='$user_id' ";
				  $result=mysqli_query($db,$sql);
				  $row=mysqli_num_rows($result);
				  return $row;
				  }
				$check_status=check_log_in_status($db,$user_id);
				
				if($check_status==0)
				{
				   first_insert($user_name,$user_id,$late,$db); 	
				}
				else {
				  	
					  
					}		
			}

function if_once_log_in($user_id,$db){
	 $current_day=date("d");
	 $current_month=date("m");
	 $current_year=date("y");
	 $sqli="SELECT * FROM `attendance` where username='$user_id' and day='$current_day' and month='$current_month' and year='$current_year'";
	 $result=mysqli_query($db,$sqli);
	 $row=mysqli_num_rows($result);
	 return $row;
	 
	 
	}
	
//show employee attendace in attendance sheet
 function show_employee($user_id,$db){
	 $sql="SELECT * FROM `admin_employee` WHERE `username`='$user_id' ORDER BY date DESC ";
	 $result=mysqli_query($db,$sql);
	 while($rows=mysqli_fetch_assoc($result))
	 {
		  echo 
		    '
	    <tr>
         <td>'.$rows['date'].'</td>
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
				  <td>Present</td>
			   ';
				
				}
		 
		echo '
		 
		</tr>';
	 }
	 
	 
	 }
function setlog_out_time($db,$user_id){
	 $current_time=date("h:i:sa");
	 $current_date=date("d:m:y");
	 $sql="UPDATE `admin_employee` SET `log_out`='$current_time' WHERE `username`='$user_id' and `date`='$current_date' ";
	 mysqli_query($db,$sql);
	
	
	}
	
//tatal attendance calculation
function attendance_result($db,$user_id){
	$work_day=0;
	$present=0;
	$absent=0;
	$late=0;
	$sql="select * from admin_employee where `username`='$user_id' ";
	$result=mysqli_query($db,$sql);
	while($row=mysqli_fetch_assoc($result))
	{
		$work_day=$work_day+1;
	    if($row['status']==1)
		{
		   $present=$present+1;	
			
		}	
		else {
			  $absent=$absent+1;
			}
	 $late=$late+$row['late'];
	}
	echo '
  <tr>
    <th>Total Working days : '.$work_day.'</th>
    <th>Present : '.$present.'</th>
    <th>Absent : '.$absent.'</th>
    <th>Late : '.$late.' Minutes</th>
  </tr>
	';
	
	}
?>