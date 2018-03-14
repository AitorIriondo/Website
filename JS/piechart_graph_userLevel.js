	function userPiechart(bodypart, bad, medium, good, lost) {
		

			var piechartSettings = {
				series: {
					pie: {show: true,
						},
				legend: {
					show: false
				},
			 }
			};

		if (bodypart == 6){
			var data_rightArm = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: medium, color:"rgb(255, 255, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_rightArm"), data_rightArm, piechartSettings);
		}
		
		if (bodypart == 3){
			var data_leftArm = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: medium, color:"rgb(255, 255, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_leftArm"), data_leftArm, piechartSettings); 
		}
		
		if (bodypart == 4){
			var data_rightArmSpeed = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_rightArmSpeed"), data_rightArmSpeed, piechartSettings);
		}
		
		if (bodypart == 7){
			var data_leftArmSpeed = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_leftArmSpeed"), data_leftArmSpeed, piechartSettings);
		}
		
		if (bodypart == 9){
			var data_trunk = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: medium, color:"rgb(255, 255, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_trunk"), data_trunk, piechartSettings);
		}
		
		if (bodypart == 11){
			var data_rightWrist = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: medium, color:"rgb(255, 255, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_rightWrist"), data_rightWrist, piechartSettings);
		}
		
		if (bodypart == 17){
			var data_leftWrist = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: medium, color:"rgb(255, 255, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_leftWrist"), data_leftWrist, piechartSettings);
		}
		
		if (bodypart == 13){
			var data_rightWristSpeed = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_rightWristSpeed"), data_rightWristSpeed, piechartSettings);
		}
		
		if (bodypart == 19){
			var data_leftWristSpeed = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_leftWristSpeed"), data_leftWristSpeed, piechartSettings);
		}
		
		if (bodypart == 15){
			var data_rightThumbForce = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: medium, color:"rgb(255, 255, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_rightThumbForce"), data_rightThumbForce, piechartSettings);
		}
		
		if (bodypart == 21){
			var data_leftThumbForce = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: medium, color:"rgb(255, 255, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_leftThumbForce"), data_leftThumbForce, piechartSettings);
		}
		
		if (bodypart == 0){
			var data_totalEvaluation = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: medium, color:"rgb(255, 255, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
			$.plot($("#piechart_totalEvaluation"), data_totalEvaluation, piechartSettings);
		}
		
		
		 		
		
		
		
		
		
		
		
		
		
		
		
	};