<link rel="stylesheet" href="<?=base_url();?>css/jquery.loadingModal.css">  
<?php foreach($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?> 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style>
  .chartWrapper {
  position: relative;
}

.chartWrapper > canvas {
  position: absolute;
  left: 0;
  top: 0;
  pointer-events: none;
  
}

.chartAreaWrapper {
  width: 16000px;
  padding-right: 40px;
  
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?=$title?>
      <small><?=$subtitle?></small>
    </h1>
    <br>
    <p><a href="<?=base_url()?>dashboard">&laquo;Back to Dashboard</a></p>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header">
            <i class="fa fa-line-chart"></i>
            <h3 class="box-title"><?=$subject?></h3>
          </div>
          <div class="box-body" style="overflow-x: scroll;">
            <div class="chartWrapper">
              <div class="chartAreaWrapper">
                <canvas id="graph" height="300" width="16000"></canvas>
              </div>
            </div>    
          </div>
          <div class="box-footer"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header"></div>
          <div class="box-body"><?=$output?></div>
          <div class="box-footer"></div>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  var config = {
          type : 'line',
          data : {
            labels : [],
            datasets : [{
              label: '<?=$subject?>',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              fill: false,
              data : [],
            }]
          },

          options : {
            maintainAspectRatio: false,
            responsive : false,
            title: {
                display: false,
                text: '<?=$subject?>'
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
                    labelString: 'Timestamp'
                  },
                  ticks: {
                    source : 'data'
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
  
  $.ajax({
    url : "<?=base_url();?>json/history/<?=lcfirst($subject);?>",
    datatype : "json",
    async : false,
    success : function(response){
      var datasets = JSON.parse(response).map(function(e){
        return e.x;
      });
      var labels = JSON.parse(response).map(function(e){
        return e.y;
      });
      window.config.data.datasets[0].data = datasets;
      window.config.data.labels = labels;
      console.log(labels);
    }
  }).done();
  var ctx = document.getElementById('graph').getContext('2d');
  var myLineTemp = new Chart(ctx, config);
</script>