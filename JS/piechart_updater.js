
$(function Main() {
	
	
			var updateInterval = 30;
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
	
			
		    var options = {
            series: {
                pie: {show: true}
                    },
            legend: {
                show: false
            }
         };
 



		function update() 
		{
			
			$.ajax({
				url: 'updating.php',             
				data: "",                      
				dataType: 'json',              
				success: function(data)    
				{
					var data = [
						{label: "Bad frequency", data: data[2]},
						{label: "Medium frequency", data: data[3]},
						{label: "Good frequency", data: data[4]},

					];

					$.plot($("#flotcontainer"), data, options);  

					setTimeout(update, updateInterval);
					
					
				} 
			});   
		} 

	 update();

	}); 
	

 
