<?php
$string_data = file_get_contents("random.txt");
$data = unserialize($string_data);
$size = sizeof($data);


foreach ($data as &$number){
	$number=0;
}

$string_data = serialize($data);
file_put_contents("random.txt", $string_data);

?>