
$(function Main() {

		var data = [],totalPoints = 400;
        var res1 = [];
		var res2 = [];
		var res3 = [];
		var res4 = [];
		var res5 = [];
		var res6 = [];
		var res7 = [];
		var res8 = [];
		
		var piechart=[];

		
		function initData1() {		
		     for (var i = 0; i < totalPoints; ++i) 
		     { res1.push([i, 0]); }	
		    return res1;
		} 
		 
		function initData2() {		
		     for (var i = 0; i < totalPoints; ++i) 
		     { res2.push([i, 0]); }	
		    return res2;
		} 
		
		function initData3() {		
		     for (var i = 0; i < totalPoints; ++i) 
		     { res3.push([i, 0]); }	
		    return res3;
		} 
		
		function initData4() {		
		     for (var i = 0; i < totalPoints; ++i) 
		     { res4.push([i, 0]); }	
		    return res4;
		} 
		
		function initData5() {		
		     for (var i = 0; i < totalPoints; ++i) 
		     { res5.push([i, 0]); }	
		    return res5;
		} 
		
		function initData6() {		
		     for (var i = 0; i < totalPoints; ++i) 
		     { res6.push([i, 0]); }	
		    return res6;
		} 
		
		function initData7() {		
		     for (var i = 0; i < totalPoints; ++i) 
		     { res7.push([i, 0]); }	
		    return res7;
		} 


		function initData8() {		
		     for (var i = 0; i < totalPoints; ++i) 
		     { res8.push([i, 0]); }	
		    return res8;
		} 
		
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

		var plot1 = $.plot("#placeholder0", [ initData1() ], {

			series: {
				shadowSize: 3,
				clickable: true,
				hoverable: true,
				label: "Left arm position",
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
            },

			yaxis: {
				min: -100,
				max: 100,
				axisLabel: 'Right arm position angle (deg)'
			},
			xaxis: {
				//show: false
				axisLabel: 'Samples'
			},

		});
		
		var plot2 = $.plot("#placeholder1", [ initData2()], {
			series: {
				shadowSize: 3,
				clickable: true,
				hoverable: true,
				label: "Left arm position",
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
            },

			yaxis: {
				min: -100,
				max: 100,
				axisLabel: 'Left arm position angle (deg)'
			},
			xaxis: {
				//show: false
				axisLabel: 'Samples'
			},
		});
		
		
		var plot3 = $.plot("#placeholder2", [ initData3()], {
			series: {
				shadowSize: 3,
				clickable: true,
				hoverable: true,
				label: "Right arm speed",
                lines: {
                    show: true,
					fill: true,
                },
				color: "rgb(255, 0, 0)",
				threshold: [{
               below: 60,
                color: "rgb(0, 255, 0)", 
            },{
               below: -60,
                color: "rgb(255, 0, 0)", 
            },
			],
            },

			yaxis: {
				min: -100,
				max: 100,
				axisLabel: 'Right arm angular speed (deg/s)'
			},
			xaxis: {
				//show: false
				axisLabel: 'Samples'
			},
		});
		
		
		var plot4 = $.plot("#placeholder3", [ initData4()], {
			series: {
				shadowSize: 3,
				clickable: true,
				hoverable: true,
				label: "Left arm speed",
                lines: {
                    show: true,
					fill: true,
                },
				color: "rgb(255, 0, 0)",
				threshold: [{
               below: 60,
                color: "rgb(0, 255, 0)", 
            },{
               below: -60,
                color: "rgb(255, 0, 0)", 
            },
			],
            },

			yaxis: {
				min: -100,
				max: 100,
				axisLabel: 'Left arm angular speed (deg/s)'
			},
			xaxis: {
				//show: false
				axisLabel: 'Samples'
			},
		});
		
		
		
		var plot5 = $.plot("#placeholder4", [ initData5()], {
			series: {
				shadowSize: 3,
				clickable: true,
				hoverable: true,
				label: "Trunk position",
                lines: {
                    show: true,
					fill: true,
                },
				color: "rgb(255, 0, 0)",
				threshold: [{
                below: 45,
                color: "rgb(255, 255, 0)"
            },{
               below: 20,
                color: "rgb(0, 255, 0)", 
            },{
               below: -20,
                color: "rgb(255, 255, 0)", 
            },{
               below: -30,
                color: "rgb(255, 0, 0)", 
            },
			],
            },

			yaxis: {
				min: -100,
				max: 100,
				axisLabel: 'Trunk angle (deg)'
			},
			xaxis: {
				//show: false
				axisLabel: 'Samples'
			},
		});
		
		
		
		var plot6 = $.plot("#placeholder5", [ initData6()], {
			series: {
				shadowSize: 3,
				clickable: true,
				hoverable: true,
				label: "Wrist position",
                lines: {
                    show: true,
					fill: true,
                },
				color: "rgb(255, 0, 0)",
				threshold: [{
                below: 60,
                color: "rgb(255, 255, 0)"
            },{
               below: 40,
                color: "rgb(0, 255, 0)", 
            },{
               below: -30,
                color: "rgb(255, 255, 0)", 
            },{
               below: -50,
                color: "rgb(255, 0, 0)", 
            },
			],
            },

			yaxis: {
				min: -100,
				max: 100,
				axisLabel: 'Wrist Joint Angle (deg)'
			},
			xaxis: {
				//show: false
				axisLabel: 'Samples'
			},
		});
		
		
		var plot7 = $.plot("#placeholder6", [ initData7()], {
			series: {
				shadowSize: 3,
				clickable: true,
				hoverable: true,
				label: "Wrist speed",
                lines: {
                    show: true,
					fill: true,
                },
				color: "rgb(255, 0, 0)",
				threshold: [{
               below: 20,
                color: "rgb(0, 255, 0)", 
            }]
			},

			yaxis: {
				min: 0,
				max: 100,
				axisLabel: 'Wrist Angular Speed (deg/s)'
			},
			xaxis: {
				//show: false
				axisLabel: 'Samples'
			},
		});
		
		var plot8 = $.plot("#placeholder7", [ initData8()], {
			series: {
				shadowSize: 3,
				clickable: true,
				hoverable: true,
				label: "Thumb force",
                lines: {
                    show: true,
					fill: true,
                },
				color: "rgb(255, 0, 0)",
				threshold: [{
                below: 45,
                color: "rgb(255, 255, 0)"
            },{
               below: 10,
                color: "rgb(0, 255, 0)", 
            }]
			},

			yaxis: {
				min: 0,
				max: 80,
				axisLabel: 'Thumb push force (N)'
			},
			xaxis: {
				//show: false
				axisLabel: 'Samples'
			},
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
					var selectedUser = data[data.length - 3];
					var piedataOffset = data[data.length - 2];
					var dataSize = data[data.length - 1];
					var piechartQuantity = dataSize/4;
					console.log(selectedUser);
					var id = data;
					var vname1 = data[0+selectedUser*dataSize];   
					var vname2 = data[1+selectedUser*dataSize];
					var vname3 = data[2+selectedUser*dataSize];
					var vname4 = data[3+selectedUser*dataSize];
					var vname5 = data[4+selectedUser*dataSize];
					var vname6 = data[5+selectedUser*dataSize];
					var vname7 = data[6+selectedUser*dataSize];
					var vname8 = data[7+selectedUser*dataSize];
					
					var datapie =[];
					var number1 = 0;
					var number2 = 0;
					var number3 = 0;
					
						for (var i = 0; i < piechartQuantity; i++){
							number1=(i*3+7+selectedUser*dataSize+piedataOffset);
							number2=(i*3+8+selectedUser*dataSize+piedataOffset);
							number3=(i*3+9+selectedUser*dataSize+piedataOffset);
							datapie[i] = [
								{data: data[number1], color:"rgb(255, 0, 0)",},
								{data: data[number2], color:"rgb(255, 255, 0)",},
								{data: data[number3], color:"rgb(0, 255, 0)",},
							];
							$.plot($('#flotcontainer'+i), datapie[i], piechart);   
						}
					
				

					$(".test1").text(vname1);
					$(".test2").text(vname2);
					$(".test3").text(vname3);
					$(".test4").text(vname4);
					$(".test5").text(vname5);
					$(".test6").text(vname6);
					$(".test7").text(vname7);
					$(".test8").text(vname8);

					
					res1.push([totalPoints, vname1]);
					res1.shift(); 

					res2.push([totalPoints, vname2]);
					res2.shift(); 
					
					res3.push([totalPoints, vname3]);
					res3.shift(); 
					
					res4.push([totalPoints, vname4]);
					res4.shift(); 
					
					res5.push([totalPoints, vname5]);
					res5.shift(); 
					
					res6.push([totalPoints, vname6]);
					res6.shift(); 
					
					res7.push([totalPoints, vname7]);
					res7.shift(); 
					
					res8.push([totalPoints, vname8]);
					res8.shift(); 

					
					for (i=0;i<totalPoints;i++) { res1[i][0] = i; res2[i][0] = i; res3[i][0] = i; res4[i][0] = i; res5[i][0] = i; res6[i][0] = i; res7[i][0] = i; res8[i][0] = i; }
					
					plot1.setData([ res1 ]);
					plot2.setData([ res2 ]);
					plot3.setData([ res3 ]);
					plot4.setData([ res4 ]);
					plot5.setData([ res5 ]);
					plot6.setData([ res6 ]);
					plot7.setData([ res7 ]);
					plot8.setData([ res8 ]);


					plot1.draw();
					plot2.draw();
					plot3.draw();
					plot4.draw();
					plot5.draw();
					plot6.draw();
					plot7.draw();
					plot8.draw();

					
					setTimeout(update, updateInterval);
					
				} 
			});   
		} 

	 update();


		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	
