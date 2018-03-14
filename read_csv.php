
<?php
$bodyPart = $_GET["bodyPart"];
$filename = "Pam.csv";
$path = "uploads";
$csvFile = $path . DIRECTORY_SEPARATOR . $filename;

//Create an array map while reading .csv
$csv = array_map('str_getcsv', file($csvFile));
array_walk($csv, function(&$a) use ($csv) {
	$a = array_combine($csv[0], $a);
});



//Clean the related names for each value
for ($row = 0; $row < sizeof($csv); $row++){
	foreach ($csv[$row] as $name => $value){
		$cleancsv[$row][]=$value;
	}	
}

//Transpose the matrix to have a row for each value
 $retData = array();
    foreach ($cleancsv as $row => $columns) {
      foreach ($columns as $row2 => $column2) {
          $retData[$row2][$row] = $column2;
      }
    }

//Pass the transposed matrix
$cleancsv = $retData;

/*
echo '<pre>';
print_r($cleancsv);
echo '</pre>';
*/

//String the elements (necessary for JSON encode it
foreach ($cleancsv as $dataElement2){
	foreach ($dataElement2 as $dataElement){
		$dataElement=(string)$dataElement;
	}
}

// JSON code the data to pass it to the AJAX_request.js 
$dataArray=[];

//Limit the i iterations to select which information will be JSON encoded
for ($i=0;$i<(count($cleancsv));$i++){
	$dataArray[$i]=$cleancsv[$i];
}

//Select the data that is going to be sent to the graph. Always: time, workcycle, bodypart
$dataToSend=[];
$dataToSend[0]=$dataArray[0]; //time
$dataToSend[1]=$dataArray[1]; //workcycle

//if data is not set for that bodypart, just build a graph with all red values
if (!isset($dataArray[$bodyPart])){
	for ($i=0; $i<sizeof($dataArray[0]);$i++)
		$dataToSend[2][$i]=0;
}
else{
	$dataToSend[2]=$dataArray[$bodyPart];  //bodypart
}
//JSON encode the information after string it, to send it to javascript
$myJSON= json_encode($dataToSend);
print $myJSON;

?>