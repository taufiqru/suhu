  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?=base_url()?>img/img_avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('username');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">Navigasi</li>
        <li class="treeview">
          <a href="<?=base_url()?>main">
            <i class="fa fa-home"></i> 
            <span>Home</span>
          </a>       
        </li>
        <?php
        $level=$this->session->userdata('level_akses');
        $this->db->where("$level",'Allow');
        $folder=$this->db->get('folder')->result_array();
        
        if(count($folder)>0){
          for($i=0;$i<count($folder);$i++){
            $this->db->where('id_folder',$folder[$i]['id_folder']);
            $this->db->where("$level",'Allow');
            $subfolder=$this->db->get('subfolder')->result_array(); 
            //echo $folder[$i]['id_folder'];
            if(count($subfolder)>0){
              ?>
              <li class="treeview">
                <a href="#"><i class="fa fa-file"></i> <span><?=$folder[$i]['folder']?></span>            
                </a>
                <ul class="treeview-menu">
                  <?php 
                    for($j=0;$j<count($subfolder);$j++){
                      ?>
                      <li>
                        <a href="<?=base_url()?><?=$subfolder[$j]['url']?>">
                          <i class="fa fa-circle-o"></i> <?=$subfolder[$j]['subfolder']?>
                        </a>
                      </li>
                      <?php
                    }  
                  ?>
                </ul>                 
              </li>
              <?php
            }else{
              ?>
              <li class="treeview">
                <a href="<?=base_url()?><?=$folder[$i]['url']?>"><i class="fa fa-file"></i> <span><?=$folder[$i]['folder']?></span>            
                </a>                 
              </li>
              <?php
            }
          }
        }
        ?>

        <li class="treeview">
          <a href="<?=base_url();?>index.php/login/logout">
            <i class="fa   fa-power-off"></i> 
            <span>Logout</span>
          </a>          
        </li>
      </ul>
    </section>
  </aside>