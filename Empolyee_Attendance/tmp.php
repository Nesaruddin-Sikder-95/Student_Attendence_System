<?php
date_default_timezone_set("Asia/Dhaka");
echo  late_calculation();
   
		
		
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
?>