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
          <a href="<?=base_url()?>">
            <i class="fa fa-dashboard"></i> 
            <span>Dashboard</span>
          </a>       
        </li>
        <li class="treeview">
          <a href="<?=base_url()?>view">
            <i class="fa fa-bug"></i> 
            <span>Signature</span>
          </a>       
        </li>
        
      </ul>
    </section>
  </aside>