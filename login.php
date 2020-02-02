<?php
  session_start();
  $email= filter_input(INPUT_POST,'email');
  $pwd1 = filter_input(INPUT_POST,'pwd');
  
 
  $host="localhost";
  $dbUsername="root";
  $dbPassword="";
  $dbname="test";
  
  $conn=mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error()){
		  die ('Connect error('. mysqli_connect_errno().')'.mysqli_connect_error());
	  }
  else{
	  $result = "SELECT id from reg Where email='$email' and pwd1='$pwd1'";
	  $res= mysqli_query($conn,$result);
	  $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
	  $count=mysqli_num_rows($res);
	  if ($count==1){
		  $_SESSION['userid']=$email;
		  header("Location:Park.php");
		 
		  
	  }
	/*  else {
		  echo '<script language="javascript">;
			   function pageRedirect() {
			window.location.replace("Homepage.html");
			}      
			  setTimeout("pageRedirect()", 100);
			  alert("Email or password entered is wrong!");
			  </script>';
			  
	  }*/
	  $conn->close();
	  }
  
?>
