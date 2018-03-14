
<?php

$rk = new RdKafka\Consumer();
$rk->setLogLevel(LOG_DEBUG);
// 9092 is the default port. If it is omitted below the script will look for that anyway.
$rk->addBrokers("192.168.56.100:9092");

//Same topic as in the c++ producer example. Can put a new topic there and subscribe to the same topic (text string) here 
$topic = $rk->newTopic("rwrist");
//TOPIC PARA GRAFICAS:%B %R %M
//$topic2 = $rk->newTopic("lwrist");
//$topic3 = $rk->newTopic("relbow");
//...

$topic->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);

while (true) {
	
    $msg = $topic->consume(0, 1000);
	if(is_null($msg)){
		break;
	}
	$size = count($msg->payload);
	
	/* the counter assigns the value to an array to mantain all the values inside myVariable*/
	
	if (isset($counter)){
		$counter++;
	}
	else{
		$counter=0;
	}
	
	/* Name the data array as myVariable */
	
    if ($msg->err) {
        //$msg->errstr(), "\n";
		
		/*--------------------------------------------------------------------------*/
		
		$myVariableEnd= end($myVariable);

		

		break;
		
		/*--------------------------------------------------------------------------*/

	}
	$myVariable[$counter] = $msg->payload;
}


$topic2 = $rk->newTopic("lwrist");
//TOPIC PARA GRAFICAS:%B %R %M
//$topic2 = $rk->newTopic("lwrist");
//$topic3 = $rk->newTopic("relbow");
//...

$topic2->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);

while (true) {
	
    $msg2 = $topic2->consume(0, 1000);
	if(is_null($msg2)){
		break;
	}
	$size2 = count($msg2->payload);
	
	/* the counter assigns the value to an array to mantain all the values inside myVariable*/
	
	if (isset($counter2)){
		$counter2++;
	}
	else{
		$counter2=0;
	}
	
	/* Name the data array as myVariable */
	
    if ($msg2->err) {
        //$msg->errstr(), "\n";
		
		/*--------------------------------------------------------------------------*/
		//include "evaluator.php";
		//$bad_frequency= 3;
		//$medium_frequency= 2;
		//$good_frequency = 4;
		$bad_frequency=0;
		$medium_frequency=0;
		$good_frequency=0;
		foreach ($myVariable as &$myVariable1){
		if ($myVariable1 < 20) {
			$good_frequency = $good_frequency+1;
		} elseif ($myVariable1 > 60) {
			$bad_frequency = $bad_frequency+1;
		} else {
			$medium_frequency = $medium_frequency+1;
		}
		}
		$bad_frequency= (string)$bad_frequency;
		$medium_frequency= (string)$medium_frequency;
		$good_frequency = (string)$good_frequency;
		$myVariableEnd2= end($myVariable2);
		$myVariableEnd=[$myVariableEnd, $myVariableEnd2, $bad_frequency, $medium_frequency, $good_frequency];
		$myJSON= json_encode($myVariableEnd);
		echo $myJSON;

		break;
		
		/*--------------------------------------------------------------------------*/

	}
	$myVariable2[$counter2] = $msg2->payload;
}



?>


