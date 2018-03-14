
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

		$myJSON= json_encode($myVariableEnd);
		echo $myJSON;
		break;
		
		/*--------------------------------------------------------------------------*/

	}
	$myVariable[$counter] = $msg->payload;
}





?>


