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


<!-- GRAPH LOAD END -->

<title> STEE | User manager</title>

</head>

<!-- --------------------------------------- BODY STARTS HERE ------------------------------------------------------ -->
<body>

<!-- Smart textiles logo -->
<img src="IMG/Logo.png" width= 200 height=200 style="position:absolute;top:-30px;left:50px" />

<!-- Title of the screen -->
<center><h1>Smart Textiles Ergonomic Evaluation</h1></center>
</br></br></br></br>
<!-- Definition of members of the class tab -->

	<form action="user_interface.php" method="get">
		<input type="submit" value="General view">
	</form>
	
<center>
	<h2> Add user / Delete user </h2>
	<table>
	<tr>
		<td>
		<form action="user_manager_processor_create.php" method="post">
		  User name:<br>
		  <input type="text" name="firstname" value="User">
		  <br><br><br>
		  Glove ID:<br>
		  <input type="text" name="gloveID" value="GloveID">
		  <br><br><br>
		  T-shirt ID:<br>
		  <input type="text" name="tshirtID" value="TshirtID">
		  <br><br><br><br>
		  <input type="submit" value="Add user">
		</form> 
		</td>
		<td>
		<form action="user_manager_processor_delete.php" method="post">
		  User name to delete:<br>
		  <input type="text" name="firstname_delete" value="User">
		  <br><br><br><br>
		  <input type="submit" value="Delete user">
		</form> 
		</td>
	</tr>
	</table>
</center>

<!-- Close the document -->
</body>

<!-- ----------------------------------------- BODY FINISHES HERE ----------------------------------------------- -->
</html>