<html>
<body>

<?php


 $DELETE = $_POST["firstname_delete"];

 $data = file("Users.txt");
 $initialSize= sizeof($data);
 $out = array();

 foreach($data as $line) {
     if(trim($line) != $DELETE) {
         $out[] = $line;
     }
 }
 unlink("Users.txt");
 $file = fopen("Users.txt", "a+");
 for ($i=0; $i<sizeof($out); $i++){
	 $text=$out[$i];
	 $string = str_replace(' ', '-', $text); // Replaces all spaces with hyphens.
	 $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	 if ($i < (sizeof($out)-1)){
		$text = $text."\n";
	 }
	 fwrite($file, $text);
 }
  fclose($file); 
  $endSize = sizeof($out);
  if ($endSize < $initialSize){
	  echo "The user with the following name has been successfully DELETED:</br>";
	  echo $_POST["firstname_delete"];
  }
  else {
	  echo "An error has ocurred while deleting the user. </br>";
	  echo "Please check that the user you want to delete exists.";
  }

?>

</body>

<script type="text/javascript">
    window.setTimeout(function() {
        window.location.href='user_manager.php';
    }, 2000);
</script>
</html>