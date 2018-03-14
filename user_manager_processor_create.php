<html>
<body>

<?php
 $data = file("Users.txt");
 $initialSize= sizeof($data);
$text=PHP_EOL.$_POST["firstname"];
$file = fopen('Users.txt', 'a+');
fwrite($file, $text);
fclose($file);

 $data = file("Users.txt");
 $endSize= sizeof($data);
 
   if ($endSize > $initialSize){
	  echo "The user with the following name and devices has been successfully ADDED:</br>";
	  echo "User name:";
	  echo $_POST["firstname"];
	  echo "</br>";
	  echo "Linked glove ID:";
	  echo $_POST["gloveID"];
	  echo "</br>";
	  echo "Linked t-shirt ID:";
	  echo $_POST["tshirtID"];
  }
  else {
	  echo "An error has ocurred while adding the user. </br>";
	  echo "Please try again";
  }
?>

</body>

<script type="text/javascript">
    window.setTimeout(function() {
        window.location.href='user_manager.php';
    }, 2000);
</script>
</html>