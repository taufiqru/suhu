<!-- Date Picker -->
<link rel="stylesheet" href="<?=base_url();?>theme/plugins/datepicker/datepicker3.css">
<!-- datepicker -->
<script src="<?=base_url();?>theme/plugins/datepicker/bootstrap-datepicker.js"></script>
 <!-- ChartJS 1.0.1 -->
<script src="<?=base_url();?>theme/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>theme/plugins/fastclick/fastclick.js"></script> 
<script>
	$(function(){

    function fetchEvent(){
      var json=null;
      $.ajax({
        'async':false,
        'global':false,
        'url': "<?=base_url();?>index.php/API/allevent",
        'dataType':"json",
        'success':function(data){
          json=data;
        }
      });
      return json;
    }
    var listOfEvent=fetchEvent();
		//The Calender
	  	$("#calendar").datepicker({
        beforeShowDay: function(date) {
    dateFormat = date.getUTCFullYear() + '-' + date.getUTCMonth() + '-' + date.getUTCDate();
    //alert(dateFormat);
    if (dateFormat == "2017-3-30") {
      //alert(dateFormat);
    inRange = true; //to highlight a range of dates
      return {class: 'highlight', tooltip: 'Title'};
    }
    
    }
      });

	  	var areaChartData = {
      labels: ["January", "February", "Maret", "April", "Mei", "Juni", "Juli","Agustus","September","Oktober","November","Desember"],
      datasets: [        
        {
          label: "Kegiatan",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: <?php echo $kegiatan_per_bulan;?>
        }
      ]
    };

	  	//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[0].fillColor = "#00a65a";
    barChartData.datasets[0].strokeColor = "#00a65a";
    barChartData.datasets[0].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
 
	})
	
</script>