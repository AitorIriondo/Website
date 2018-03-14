<html>
<head>

<!-- Load all the .css files for the website style from main_css.css -->

<link rel="stylesheet" type="text/css" href="CSS/main_css.css">

<!-- Load JQuery to update elements -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<!--FLOT LIBRARY GRAPH BUILDING LOAD -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script language="javascript" type="text/javascript" src="flotLib/jquery.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.axislabels.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.pie.min.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.threshold.min.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.time.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.selection.js"></script>
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.stack.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->

<!-- navigable graph plugin -->
<script language="javascript" type="text/javascript" src="flotLib/jquery.flot.navigate.js"></script>
<script language="javascript" type="text/javascript" src="JS/navigable_graph.js"></script>
<script language="javascript" type="text/javascript" src="JS/histogram_graph.js"></script>
<script language="javascript" type="text/javascript" src="JS/piechart_graph_userLevel.js"></script>
<script language="javascript" type="text/javascript" src="JS/piechart_graph_groupLevel.js"></script>
<script language="javascript" type="text/javascript" src="JS/AJAX_request.js"></script>
<!-- GRAPH LOAD END -->

<title> STEE | User lab</title>

</head>

<!-- --------------------------------------- BODY STARTS HERE ------------------------------------------------------ -->
<body>

<!-- Smart textiles logo -->
<img src="IMG/Logo.png" width= 200 height=200 style="position:absolute;top:-30px;left:50px" />

<!-- Title of the screen -->
<center><h1>Smart Textiles Ergonomic Evaluation</h1></center>
</br></br></br></br>

	
<center>
	<h2>LAB</h2>
</center>	
	<form action="user_interface.php" method="get">
		<input type="submit" value="General view">
	</form>
	
	</br></br></br></br>
