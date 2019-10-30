<link rel="stylesheet" href="<?=base_url();?>css/jquery.loadingModal.css"> 
<script type="text/javascript" src="<?=base_url();?>js/jquery.loadingModal.min.js"></script> 
<style type="text/css">
  .modal-dialog{
    width : 800px;
  }
  img{
    max-width: 600px;
  }

  .modal-body>table,.modal-body > table > tbody > tr > td{
    border : 1px solid black;
    padding : 5px;
  }
</style>
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>

<?php foreach($js_files as $file): ?> 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Signature
      <small>Potensi Ancaman Siber</small>
    </h1>
  </section>

  <section class="content" >
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <!-- /.box-tools -->
          </div>
          <div class="box-body">
            <?php echo $output; ?> 
          </div>
        </div>
        <!-- /. box -->
      </div>    
    </div>      
  </section>
  
</div>



<script type="text/javascript">
  $(document).ready(function(){
      const urlParams = new URLSearchParams(window.location.search);
      const myParam = urlParams.get('doc');
      //console.log(myParam);
      if(myParam!=null){
        $('.modal').modal({
          backdrop: 'static',
          keyboard: false
        });
        var path = "<?=base_url()?>"+"assets/JSON/"+myParam+".json";
        $.getJSON(path,function(result){
          
        }).done(function(data){
          $('.modal-title').append(data.Filename);
          $('.modal-body').append(data.Content);
        });

      }
      
    
  });
</script>
<!-- /.content-wrapper -->