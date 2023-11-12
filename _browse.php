<?php error_reporting(E_ERROR | E_PARSE); ?> <!----ปิดแจ้งเตือน error--->

<!----------------------เชื่อมต่อฐานข้อมูล--------------->
<?php include_once('./config/data.php');?>

<!-------------------------header------------>
<?php include_once('header.php');?>
		
		<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>		   
		   
		   <!--------main-content------------->
<?php include_once('browse/main.php');?>		   
		   
			 
			 <!---footer---->
<?php include_once('footer.php');?>			 
			 
			