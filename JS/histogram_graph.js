$(function() {

		var d1 = [];
		for (var i = 0; i <= 10; i += 1) {
			d1.push([i, parseInt(Math.random() * 30)]);
		}

		var d2 = [];
		for (var i = 0; i <= 10; i += 1) {
			d2.push([i, parseInt(Math.random() * 30)]);
		}

		var d3 = [];
		for (var i = 0; i <= 10; i += 1) {
			d3.push([i, parseInt(Math.random() * 30)]);
		}



		var stack = 0,
			bars = true,
			lines = false,
			steps = false;

		function plotWithOptions() {
			$.plot("#placeholder_histogram", [{data: d1, color:"rgb(255, 0, 0)",},{data: d2, color:"rgb(255, 255, 0)",},{data: d3, color:"rgb(0, 255, 0)",}], {
				series: {
					stack: stack,
					bars: {
						show: bars,
						barWidth: 0.6
					}
				}
			});
		}

		plotWithOptions();

});