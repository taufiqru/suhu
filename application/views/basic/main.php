  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Panel Admin</small>
      </h1>
    </section>

    <section class="content" >
      <div class="row">
        <div class="col-md-8">
          <div class="box">
            <div class="box-header"><h4>Selamat Datang!</h4></div>
            <div class="box-body">
              <p><?=$deskripsi_web[0]->deskripsi_web;?></p> 
              <div class="callout callout-danger">
                <h4>Perhatian!</h4>
                <p>Pastikan mengecek data BKPH saat ini sebelum menginputkan data! Data BKPH berpengaruh pada posisi/lokasi dari temuan.</p>
              </div>
            </div>
            <div class="box-footer"></div>
          </div>
        </div>
        <!-- <div class="col-md-4" id="lokasi">
          <div class="box">
            <div class="box-header"><h4>Ubah Data Lokasi Saat ini</h4></div>
            <div class="box-body">
              <?php
                if($this->uri->segment(3)!=""){ 
                  if($this->uri->segment(3)=="sukses"){
                    $status="success";
                    $info="Berhasil Melakukan Perubahan Data!";  
                  }else{
                    $status="danger";
                    $info="Gagal Melakukan Perubahan Data!";  
                  }
                ?>
              <div id="status" class="callout callout-<?=$status?>">
                <?=$info?>
              </div>
              <?php }?>
              <form action="<?=base_url();?>master/ubah_lokasi" method="post">
                <table class="table" width="100%">
                  <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td>
                      <select name="provinsi" class="form-control">
                      <?php 
                        foreach($data_provinsi as $row){
                          if($row->id_provinsi==$this->session->userdata('provinsi')){
                            echo "<option value='".$row->id_provinsi."' selected>".$row->provinsi."</option>";
                          }else{
                          echo "<option value='".$row->id_provinsi."'>".$row->provinsi."</option>";
                        }
                        }
                      ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Kabupaten</td>
                    <td>:</td>
                    <td>
                      <select name="kabupaten" class="form-control">
                      <?php 
                        foreach($data_kabupaten as $row){
                          if($row->id_kabupaten==$this->session->userdata('kabupaten')){
                            echo "<option value='".$row->id_kabupaten."' selected>".$row->kabupaten."</option>";
                          }else{
                          echo "<option value='".$row->id_kabupaten."'>".$row->kabupaten."</option>";
                          }
                        }
                      ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" width="100%" align="right">
                      <input type="submit" class="btn btn-primary" value="Ganti">
                    </td>
                  </tr>
                </table>

              </form>
            </div>
            <div class="box-footer"></div>
          </div>
        </div> -->
        <div class="col-md-4">
          <div class="box">
            <div class="box-header"><h4>Ubah Data BKPH</h4></div>
            <div class="box-body">
              <?php
                if($this->uri->segment(3)!=""){ 
                  if($this->uri->segment(3)=="sukses"){
                    $status="success";
                    $info="Berhasil Melakukan Perubahan Data!";  
                  }else{
                    $status="danger";
                    $info="Gagal Melakukan Perubahan Data!";  
                  }
                ?>
              <div id="status" class="callout callout-<?=$status?>">
                <?=$info?>
              </div>
              <?php }?>
              <form action="<?=base_url();?>master/ubah_bkph" method="post">
                <table class="table" width="100%">
                  <tr>
                    <td>UNIT KPH</td>
                    <td>:</td>
                    <td>
                      <input type="text" name="unit_kph" value="<?=$kph_unit?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td>BKPH</td>
                    <td>:</td>
                    <td>

                      <select name="bkph" class="form-control">
                      <?php 
                        foreach($list_kph as $row){

                          if($row->id_kph==$this->session->userdata('kph')){
                            echo "<option value='".$row->id_kph."' selected>".$row->kph."</option>";
                          }else{
                          echo "<option value='".$row->id_kph."'>".$row->kph."</option>";
                          }
                        }
                      ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" width="100%" align="right">
                      <input type="submit" class="btn btn-primary" value="Ganti">
                    </td>
                  </tr>
                </table>

              </form>
            </div>
            <div class="box-footer"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header"><h4>Wilayah KPH</h4></div>
            <div class="box-body">
              <img src="<?=base_url()?>img/Peta wilayah RPH.jpg" width="100%">
            </div>
            <div class="box-footer"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header"><h4>Data Pengguna</h4></div>
            <div class="box-body">
              <table class="table-striped" style="width:100%">
                <tr>
                  <td> Nama </td>
                  <td width="50s"> : </td>
                  <td> <?=$this->session->userdata('nama')?> </td>
                </tr>
                <tr>
                  <td> Email </td>
                  <td> : </td>
                  <td> <?=$this->session->userdata('email')?> </td>
                </tr>
                <tr>
                  <td> Unit KPH </td>
                  <td> : </td>
                  <td> <?=$kph_unit?> </td>
                </tr>
                <tr>
                  <td> KPH </td>
                  <td> : </td>
                  <td> <?=$kph?> </td>
                </tr>
              </table>
            </div>
            <div class="box-footer" style="color:red; font-size:.75em">
              *Hubungi admin terkait untuk perubahan data.
            </div>
          </div>
        </div>
        <!-- <div class="col-md-8">
          <div class="box">
            <div class="box-header"><h4>Lokasi</h4></div>
            <div class="box-body">
              <table class="table" style="width:100%">
                <tr>
                  <td>Provinsi</td>
                  <td>:</td>
                  <td><?=$provinsi?></td>
                </tr>
                <tr>
                  <td>Kabupaten</td>
                  <td>:</td>
                  <td><?=$kabupaten?></td>
                </tr>
              </table>
             </div>
            <div class="box-footer"></div>
          </div>
        </div> -->
      </div>
          
    </section>
    
  </div>
  <!-- /.content-wrapper -->
<script>
  setTimeout(function(){
    $('#status').fadeOut();
  },3000)
  $('#lokasi').hide();
</script>