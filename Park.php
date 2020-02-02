<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
		<style>
			body{
				background-image: url('background1.jpg');
				background-size: cover;
			}
			ul{
				list-style-type:none;
			}
			th{
				font-size: 20px;
			}
			a:link, a:visited{
				text-decoration:none;
				color:green;
			}
			a:hover{
				background-color:white;
				color:rgb(54, 135, 207);
			}
			th{
				padding: 5px 100px;
			}
			.prof{
				padding: 10px;	
			}
			fieldset { 
               margin-left: 30%;
               margin-right: 30%;
			   padding-left:7%;
               border: 3px gray groove;
               }
		</style>
	</head>
	<body>
		<div class='fixedElement'>
		<div class='profiles' align='right'>
				<table>
					<tr>
						<td class='prof'><img src='usericon.png'/><br> 
						<?php
						  session_start();
						  echo $_SESSION['userid'];
						?></td>
					</tr>
				</table>
			</div>
			<table>
			<tr>
			<td><a href='Homepage.html'><img src="logo.png" width="100px" height="100px"/></a></td>
			<td width="65%"></td>
			<td><font face='Bookman Old Style' size='6'><b>Car parking</b></font></td>
			</tr>
			</table>
			<br>
			<hr size="5" noshade color="maroon"><br><br>
			<table>
			<tr>
			<td><font face='Bookman Old Style' size='4'><b>Parking lot available: </b></font>
			<?php
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$db = "test";
				$dbconnect=mysqli_connect($hostname,$username,$password,$db);
				if (mysqli_connect_error()){
					die ('Connect error('. mysqli_connect_errno().')'.mysqli_connect_error());
				}
				$query="SELECT open from parklot";
				$res=mysqli_query($dbconnect,$query) or die('error getting data');
				 while ($row= mysqli_fetch_array($res, MYSQLI_ASSOC)){
					 echo $row['open'];
				 }
				 echo "<br><br><font face='Bookman Old Style' size='4'><b>Parking lot booked: </b></font>" ;
				$query="SELECT book from parklot";
				$res=mysqli_query($dbconnect,$query) or die('error getting data');
				 while ($row= mysqli_fetch_array($res, MYSQLI_ASSOC)){
					 echo $row['book'];
				 }
				 $query="SELECT open,book from parklot";
				$res=mysqli_query($dbconnect,$query) or die('error getting data');
				 while ($row= mysqli_fetch_array($res, MYSQLI_ASSOC)){
					$x=$row['open'];
					$y=$row['book'];
				 }
				 
			echo "<b><br><br>For booking <a href='Book.php'>click here</a></b><br>";
			?></td><td width="40%"></td>
			<td><div id='piechart'></div>

				<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>

				<script type='text/javascript'>

				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);
				var q = parseFloat(<?php echo $x; ?>);
				var w = parseFloat(<?php echo $y; ?>);
				function drawChart() {
					var data = google.visualization.arrayToDataTable([
						['Parking slots', 'Availability'],
						['Available', q],
						['Booked', w],
					]);

  var options = {'title':'Parking slots', 'width':550, 'height':350};

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
	</td>
	</tr>
	</table>
	</body>
</html>