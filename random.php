<?php
/*Read the old data */
$string_data = file_get_contents("random.txt");
$data = unserialize($string_data);

/*See how many users are active */
$txt_file    = file_get_contents('Users.txt');
$Users        = explode("\n", $txt_file);
$userQuantity = sizeof($Users);

/*Data size if in the future it is needed to change it.
Each sensor data increases the size in 4, 1 for the graph and 3 for the piechart*/
$dataSize=32;
$piedataOffset=1;

/* Initialize all the array cells that the new users will take*/
$expectedSize = $userQuantity*$dataSize;
for ($i=0; $i<($expectedSize);$i++){
	if (is_null($data[$i])){
		$data[$i]=0;
	}
}


/*Delete the elements of extra users*/
$data = array_slice($data, 0, $expectedSize+1);


/*Create random data for each user*/
for ($userNumber=0;$userNumber<$userQuantity;$userNumber++) {

	/*Data for the Left arm */
	$data[0+($dataSize*$userNumber)] = mt_rand (-10,10)+ $data[0+($dataSize*$userNumber)];
	if ($data[0+($dataSize*$userNumber)] < -95) {
		$data[0+($dataSize*$userNumber)] = -95;
	} elseif ($data[0+($dataSize*$userNumber)] > 95) {
		$data[0+($dataSize*$userNumber)] = 95;
	} 

	/*Data for the Right arm */
	$data[1+($dataSize*$userNumber)] = mt_rand (-10,10)+ $data[1+($dataSize*$userNumber)];
	if ($data[1+($dataSize*$userNumber)] < -95) {
		$data[1+($dataSize*$userNumber)] = -95;
	} elseif ($data[1+($dataSize*$userNumber)] > 95) {
		$data[1+($dataSize*$userNumber)] = 95;
	} 

	/*Data for the Left arm speed*/
	$data[2+($dataSize*$userNumber)] = mt_rand (-10,10)+ $data[2+($dataSize*$userNumber)];
	if ($data[2+($dataSize*$userNumber)] < -95) {
		$data[2+($dataSize*$userNumber)] = -95;
	} elseif ($data[2+($dataSize*$userNumber)] > 95) {
		$data[2+($dataSize*$userNumber)] = 95;
	} 

	/*Data for the Right arm speed*/
	$data[3+($dataSize*$userNumber)] = mt_rand (-10,10)+ $data[3+($dataSize*$userNumber)];
	if ($data[3+($dataSize*$userNumber)] < -95) {
		$data[3+($dataSize*$userNumber)] = -95;
	} elseif ($data[3+($dataSize*$userNumber)] > 95) {
		$data[3+($dataSize*$userNumber)] = 95;
	} 

	/*Data for the Trunk*/
	$data[4+($dataSize*$userNumber)] = mt_rand (-10,10)+ $data[4+($dataSize*$userNumber)];
	if ($data[4+($dataSize*$userNumber)] < -40) {
		$data[4+($dataSize*$userNumber)] = -40;
	} elseif ($data[4+($dataSize*$userNumber)] > 95) {
		$data[4+($dataSize*$userNumber)] = 95;
	} 

	/*Data for the wrist angle */
	$data[5+($dataSize*$userNumber)] = mt_rand (-10,10)+ $data[5+($dataSize*$userNumber)];
	if ($data[5+($dataSize*$userNumber)] < -95) {
		$data[5+($dataSize*$userNumber)] = -95;
	} elseif ($data[5+($dataSize*$userNumber)] > 95) {
		$data[5+($dataSize*$userNumber)] = 95;
	} 

	/*Data for the wrist speed*/
	$data[6+($dataSize*$userNumber)] = mt_rand (-10,10)+ $data[6+($dataSize*$userNumber)];
	if ($data[6+($dataSize*$userNumber)] < 0) {
		$data[6+($dataSize*$userNumber)] = 0;
	} elseif ($data[6+($dataSize*$userNumber)] > 95) {
		$data[6+($dataSize*$userNumber)] = 95;
	} 
	
	/*Data for the thumb force */
	$data[7+($dataSize*$userNumber)] = mt_rand (-5,5) + $data[7+($dataSize*$userNumber)];
	if ($data[7+($dataSize*$userNumber)] < 0) {
		$data[7+($dataSize*$userNumber)] = 0;
	} elseif ($data[7+($dataSize*$userNumber)] > 80) {
		$data[7+($dataSize*$userNumber)] = 80;
	}
	
	

	/*--------------------------------------------------------------------------------------------*/

	/*Frequency for the Left arm */
	if ($data[0+($dataSize*$userNumber)] < 30 && $data[0+($dataSize*$userNumber)] > -30) {
		$data[$piedataOffset+9+($dataSize*$userNumber)]= $data[$piedataOffset+9+($dataSize*$userNumber)]+1;
	} elseif ($data[0+($dataSize*$userNumber)] > 60 || $data[0+($dataSize*$userNumber)]< -50) {
		$data[$piedataOffset+7+($dataSize*$userNumber)] = $data[$piedataOffset+7+($dataSize*$userNumber)]+1;
	} else {
		$data[$piedataOffset+8+($dataSize*$userNumber)] = $data[$piedataOffset+8+($dataSize*$userNumber)]+1;
	}

	/*Frequency for the Right arm */
	if ($data[1+($dataSize*$userNumber)] < 30 && $data[1+($dataSize*$userNumber)] > -30) {
		$data[$piedataOffset+12+($dataSize*$userNumber)]= $data[$piedataOffset+12+($dataSize*$userNumber)]+1;
	} elseif ($data[1+($dataSize*$userNumber)] > 60 || $data[1+($dataSize*$userNumber)]< -50) {
		$data[$piedataOffset+10+($dataSize*$userNumber)] = $data[$piedataOffset+10+($dataSize*$userNumber)]+1;
	} else {
		$data[$piedataOffset+11+($dataSize*$userNumber)] = $data[$piedataOffset+11+($dataSize*$userNumber)]+1;
	}


	/*Frequency for the Left arm speed */
	if ($data[2+($dataSize*$userNumber)] < 60 && $data[2+($dataSize*$userNumber)] > -60) {
		$data[$piedataOffset+15+($dataSize*$userNumber)]= $data[$piedataOffset+15+($dataSize*$userNumber)]+1;
	} elseif ($data[2+($dataSize*$userNumber)] > 60 || $data[2+($dataSize*$userNumber)]< -60) {
		$data[$piedataOffset+13+($dataSize*$userNumber)] = $data[$piedataOffset+13+($dataSize*$userNumber)]+1;
	} 
	$data[$piedataOffset+14+($dataSize*$userNumber)] = 0;


	/*Frequency for the Right arm speed */
	if ($data[3+($dataSize*$userNumber)] < 60 && $data[3+($dataSize*$userNumber)] > -60) {
		$data[$piedataOffset+18+($dataSize*$userNumber)]= $data[$piedataOffset+18+($dataSize*$userNumber)]+1;
	} elseif ($data[3+($dataSize*$userNumber)] > 60 || $data[3+($dataSize*$userNumber)]< -60) {
		$data[$piedataOffset+16+($dataSize*$userNumber)] = $data[$piedataOffset+16+($dataSize*$userNumber)]+1;
	} 
	$data[$piedataOffset+17+($dataSize*$userNumber)] =0;
	
	
	/*Frequency for the Trunk */
	if ($data[4+($dataSize*$userNumber)] < 20 && $data[4+($dataSize*$userNumber)] > -20) {
		$data[$piedataOffset+21+($dataSize*$userNumber)]= $data[$piedataOffset+21+($dataSize*$userNumber)]+1;
	} elseif ($data[4+($dataSize*$userNumber)] > 45 || $data[4+($dataSize*$userNumber)]< -30) {
		$data[$piedataOffset+19+($dataSize*$userNumber)] = $data[$piedataOffset+19+($dataSize*$userNumber)]+1;
	} else {
		$data[$piedataOffset+20+($dataSize*$userNumber)] = $data[$piedataOffset+20+($dataSize*$userNumber)]+1;
	}


	/*Frequency for the wrist angle */
	if ($data[5+($dataSize*$userNumber)] < 40 && $data[5+($dataSize*$userNumber)] > -30) {
		$data[$piedataOffset+24+($dataSize*$userNumber)]= $data[$piedataOffset+24+($dataSize*$userNumber)]+1;
	} elseif ($data[5+($dataSize*$userNumber)] > 60 || $data[5+($dataSize*$userNumber)]< -50) {
		$data[$piedataOffset+22+($dataSize*$userNumber)] = $data[$piedataOffset+22+($dataSize*$userNumber)]+1;
	} else {
		$data[$piedataOffset+23+($dataSize*$userNumber)] = $data[$piedataOffset+23+($dataSize*$userNumber)]+1;
	}

	/*Frequency for the wrist speed */
	if ($data[6+($dataSize*$userNumber)] < 20 && $data[6+($dataSize*$userNumber)] > -20) {
		$data[$piedataOffset+27+($dataSize*$userNumber)]= $data[$piedataOffset+27+($dataSize*$userNumber)]+1;
	} elseif ($data[6+($dataSize*$userNumber)] > 20 || $data[6+($dataSize*$userNumber)]< -20) {
		$data[$piedataOffset+25+($dataSize*$userNumber)] = $data[$piedataOffset+25+($dataSize*$userNumber)]+1;
	} 
	$data[$piedataOffset+26+($dataSize*$userNumber)] =0;
	
	/*Frequency for the thumb force */
	if ($data[7+($dataSize*$userNumber)] < 10) {
		$data[$piedataOffset+30+($dataSize*$userNumber)]= $data[$piedataOffset+30+($dataSize*$userNumber)]+1;
	} elseif ($data[6+($dataSize*$userNumber)] > 45) {
		$data[$piedataOffset+28+($dataSize*$userNumber)] = $data[$piedataOffset+28+($dataSize*$userNumber)]+1;
	} else {
		$data[$piedataOffset+29+($dataSize*$userNumber)] = $data[$piedataOffset+29+($dataSize*$userNumber)]+1;
	}
}
/*See the selected user for the user view.php */
$selected_data = file_get_contents("Selecteduser.txt");
$selectedUser = unserialize($selected_data);

/*Add to the data array the offset for the piechart data and the size of data per user*/
$data[] = $selectedUser;
$data[] = $piedataOffset;
$data[] = $dataSize;

/*Serialize data for the .txt file to maintain the frequencies*/
$string_data = serialize($data);
file_put_contents("random.txt", $string_data);

/*String the elements (necessary for JSON encode it*/
foreach ($data as $dataElement){
	$dataElement=(string)$dataElement;
}

/* JSON code the data to pass it to the graph_updater.js */

$dataArray=[];
for ($i=0;$i<(count($data)-1);$i++){
	$dataArray[$i]=$data[$i];
}
$myJSON= json_encode($dataArray);
echo $myJSON;
?>