// This function shows the tab that the user has clicked on
function sendToGraph(typeOfGraph, typeOfData, userName) {
	console.log(userName);
	if (typeOfGraph == 1){
		$.ajax({
			type: "GET",
			dataType: 'json',  
			url: 'read_csv.php',
			data: {bodyPart: typeOfData},
			success: function(data) 
			{

				var time = data[0];
				var workCycle = data[1];
				var bodyPart = data[2];
				if (time.length <= 1){
					for (var i = 0; i< 100; i++) {
						bodyPart[i] = 0;
					};
				}
				else {
					//Avoid the start and calibration 
					var initTime = 0;
					for (var i = 0; i< workCycle.length; i++) {
						if (workCycle[i] == 1){
							initTime = i;
							i = workCycle.length;
						}
					};
					
					//Filter the body part information
					bodyPartFiltered = [];
					for (var i = 0; i< (workCycle.length-initTime); i++) {
						if (!bodyPart[i+initTime]){
							bodyPartFiltered[i]=404; //filter null values for wrong read of the sensor
						}
						else{
							bodyPartFiltered[i]=bodyPart[i+initTime];
						}
					}
					bodyPart=bodyPartFiltered;
					
					//Filter the time
					timeFiltered = [];
					for (var i = 0; i< (workCycle.length-initTime); i++) {
						if (!time[i+initTime]){
							timeFiltered[i]=404; //filter null values for wrong read of the sensor
						}
						else{
							timeFiltered[i]=time[i+initTime];
						}
					}
					time=timeFiltered;
					
					//Now the values are sent to the graph to plot them
					navigableGraph(time, bodyPart);
				}
			}
		});
	}
	//The type of graph 2 is used to build the piecharts of the bodyparts of a single user
	if (typeOfGraph == 2){
		getFrequencies(6, user);
		getFrequencies(3, user);
		getFrequencies(4, user);
		getFrequencies(7, user);
		getFrequencies(9, user);
		getFrequencies(11, user);
		getFrequencies(13, user);
		getFrequencies(15, user);
		getFrequencies(17, user);
		getFrequencies(19, user);
		getFrequencies(21, user);
		getFrequencies("All", user);
	}
}

function getFrequencies(selectedBodypart, userName)  
{
	console.log(userName);
	$.ajax({
		type: "GET",
		dataType: 'json',  
		url: 'read_csv_frequencies.php',
		data: {bodyPart: selectedBodypart, user: userName},
		success: function(data) 
		{
			var bodypart = data[0];
			var bad = data[2];
			var medium = data[3];
			var good = data[4];
			var lost = data[5];				
						
			//Now the values are sent to the graph to plot them
			userPiechart(bodypart, bad, medium, good, lost);
		}
	});
}


