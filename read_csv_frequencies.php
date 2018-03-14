
<?php
$bodyPart = $_GET["bodyPart"];
$user = $_GET["user"];
// Each t-shirt has 9 columns, and each glove 6 columns + always 1 column of time
				
// Case1 = Only t-shirt -> 10 columns
// Case2 = Only one glove -> 7 columns
// Case3 = t-shirt + glove -> 16 columns
// Case4 = t-shirt + glove + glove -> 22 columns
// Case5 = glove + glove -> 13 columns


//Check if we are getting the total pie chart or a bodypart
if ($bodyPart != "All"){
	$csv = readCsv($user);
	frequencyBodypart($csv, $bodyPart, 0);
}
elseif ($bodyPart == "All"){
	frequencyTotal();
}

/*-----------------------------------------------------------------*/

//Function for each body part

function frequencyBodypart($dataArray, $bodyPart, $All){ //All defines if we are calculating the total piechart or not and avoids to print other results
	

	$errorBodypart=0;
	
	//Translate bodypart to words

	if ($bodyPart == 6){
		$bodyPartName = "Right arm";
	}
	elseif ($bodyPart == 3){
		$bodyPartName = "Left arm";
	}
	elseif ($bodyPart == 4){
		$bodyPartName = "Right arm speed";
	}
	elseif ($bodyPart == 7){
		$bodyPartName = "Left arm speed";
	}
	elseif ($bodyPart == 9){
		$bodyPartName = "Trunk";
	}
	elseif ($bodyPart == 11){
		$bodyPartName = "Right wrist";
	}
	elseif ($bodyPart == 13){
		$bodyPartName = "Right wrist speed";
	}
	elseif ($bodyPart == 15){
		$bodyPartName = "Right thumb force";
	}
	elseif ($bodyPart == 17){
		$bodyPartName = "Left wrist";
	}
	elseif ($bodyPart == 19){
		$bodyPartName = "Left wrist speed";
	}
	elseif ($bodyPart == 21){
		$bodyPartName = "Left thumb force";
	}
	else {
		//If the body part does not correspond to any known bodypart it will just not process it
		$bodyPartName = "None";
		$errorBodypart=1;
	}
	if ($errorBodypart==0){


		//Filter the values until the workcycle is done (in the bodyparts it is not done 
		//due to the quantity of data to JSON encode

		$data = [];
		//If the database does not contain that bodypart it will print a 100% result of lost data for that piechart
		if (!isset($dataArray[$bodyPart])){
			$results=[0,0,0,1];
		}
		else{
			$dataNoFiltered = $dataArray[$bodyPart];
			//Avoid the calibration and other status of the sensors of different workcycle to 1 or higher
			$workCycle = $dataArray[1];
			for ($i = 0; $i< sizeof($workCycle); $i++) {
				if ($workCycle[$i] >= 1){
					$initTime = $i;
					break;
				}
			};
			$dataFiltered=[];
			for ($i = 0; $i< (sizeof($workCycle)-$initTime); $i++) {
				$dataFiltered[$i]=$dataNoFiltered[$i+$initTime];
			}
			$data=$dataFiltered;

			//Start putting the conditions for each bodypart:

			//Right arm
			if ($bodyPartName == "Right arm"){
				$results = score3LevelThreshold ($data, 30, 60);
			}
			//Left arm
			elseif ($bodyPartName == "Left arm"){
				$results = score3LevelThreshold ($data, 30, 60);
			}
			//Right arm speed				
			elseif ($bodyPartName == "Right arm speed"){
				$results = score2LevelThreshold ($data, 60);
			}
			//Left arm speed
			elseif ($bodyPartName == "Left arm speed"){
				$results = score2LevelThreshold ($data, 60);
			}
			//Trunk
			elseif ($bodyPartName == "Trunk"){
				$results = score3LevelThreshold ($data, 20, 45);
			}
			//Right wrist
			elseif ($bodyPartName == "Right wrist"){
				$results = score5LevelThreshold ($data, 40, -30, 60, -50);
			}
			//Left wrist
			elseif ($bodyPartName == "Left wrist"){
				$results = score5LevelThreshold ($data, 40, -30, 60, -50);
			}
			//Right wrist speed
			elseif ($bodyPartName == "Right wrist speed"){
				$results = score2LevelThreshold ($data, 20);
			}
			//Left wrist speed
			elseif ($bodyPartName == "Left wrist speed"){
				$results = score2LevelThreshold ($data, 20);
			}
			//Right thumb force
			elseif ($bodyPartName == "Right thumb force"){
				$results = score3LevelThreshold ($data, 10, 45);
			}
			//Left thumb force
			elseif ($bodyPartName == "Left thumb force"){
				$results = score3LevelThreshold ($data, 10, 45);
			}
		}
		

		//Select the data that is going to be sent to the graph.
		$dataToSend=[];
		$dataToSend[0]=$bodyPart; //bodypart
		$dataToSend[1]=$bodyPart; //Optional
		$dataToSend[2]=$results[0]; //Bad frequency
		$dataToSend[3]=$results[1]; //Medium frequency
		$dataToSend[4]=$results[2]; //Good frequency
		$dataToSend[5]=$results[3]; //Lost data frequency
		
		//If we are not building the total piechart, print the information of the bodypart
		if ($All!=1){
			//JSON encode the information after string it, to send it to javascript
			$myJSON= json_encode($dataToSend);
			print $myJSON;
		}
		return $results;
	}
	else{
		//If there is no bodypart for that number, return error
		return -1;
	}
}