<center>
	<table>
	<tr><th colspan="4">
		<h2>FILE MANAGEMENT</h2>
	</th></tr>
	<tr>
		<td>
			<form action="filemanage/upload.php" method="post" enctype="multipart/form-data" >
            Select CSV file to upload
            <input type="file" name="fileToUpload" accept=".csv" >
            <input type="submit" value="Upload File" name="submit">
			</form>
		</td>
		<td colspan="3">
			<h3>Manage your files:</h3>
			<center>
			<table>
			
			<?php
				$directorio = "uploads";
				$gestor_dir = opendir($directorio);
				while (false !== ($nombre_fichero = readdir($gestor_dir))) {
					if (!in_array($nombre_fichero,array(".",".."))){
						$ficheros[] = $nombre_fichero;
					}
				}
				if (isset($ficheros)){
					sort($ficheros);
					foreach ($ficheros as $fichero){
					echo "<tr>";
						echo "<td>";
							echo '<form action="filemanage/upload.php" method="get">';
								echo '<input type="submit" value="'.$fichero.'" name="selectedUser">';
							echo '</form>';
						echo "</td>";
						echo "<td>";
							echo '<form action="filemanage/merge.php" method="get">';
								echo '<button type="submit" class="selected_btn" value="'.$fichero.'" name="deletedFile">Merge</button>';
							echo '</form>';
						echo "</td>";
						echo "<td>";
							echo '<form action="filemanage/delete.php" method="get">';
								echo '<button type="submit" class="selected_btn" value="'.$fichero.'" name="deletedFile" onclick="return confirm()">Delete</button>';
							echo '</form>';
						echo "</td>";
						echo "<td>";
							echo '<a class="selected_btn" href="uploads/'.$fichero.'" download>Download</a>';
							echo "</br></br>";
						echo "</td>";
					echo "</tr>";
				}
				}else{
					echo "Upload some files before analyzing data";
				}

			?>
			</table>
			</center>
		</td>
	</tr>
	<tr><th colspan="4">
		<h2>SESSION INFORMATION</h2>
	</th></tr>
	<tr>
		<td colspan="3">
		<div class="demo-container">
			<div id="placeholder_histogram" class="demo-placeholder" style="width:1100px;height:400px"></div>
		</div>
		</td>
		<td>
		<center>
			<form action="user_view.php" method="get">
				<input type="submit" value="Add new session" name="selectedVariable" style="width:160px"></br></br>
				<input type="submit" value="Delete session" name="selectedVariable" style="width:160px">
			</form>
		</center>
		</td>
	</tr>
	<tr><th colspan="4">
	<strong>GROUP INFORMATION</strong>
	</th></tr>
	<tr>
		<td colspan="4">
		<center>
		<table>
		<?php
				$directory = "uploads";
				$dir_gestor = opendir($directory);
				while (false !== ($file_name = readdir($dir_gestor))) {
					if (!in_array($file_name,array(".",".."))){
						$files[] = $file_name;
					}
				}
				if (isset($files)){
					sort($files);
					$user_number = 0;
					foreach ($files as $user){
						echo "<td>";
							echo '<a href="#userinformation" class="selected_btn" onclick="sendToGraph(2,1,'.$user_number.')">'.$user.'</a></br></br>';
							$user_number++;
							echo '<div class="demo-container">';
								echo'<div id="piechart_'.$user.'" class="demo-placeholder" style="width:200px;height:200px"></div>';
							echo '</div>';
						echo "</td>";
				}
				}else{
					echo "Upload some files before analyzing data";
				}	
				?>
				
				<td>
					<a href="#userinformation" class="selected_btn" onclick="sendToGraph(2,1,0)">Aitor</a></br></br>
					<div class="demo-container">
						<div id="piechart_aitor" class="demo-placeholder" style="width:200px;height:200px"></div>
					</div>
				</td>
				<td>
					<a href="#userinformation" class="selected_btn">Nafise</a></br></br>
					<div class="demo-container">
						<div id="piechart_nafise" class="demo-placeholder" style="width:200px;height:200px"></div>
					</div>
				</td>
				<td>
					<a href="#userinformation" class="selected_btn">Pam</a></br></br>
					<div class="demo-container">
						<div id="piechart_pam" class="demo-placeholder" style="width:200px;height:200px"></div>
					</div>
				</td>
				<td>
					<a href="#userinformation" class="selected_btn">Dan</a></br></br>
					<div class="demo-container">
						<div id="piechart_dan" class="demo-placeholder" style="width:200px;height:200px"></div>
					</div>
				</td>
				<td>
					<a href="#userinformation" class="selected_btn">User</a></br></br>
					<div class="demo-container">
						<div id="piechart_user" class="demo-placeholder" style="width:200px;height:200px"></div>
					</div>
				</td>
			
		</table>
		</center>	
		</td>
	</tr>
	<tr><th colspan="4">
		<h2><a name="userinformation">USER INFORMATION</h2>
	</th></tr>
	<tr>
		<td><table>
			<tr>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,6,0)">Right arm</a></br></br>
					<div class="demo-container">
						<div id="piechart_rightArm" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,3,0)">Left arm</a></br></br>
					<div class="demo-container">
						<div id="piechart_leftArm" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,4,0)">Right arm speed</a></br></br>
					<div class="demo-container">
						<div id="piechart_rightArmSpeed" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,7,0)">Left arm speed</a></br></br>
					<div class="demo-container">
						<div id="piechart_leftArmSpeed" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,9,0)">Trunk</a></br></br>
					<div class="demo-container">
						<div id="piechart_trunk" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,11,0)">Right wrist</a></br></br>
					<div class="demo-container">
						<div id="piechart_rightWrist" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px"  onclick="sendToGraph(1,17,0)">Left wrist</a></br></br>
					<div class="demo-container">
						<div id="piechart_leftWrist" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,13,0)">Right wrist speed</a></br></br>
					<div class="demo-container">
						<div id="piechart_rightWristSpeed" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,19,0)">Left wrist speed</a></br></br>
					<div class="demo-container">
						<div id="piechart_leftWristSpeed" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,15,0)">Right thumb force</a></br></br>
					<div class="demo-container">
						<div id="piechart_rightThumbForce" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
				<td>
					<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(1,21,0)">Left thumb force</a></br></br>
					<div class="demo-container">
						<div id="piechart_leftThumbForce" class="demo-placeholder" style="width:150px;height:150px"></div>
					</div>
				</td>
			</tr>
		</table></td>
		<td colspan="2">
		<center>
			<a href="#bodyparts" class="selected_btn" style="width:160px" onclick="sendToGraph(5,10,0)">Total Score</a></br></br>
			<div class="demo-container">
				<div id="piechart_totalEvaluation" class="demo-placeholder" style="width:300px;height:300px"></div>
			</div>
		</center>
		</td>
		<td>
			<div align="left">
			<svg width="20" height="20">
			  <rect width="20" height="20" style="fill:rgb(255,0,0)" />
			</svg>
			Incorrect posture
			</br>
			<svg width="20" height="20">
			  <rect width="20" height="20" style="fill:rgb(255,255,0)" />
			</svg>
			Medium posture
			</br>
			<svg width="20" height="20">
			  <rect width="20" height="20" style="fill:rgb(0,255,0)" />
			</svg>
			Good posture
			</br>
			<svg width="20" height="20">
			  <rect width="20" height="20" style="fill:rgb(139,0,139)" />
			</svg>
			Lost data
			</div>
		</td>
	</tr>
	<tr><th colspan="4">
		<div class="section">
			<h2><a name="bodyparts">BODYPARTS EXPOSURE INFORMATION</a></h2>
		</div>
	</th></tr>
	<tr>
		<td>
			<div class="demo-container">
			<div id="placeholder" class="demo-placeholder" style="width:900px;height:400px";></div>
			</div>
			<p class="message"></p></br></br>
			<div class="demo-container">
			<div id="overview" class="demo-placeholder" style="width:900px;height:150px";></div>
			</div>
		</td>
		<td>
				<button class="selected_btn" value="Right arm" name="selectedVariable" style="width:160px" onclick="sendToGraph(1,6)">Right arm</button></br></br>
				<button class="selected_btn" value="Left arm" name="selectedVariable" style="width:160px" onclick="sendToGraph(1,3)">Left arm</button></br></br>
				<button class="selected_btn" value="Right arm speed" name="selectedVarible" style="width:160px" onclick="sendToGraph(1,4)">Right arm speed</button></br></br>
				<button class="selected_btn" value="Left arm speed" name="selectedVariable" style="width:160px" onclick="sendToGraph(1,7)">Left arm speed</button></br></br>
				<button class="selected_btn" value="Trunk" name="selectedVariable" style="width:160px" onclick="sendToGraph(1,9)">Trunk</button></br></br>
				<button class="selected_btn" value="Right wrist" name="selectedVariable" style="width:160px" onclick="sendToGraph(1,11)">Right Wrist</button></br></br>
				<button class="selected_btn" value="Left wrist" name="selectedVariable" style="width:160px" onclick="sendToGraph(1,17)">Left Wrist</button></br></br>
				<button class="selected_btn" value="Right wrist speed" name="selectedVariable" style="width:160px" onclick="sendToGraph(1,13)">Right Wrist speed</button></br></br>
				<button class="selected_btn" value="Left wrist speed" name="selectedVariable" style="width:160px" onclick="sendToGraph(1,19)">Left Wrist speed</button></br></br>
				<button class="selected_btn" value="Right thumb force" name="selectedVarible" style="width:160px" onclick="sendToGraph(1,15)">Right Thumb force</button></br></br>
				<button class="selected_btn" value="Left thumb force" name="selectedVarible" style="width:160px" onclick="sendToGraph(1,21)">Left Thumb force</button></br></br>
		</td>
		<td>
			<form action="user_view.php" method="get">
				<input type="submit" value="Total score" name="selectedVarible"></br></br>
			</form>
		</td>
		<td>
			<label class="container">Angle
			  <input type="radio" checked="checked" name="radio">
			  <span class="checkmark"></span>
			</label>
			<label class="container">Score
			  <input type="radio" name="radio">
			  <span class="checkmark"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td colspan="1">
		<button onclick="printElement()" class="selected_btn">Export PDF</button>
		</td>
		<td colspan="2">
			Select the information that you want to include in the PDF:</br></br>
			<label class="container">Session histogram
			  <input type="radio" checked="checked" name="radio">
			  <span class="checkmark"></span>
			</label>
			<label class="container">Group pie charts
			  <input type="radio" name="radio">
			  <span class="checkmark"></span>
			</label>
			<label class="container">User pie charts
			  <input type="radio" name="radio">
			  <span class="checkmark"></span>
			</label>
			<label class="container">Exposure line chart
			  <input type="radio" name="radio">
			  <span class="checkmark"></span>
			</label>
		</td>
		<td colspan="1">
			Select the format of the PDF you want to create:</br></br>
			<label class="container">Black & White
			  <input type="radio" checked="checked" name="radio">
			  <span class="checkmark"></span>
			</label>
			<label class="container">Colour
			  <input type="radio" checked="checked" name="radio">
			  <span class="checkmark"></span>
			</label>
		</td>
	</table>
</center>
<script>
function printElement() {
    window.print();
}
</script>

<!-- Close the document -->
</body>

<!-- ----------------------------------------- BODY FINISHES HERE ----------------------------------------------- -->
</html>