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
<script language="javascript" type="text/javascript" src="JS/graph_user_updater.js"></script>

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
<!-- Definition of members of the class tab -->




	<!-- Divide the elements in the tab in two columns-->
	<div id="primary">
			
	<h2>Live Data View:   <?php echo $_GET["selectedUser"]; ?> </h2>

		
		<!-- Inside left column, create two more columns 50% and 50%-->
		<form action="user_interface.php" method="get">
			<input type="submit" value="General view">
		</form>
		<button onclick="cleanFunction()" class="selected_btn">Reset database</button>
		<button class="selected_btn">Export XML</button>
		</br></br>
		<center>
			<table>
			
				<?php 
					/*Get the user selected */
					$txt_file    = file_get_contents('Users.txt');
					$Users        = explode("\n", $txt_file); // use r in the handle if you are only reading the file
					$i=0;
					$selectedName = $_GET["selectedUser"];
					$string = str_replace(' ', '-', $selectedName); // Replaces all spaces with hyphens.
					$selectedName = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
					foreach ($Users as $Name){
						$string = str_replace(' ', '-', $Name); // Replaces all spaces with hyphens.
						$text = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
						if ($text == $selectedName){
							$selectedUser=$i;
							$string_data = serialize($selectedUser);
							file_put_contents("Selecteduser.txt", $string_data);
						}
						$i++;
					}
						/*
					for ($i=0;$i<sizeof($Users);$i++){
						$text=(string)$Users[$i];
						$string = str_replace(' ', '-', $text); // Replaces all spaces with hyphens.
						$text = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
						echo $text;
						if ($text == $selectedName){
							echo "Selected";
							$selectedUser=$i-1;
							$string_data = serialize($selectedUser);
							file_put_contents("Selecteduser.txt", $string_data);
						}
					}*/
					
					/*Build the graph table*/
					for ($graph_number=0;$graph_number<8;$graph_number++) {
					echo "<tr>";
						if ($graph_number==0){
							echo '<td>';
							echo '<strong>Left arm position</strong>';
							echo '</td>';
						} elseif ($graph_number==1){
							echo '<td>';
							echo '<strong>Right arm position</strong>';
							echo '</td>';
						} elseif ($graph_number==2){
							echo '<td>';
							echo '<strong>Left arm speed</strong>';
							echo '</td>';
						} elseif ($graph_number==3){
							echo '<td>';
							echo '<strong>Right arm speed</strong>';
							echo '</td>';
						} elseif ($graph_number==4){
							echo '<td>';
							echo '<strong>Trunk position</strong>';
							echo '</td>';
						} elseif ($graph_number==5){
							echo '<td>';
							echo '<strong>Wrist position</strong>';
							echo '</td>';
						} elseif ($graph_number==6){
							echo '<td>';
							echo '<strong>Wrist speed</strong>';
							echo '</td>';
						} elseif ($graph_number==7){
							echo '<td>';
							echo '<strong>Thumb force</strong>';
							echo '</td>';
						} 
						
						echo '<td id="placeholder'.$graph_number.'" class="demo-placeholder" style="width:1100px;height:300px";>';
						echo '</td>';
					
						echo '<td id="flotcontainer'.$graph_number.'" style="width:150px;height:150px;";>';
						echo '</td>';
						
					echo "</tr>";
					}
					
				?>
			
			</table>	
		</center>
			

	</div>


<!-- JavaScript to simulate a click on the first time when loading the website -->
<script>
document.getElementsByClassName('tablinks')[0].click()
</script>

<!-- Close the document -->
</body>

<!-- ----------------------------------------- BODY FINISHES HERE ----------------------------------------------- -->
</html>