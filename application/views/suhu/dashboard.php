<div class="content-wrapper" id="dashboard">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Thermal Monitoring</small>
    </h1>
  </section>

  <section class="content" >
    <div class="row">
      <div class="col-lg-3">
        <div class="small-box bg-navy">
          <div class="inner">
            <h3 id="tempStatus">Normal</h3>
            <p>Temperature Status</p>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="small-box bg-navy">
          <div class="inner">
            <h3><span id="temperature">0</span> &deg; C</h3>
            <p>Temperature</p>
          </div>
          <div class="icon">
            <i class="ion ion-thermometer" style="color:white"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="small-box bg-navy">
          <div class="inner">
            <h3 id="humStatus">Normal</h3>
            <p>Humidity Status</p>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
      <div class="col-lg-3">
        <!-- small box -->
        <div class="small-box bg-navy">
          <div class="inner">
            <h3><span id="humidity">0</span> %</h3>

            <p>Humidity</p>
          </div>
          <div class="icon">
            <i class="ion ion-waterdrop" style="color:white"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
    </div> 
    <div class="row">
      <div class="col-lg-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Temperature Graph</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <canvas id="tempgraph"></canvas>
            </div>
            <!-- /.table-responsive -->
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-lg-4">
                <div class="description-block border-right">
                  <h5 class="description-header">25 &deg; C</h5>
                  <span class="description-text">Average</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="description-block border-right">
                  <h5 class="description-header"><span id="temp_hi">0 </span>&deg; C</h5>
                  <span class="description-text">Highest</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="description-block border-right">
                  <h5 class="description-header"><span id="temp_lo">0 </span> &deg; C</h5>
                  <span class="description-text">Lowest</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Humidity Graph</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <canvas id="humigraph"></canvas>
            </div>
            <!-- /.table-responsive -->
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-lg-4">
                <div class="description-block border-right">
                  <h5 class="description-header">40 % </h5>
                  <span class="description-text">Average</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="description-block border-right">
                  <h5 class="description-header"><span id="hum_hi">40</span> % </h5>
                  <span class="description-text">Highest</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="description-block border-right">
                  <h5 class="description-header"><span id="hum_lo">40 </span> % </h5>
                  <span class="description-text">Lowest</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <p><a href="<?=base_url()?>history/temperature">Temperature History &raquo;</a></p>
      </div>
      <div class="col-lg-6">
        <p><a href="<?=base_url()?>history/humidity">Humidity History &raquo;</a></p>
      </div>
    </div>
  </section>
</div>

<script src="<?base_url()?>js/visual/visual.js"></script>
<script type="text/javascript">
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
                  distribution : 'linear',
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
        labels : [],
        datasets : [{
          label: 'Humidity',
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
            text: 'Humidity Graph'
          },
        scales: {
            xAxes: [{
              type: 'time',
                          time : {  unit :'second',
                                    
                                    parser : 'H:m:s'
                                    
                                  },
              distribution : 'linear',
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
    
    
    $.ajax({
    url :"<?=base_url();?>json/init_data/temperature",
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
    });

    $.ajax({
    url :"<?=base_url();?>json/init_data/humidity",
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
        window.humiconfig.data.datasets[0].data = datasets;
        window.humiconfig.data.labels = labels;
      } 
    });
    
    
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
      });
    }

    var time = window.tempconfig.data.labels[window.tempconfig.data.labels.length-1];
    console.log(time);
    send(time);

    function send(time){
      $.getJSON("<?=base_url();?>json/index/", function(data,status){
        
          if(status=='success'){
            //console.log(status);
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
            

            if(time != data['0'].EVENT){
              time = data['0'].EVENT;
              //console.log(time);
              
              if(window.tempconfig.data.datasets[0].data.length>=30){
                //console.log('deleting sumthing');
                window.tempconfig.data.datasets.forEach(function(dataset){
                  dataset.data.shift();
                });
                window.humiconfig.data.datasets.forEach(function(dataset){
                  dataset.data.shift();
                });
              }

              //console.log('now adding sumthing');
              window.tempconfig.data.datasets[0].data.push({
                x: data['0'].EVENT,
                y: data['0'].temperature
              });

              window.humiconfig.data.datasets[0].data.push({
                x: data['0'].EVENT,
                y: data['0'].humidity
              });
              
              myLineTemp.update();
              myLineHumi.update();
            }
            setTimeout(function(){
              send(time);
            },1000);
          }
          
        }
      );
    }
  });
</script>