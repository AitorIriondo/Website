$(function(user, bad, medium, good, lost) {


			var piechartSettings = {
				series: {
					pie: {show: true,
						},
				legend: {
					show: false
				},
			 }
			};

		
			var data_user = [
				{data: bad, color:"rgb(255, 0, 0)",},
				{data: medium, color:"rgb(255, 255, 0)",},
				{data: good, color:"rgb(0, 255, 0)",},
				{data: lost, color:"rgb(139,0,139)",},
			];
		
		
		$.plot($("#piechart_"+user), data_user, piechartSettings);

});