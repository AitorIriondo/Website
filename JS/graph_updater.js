
$(function Main() {

		var data = [],totalPoints = 400;
        var res1 = [];
		var res2 = [];
		var piechart3=[];

		
		
		var updateInterval = 50;
		$("#updateInterval").val(updateInterval).change(function () {
			var v = $(this).val();
			if (v && !isNaN(+v)) {
				updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
				$(this).val("" + updateInterval);
			}
		});

		
		

			var piechart = {
				series: {
					pie: {show: true,
						},
				legend: {
					show: false
				},
			 }
			};
		
		
		function update() 
		{
			
			$.ajax({
				url: 'random.php',             
				data: "",                      
				dataType: 'json',              
				success: function(data)    
				{
					var piedataOffset = data[data.length - 2];
					var dataSize = data[data.length - 1];
					var piechartQuantity = dataSize/4;
					var userQuantity = 0;
					userQuantity = ((data.length)/dataSize);
					userQuantity = Math.floor(userQuantity);

					
					
					
					var id = data;
					var vname1 = data[0];   
					var vname2 = data[1];
					var vname3 = data[0];
					
					
					var datapie =[];
					var number1 = 0;
					var number2 = 0;
					var number3 = 0;
					
					var piechart_number =0;
					
					for (var x = 0; x < userQuantity; x++){
						for (var i = 0; i < piechartQuantity; i++){
							number1=(i*3+7+piedataOffset)+(x*dataSize);
							number2=(i*3+8+piedataOffset)+(x*dataSize);
							number3=(i*3+9+piedataOffset)+(x*dataSize);
							datapie[i] = [
								{data: data[number1], color:"rgb(255, 0, 0)",},
								{data: data[number2], color:"rgb(255, 255, 0)",},
								{data: data[number3], color:"rgb(0, 255, 0)",},
							];
							piechart_number=(piechartQuantity *x)+i;
							$.plot($('#flotcontainer'+piechart_number), datapie[i], piechart);   
						}

					}
					setTimeout(update, updateInterval);
					
				} 
			});   
		} 

	 update();


		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	
