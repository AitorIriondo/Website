
	function navigableGraph(time,bodyPart,typeBodypart) {

		//Handle the data obtained from the AJAX_request and push it into an array
		var d1 = [];
		for (var i = 0; i < time.length; i++) {
			d1.push([time[i],bodyPart[i] ]);
		}

		var data = [ d1 ],
			placeholder = $("#placeholder");

		//Define the properties of the big graph
		var plot = $.plot(placeholder, data, {
			series: {
				lines: {
					show: true,
					fill: true,
				},
				color: "rgb(255, 0, 0)",
				threshold: [{
                below: 60,
                color: "rgb(255, 255, 0)"
            },{
               below: 30,
                color: "rgb(0, 255, 0)", 
            },{
               below: -30,
                color: "rgb(255, 255, 0)", 
            },{
               below: -60,
                color: "rgb(255, 0, 0)", 
            },
			],
				shadowSize: 0
			},
			xaxis: {
				zoomRange: [0.1, 10],
				panRange: [time[0], time[time.length-1]]
			},
			yaxis: {
				zoomRange: [0.1, 100],
				panRange: [(Math.min(...bodyPart)-5), (Math.max(...bodyPart)+5)]
			},
			zoom: {
				interactive: false
			},
			pan: {
				interactive: true
			}
		});

		//Define the properties of the small graph
		var overview = $.plot("#overview", [d1], {
			series: {
				lines: {
					show: true,
					lineWidth: 1,
					fill: true,
				},
				color: "rgb(255, 0, 0)",
				threshold: [{
                below: 60,
                color: "rgb(255, 255, 0)"
            },{
               below: 30,
                color: "rgb(0, 255, 0)", 
            },{
               below: -30,
                color: "rgb(255, 255, 0)", 
            },{
               below: -60,
                color: "rgb(255, 0, 0)", 
            },
			],
				shadowSize: 0
			},
			xaxis: {
				ticks: [],
				mode: "time"
			},
			yaxis: {
				ticks: [],
				min: (Math.min(...bodyPart)-5),
				max: (Math.max(...bodyPart)+5),
				autoscaleMargin: 0.1
			},
			selection: {
				mode: "x"
			}
		});
		
		$("#placeholder").bind("plotselected", function (event, ranges) {

		//Adjust the zooming and panning properties
			// do the zooming
			$.each(plot.getXAxes(), function(_, axis) {
				var opts = axis.options;
				opts.min = ranges.xaxis.from;
				opts.max = ranges.xaxis.to;
			});
			plot.setupGrid();
			plot.draw();
			plot.clearSelection();

			// don't fire event on the overview to prevent eternal loop

			overview.setSelection(ranges, true);
		});
		
		$("#overview").bind("plotselected", function (event, ranges) {
			plot.setSelection(ranges);
		});

		// show pan/zoom messages to illustrate events 

		//Bind the big graph to the panning text under it
		placeholder.bind("plotpan", function (event, plot) {
			var axes = plot.getAxes();
			$(".message").html("Panning to time: "  + axes.xaxis.min.toFixed(2)
			+ " &ndash; " + axes.xaxis.max.toFixed(2));
		});


		function addArrow(dir, right, top, offset) {
			$("<img class='button' src='arrow-" + dir + ".gif' style='right:" + right + "px;top:" + top + "px'>")
				.appendTo(placeholder)
				.click(function (e) {
					e.preventDefault();
					plot.pan(offset);
				});
		}

		addArrow("left", 55, 60, { left: -100 });
		addArrow("right", 25, 60, { left: 100 });
		addArrow("up", 40, 45, { top: -100 });
		addArrow("down", 40, 75, { top: 100 });

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	};
	
	
