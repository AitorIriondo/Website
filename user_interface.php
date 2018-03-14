<html>
<head>

<!-- Load all the .css files for the website style from main_css.css -->

<link rel="stylesheet" type="text/css" href="CSS/main_css.css">

<!-- Load JQuery to update elements -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<!--FLOT LIBRARY GRAPH BUILDING LOAD -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->
<script language="javascript" type="text/javascript" src="flotLib/jquery.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.axislabels.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.pie.min.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.threshold.min.js"></script>

<!-- Graph_updater.js includes all the graphs and updates them every 30ms, any other graph should be included in that file to appear in the website -->
<script language="javascript" type="text/javascript" src="JS/graph_updater.js"></script>

<!-- User_updater makes the changes on the website depending on the user that has been selected, also clears the
piecharts when it is needed -->

<script language="javascript" type="text/javascript" src="JS/user_updater.js"></script>



<!-- GRAPH LOAD END -->


<title> STEE | User interface</title>

</head>

<!-- --------------------------------------- BODY STARTS HERE ------------------------------------------------------ -->
<body>

<!-- Smart textiles logo -->
<img src="IMG/Logo.png" width= 200 height=200 style="position:absolute;top:-30px;left:50px" />

<!-- Title of the screen -->
<center><h1>Smart Textiles Ergonomic Evaluation</h1></center>
</br></br></br></br>


	<div id="primary">
			
			  <div class="dropdown">
				<button onclick="myFunction()" class="dropbtn">Search</button>
				  <div id="myDropdown" class="dropdown-content">
					<input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
					<?php 
					$txt_file    = file_get_contents('Users.txt');
					$Users        = explode("\n", $txt_file);
					foreach ($Users as $user){
					
					echo '<a href="#'.$user.'">'.$user.'</a>';
					}
					?>
				  </div>
			  </div>
	<h2>Live Data View:   <p id="selectedName"></p></h2>
		<!-- This takes the user to the user manager -->
		<form action="user_manager.php" method="get">
			<input type="submit" value="User manager">
		</form>
		<form action="user_lab_interface.php" method="get">
			<input type="submit" value="User lab">
		</form>
		<button onclick="cleanFunction()" class="selected_btn">Reset database</button>
		<button class="selected_btn">Export XML</button>

		<center>
			<table>
				<tr>
					<td>Name</td>
					<td>Right arm</td>
					<td>Left arm</td>
					<td>Right arm speed</td>
					<td>Left arm speed</td>
					<td>Trunk</td>
					<td>Wrist</td>
					<td>Wrist speed</td>
					<td>Thumb force</td>
				</tr>
				
					<?php 

					$txt_file    = file_get_contents('Users.txt');
					$Users        = explode("\n", $txt_file);

					for ($i=0;$i<sizeof($Users);$i++) {
					echo "<tr>";
						echo "<td>";
							echo '<form action="user_view.php" method="get">';
								echo '<input type="submit" value="'.$Users[$i].'" name="selectedUser">';
							echo '</form>';
						echo "</td>";
						//echo '<button class="selected_btn" onclick="location.href="http://127.0.0.1:8000/edsa-Presentation/phpinfo.php";">'.$Users[$i].'</button>';
						

						for ($x=0;$x<8;$x++){
						$graph_number = 8*$i + $x;
						echo '<td id="flotcontainer'.$graph_number.'" style="width:150px;height:150px";>';
						echo '</td>';
						}
					
					echo "</br>";
					echo "</tr>";
					}
					
					?>

			</table>
	
		</center>

	</div>


<!-- Close the document -->
</body>

<!-- ----------------------------------------- BODY FINISHES HERE ----------------------------------------------- -->
</html>