/*-------------------------------------------------------------------------*/

// Function for the total score

function frequencyTotal(){
	$csv = readCsv();
	//Define an acumulator to add the results
	$totalResult=[0,0,0,0];
	for ($i=0; $i<24; $i++){
		//Process all bodyparts one by one
		$bodypartResult = frequencyBodypart($csv, $i, 1);
		if ($bodypartResult != -1){
			//If it exists, search for the highest value position, and add a +1 in the total score (in the same position)
			for ($x = (sizeof($bodypartResult)-1); $x > -1;$x--){
				if ($bodypartResult[$x] == max($bodypartResult)){
					$position = $x;
					$totalResult[$x]++;
				}
			}
		}
	}
	//Prepare the data to send. 0 means that is the total value
	$dataToSend = [];
	$dataToSend[0]=0;
	$dataToSend[1]=0;
	$dataToSend[2]=$totalResult[0];
	$dataToSend[3]=$totalResult[1];
	$dataToSend[4]=$totalResult[2];
	$dataToSend[5]=$totalResult[3];
	$myJSON= json_encode($dataToSend);
	print $myJSON;
}

/*----------------------------------------------------------------------------*/

//Threshold functions

function score2LevelThreshold ($data, $lowest){
	$bad=0;
	$medium=0;
	$good=0;
	$lost=0;
	for ($i = 0; $i<sizeof($data) ; $i++){
		if (!$data[$i]){
			$lost++;
		}
		else{
			if ($data[$i] < $lowest && $data[$i] > (-$lowest)){
				$good++;
			}
			else {
				$bad++;
			}
		}
	}
	$results=[$bad,$medium,$good,$lost];
		
	return($results);
}
	
function score3LevelThreshold ($data, $lowest, $highest){
	$bad=0;
	$medium=0;
	$good=0;
	$lost=0;
	for ($i = 0; $i<sizeof($data) ; $i++){
		if (!$data[$i]){
			$lost++;
		}
		else{
			if ($data[$i] < $lowest && $data[$i] > (-$lowest)){
				$good++;
			}
			elseif ($data[$i] > $highest || $data[$i] < (-$highest)){
				$bad++;
			}
			else {
				$medium++;
			}
		}
	}
	$results=[$bad,$medium,$good,$lost];
		
	return($results);
	}

function score5LevelThreshold ($data, $positiveLowest, $negativeLowest, $positiveHighest, $negativeHighest){
	$bad=0;
	$medium=0;
	$good=0;
	$lost=0;
	for ($i = 0; $i<sizeof($data) ; $i++){
		if (!$data[$i]){
			$lost++;
		}
		else{
			if ($data[$i] < $positiveLowest && $data[$i] > ($negativeLowest)){
				$good++;
			}
			elseif ($data[$i] > $positiveHighest || $data[$i] < ($negativeHighest)){
				$bad++;
			}
			else {
				$medium++;
			}
		}
	}
	$results=[$bad,$medium,$good,$lost];
		
	return $results;
}



function readCsv($user){
		//Read the csv
		$filename = $user;
		$path = "uploads";
		$csvFile = $path . DIRECTORY_SEPARATOR . $filename;
			//Create an array map while reading .csv
		$csv = array_map('str_getcsv', file($csvFile));
		array_walk($csv, function(&$a) use ($csv) {
			$a = array_combine($csv[0], $a);
		});


		//Clean the related names for each value.csv
		for ($row = 0; $row < sizeof($csv); $row++){
			foreach ($csv[$row] as $name => $value){
				$cleancsv[$row][]=$value;
			}	
		}

		//Transpose the matrix to have a row for each value.csv
		 $retData = array();
			foreach ($cleancsv as $row => $columns) {
			  foreach ($columns as $row2 => $column2) {
				  $retData[$row2][$row] = $column2;
			  }
			}

		//Pass the transposed matrix.csv
		$cleancsv = $retData;

		//String the elements (necessary for JSON encode it).csv
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
		return $dataArray;
}
?>