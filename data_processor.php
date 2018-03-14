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


/*_______________________________________________________________________________________________________________*/


files = [file one, file two...]
file filtering
Build the sessions with the files:
session one = csv1+csv2...
sessions =[session one, session two...]
user=[user one, user two...]
bodyparts=[bodypart one, bodypart two...]
//Sessions is the highest level on data, then users, then bodyparts.
bodyparts[]
users[][]
sessions[][][];
sessions[session one[user one[bodypart1, bodypart2], user two[bodypart1, bodypart2]], session two...]
selected = [selectedSession-> sessions[1][3][7],selectedUser-> , selectedBodypart-> ]


?>