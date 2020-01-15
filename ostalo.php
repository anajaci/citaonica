<!-- 	PRIMER BASTE -->
<script type="text/javascript">
            $(document).ready(function() {

                setInterval(function() {
                    $.getJSON( "http://172.20.222.144:8080/vratiStudenta", function(data) {
                
                        if(data.status == 0) {

                        $("#stanje").html('<div id="stanje" class="alert alert-success">'+data.poruka+'</div>');
                    }else {
                    	 
                        $("#stanje").html('<div id="stanje" class="alert alert-danger">'+data.poruka+'</div>');
                    }
                    });
                    // drawChart();
                    }, 500);

                
            });

           
            	// $(document).ready(function() {

            	// 	$("#zalij").click(function() {

            	// 		$.getJSON("http://172.20.222.152:8080/pokreniPumpu", function(data) {
            	// 			var vreme = new Date();
            	// 			var time = vreme.getDate() +"." + (vreme.getMonth()+1) + "." +vreme.getFullYear()+  ". " +vreme.getHours() +":"+vreme.getMinutes() + ":"+vreme.getSeconds();
            	// 			$("#vreme").html(time);

            	// 			 $("#stanje").html('<div id="stanje" class="alert alert-success">'+data.poruka+'</div>');
            	// 		});
            	// 	});
            	// });

           

            	 function getList() {
                     $.getJSON( "http://www.skyvideo.rs/parking/istorija.php?senzor=1", function( obj ) {

                        $.each(obj, function(key, value) {
                            $("ul").append("<li>" + value.parkingid + "</li>");
                            $("ul").append("<li>" + value.parkingstanje + "</li>");
                            $("ul").append("<li>" + value.parkingsensor + "</li>");
                            $("ul").append("<li>" + value.parkingvreme + "</li> <hr>");
                        });
                    });
                }

             
                  
                 // console.log(jsonData); 
                var json = '{"cols":[{"label":"Vreme","type":"string"},{"label":"Vrednost","type":"number"}],"rows":[';
                jsonData = JSON.parse(jsonData);
                for (var i = 0; i < jsonData.length; i++) {
                    // console.log(jsonData[i].parkingvreme);
                    // console.log(jsonData[i].parkingstanje);
                    json+= '{"c":[{"v":' + "\""+jsonData[i].parkingvreme + "\""+ '},{"v":'+ "\"" +jsonData[i].parkingstanje + "\"" + '}]},';
                }

                json+=']}';

              var data = new google.visualization.DataTable(json);

              // Instantiate and draw our chart, passing in some options.
              var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
              chart.draw(data, {width: 400, height: 240});
            }
</script>
<!-- /PRIMER BASTE -->