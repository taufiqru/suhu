var tempconfig = {
        type : 'line',
        data : {
          labels : [],
          datasets : [{
            label: 'Temperature',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            fill: false,
            data : [],
          }]
        },
        options : {
          responsive : true,
          title: {
              display: true,
              text: 'Temperature Graph'
            },
          scales: {
              xAxes: [{
                type: 'time',
                            time : {  unit :'second',
                                      
                                      parser : 'H:m:s'
                                      
                                    },
                distribution : 'series',
                display: true,
                scaleLabel: {
                  display: true,
                  labelString: 'Time'
                },
                ticks: {
                  source : 'auto'
                 }
              }],
              yAxes: [{
                display: true,
                scaleLabel: {
                  display: true,
                  labelString: 'value'
                }
              }]
            }
        }
      };
var humiconfig = {
    type : 'line',
    data : {
      datasets : [{
        label: 'Humidity',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        fill: false,
        data : [{}],
      }]
    },
    options : {
      responsive : true,
      title: {
          display: true,
          text: 'Humidity Graph'
        },
      scales: {
          xAxes: [{
            type: 'time',
                        time : {  unit :'second',
                                  
                                  parser : 'H:m:s'
                                  
                                },
            distribution : 'series',
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Time'
            },
            ticks: {
              source : 'auto'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'value'
            }
          }]
        }
    }
  };
var limit = 1;
var offset = 0;

var temp_hi = 0;
var temp_lo = 999;
var temp_avg = 0;

var hum_hi = 0;
var hum_lo = 999;
var hum_avg = 0;

var val;
var stats;

var coba;   

$(document).ready(function(){
  send();
  
  var coba;

    $.ajax({
    url :"<?=base_url();?>json/init_data",
    datatype : "json",
    async : false,
    success : function(response){
        coba = response;    
        var datasets = JSON.parse(response).map(function(e){
          return e.x;
        });
        var labels = JSON.parse(response).map(function(e){
          return e.y;
        });
        window.tempconfig.data.datasets[0].data = datasets;
        window.tempconfig.data.labels = labels;
      } 
    }).done();
  
  
  var ctx = document.getElementById('tempgraph').getContext('2d');
  var myLineTemp = new Chart(ctx, window.tempconfig);

  var csx = document.getElementById('humigraph').getContext('2d');
  var myLineHumi = new Chart(csx, humiconfig);

  function updateStats(val,stats){
    var data = { 
       stats : stats,
       value : val 
    };
    $.getJSON("<?=base_url();?>json/update",data,function(data,status){
      //console.log(data);
    });
  }

  function send(){
    $.getJSON("<?=base_url();?>json/index/"+limit+"/"+offset, function(data,status){
      
        if(status=='success'){
          offset++;
          $('#temperature').text(data['0'].temperature);
          $('#humidity').text(data['0'].humidity);
          if(data['0'].temperature>temp_hi){
            temp_hi = data['0'].temperature;
            updateStats(temp_hi,"temp_hi");
            $('#temp_hi').text(temp_hi);
          }
          if(data['0'].temperature<temp_lo){
            temp_lo = data['0'].temperature;
            updateStats(temp_lo,"temp_lo");
            $('#temp_lo').text(temp_lo);
          }
          if(data['0'].humidity>hum_hi){
            hum_hi = data['0'].humidity;
            updateStats(hum_hi,"hum_hi");
            $('#hum_hi').text(hum_hi);
          }
          if(data['0'].humidity<hum_lo){
            hum_lo = data['0'].humidity;
            updateStats(hum_lo,"hum_lo");
            $('#hum_lo').text(hum_lo);
          }
          if(data['0'].humidity>=70){
            $('#humStatus').html("<font color='red'>High</font>");
          }else if(data['0'].humidity<=20.00){
            $('#humStatus').html("<font color='blue'>Low</font>");
          }else{
            $('#humStatus').html("Normal");
          }

          if(data['0'].temperature>=30){
            $('#tempStatus').html("<font color='red'>High</font>");
          }else if(data['0'].temperature<=16.00){
            $('#tempStatus').html("<font color='blue'>Low</font>");
          }else{
            $('#tempStatus').html("Normal");
          }
          // chartJS
          window.tempconfig.data.datasets[0].data.push({
            x: data['0'].EVENT,
            y: data['0'].temperature
          });
          humiconfig.data.datasets[0].data.push({
            x: data['0'].EVENT,
            y: data['0'].humidity
          });

          if(offset>30){
            tempconfig.data.datasets.forEach(function(dataset){
              dataset.data.shift();
            });
            humiconfig.data.datasets.forEach(function(dataset){
              dataset.data.shift();
            });
          }
          myLineTemp.update();
          myLineHumi.update();
          setTimeout(function(){
            send();
          },1000);
        }
        
      }
    );
  }
});