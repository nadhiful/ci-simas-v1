<aside class="main-sidebar">
<?php 
  
    $role = $this->session->userdata('levelUser');
    if ($role == "admin") { ?>
        <?php if($this->session->userdata('namaUser')): ?>
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('namaUser'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            <a href="<?php echo site_url('Admin'); ?>">
                <i class="fa fa-home"></i>
                <span>Home</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url(''); ?>">
                <i class="fa fa-pie-chart"></i>
                <span>Data Nasabah</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('Admin/view_nasabah'); ?>"><i class="fa fa-circle-o"></i> List Seluruh Nasabah</a></li>
                <!-- <li><a href="<?php //echo site_url('Admin/nasabah_baru'); ?>"><i class="fa fa-circle-o"></i> Nasabah Baru</a></li>
                <li><a href="<?php //echo site_url('Admin/existed_nasabah'); ?>"><i class="fa fa-circle-o"></i> Nasabah Lama</a></li> -->
              </ul>
            </li>
           
           <li class="treeview">
            <a href="<?php echo site_url('Admin/view_agen'); ?>">
                <i class="fa fa-users"></i>
                <span>Data Agen</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url('Admin/view_polis'); ?>">
                <i class="fa fa-th"></i>
                <span>Data Polis</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url('Admin/view_staff'); ?>">
                <i class="fa fa-table"></i>
                <span>Data Staff</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>


           <!--  <li class="treeview">
            <a href="<?php echo site_url('Admin/view_transaksi'); ?>">
                <i class="fa fa-pencil"></i>
                <span>Data Transaksi</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
 -->
            <li class="treeview">
            <a href="<?php echo site_url('Admin/view_user'); ?>">
                <i class="fa fa-book"></i>
                <span>Data User</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url('Admin/view_produk'); ?>">
                <i class="fa fa-gear"></i>
                <span>Data Produk</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      <?php endif; ?>

    <?php }

    elseif ($role == "agen") { ?>
      <?php if($this->session->userdata('namaUser')): ?>
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('namaUser'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            <a href="<?php echo site_url('Agen'); ?>">
                <i class="fa fa-home"></i>
                <span>Home</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url(''); ?>">
                <i class="fa fa-pie-chart"></i>
                <span>Data Nasabah</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('Agen/nasabah_baru'); ?>"><i class="fa fa-circle-o"></i> Nasabah Baru</a></li>
                <li><a href="<?php echo site_url('Agen/existed_nasabah'); ?>"><i class="fa fa-circle-o"></i> Nasabah</a></li>
                <!-- <li><a href="<?php //echo site_url('Agen/report'); ?>"><i class="fa fa-circle-o"></i> Laporan Nasabah</a></li> -->

              </ul>
            </li>
            
             <li class="treeview">
            <a href="<?php echo site_url('Agen/view_transaksi'); ?>">
                <i class="fa fa-pencil"></i>
                <span>Data Transaksi</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

        </section>
        <!-- /.sidebar -->
      <?php endif; ?>


    <?php }
    elseif ($role == "manajer") { ?>
      <?php if($this->session->userdata('namaUser')): ?>
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('namaUser'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            <a href="<?php echo site_url('Manajer'); ?>">
                <i class="fa fa-home"></i>
                <span>Home</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url(''); ?>">
                <i class="fa fa-pie-chart"></i>
                <span>Data Nasabah</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('Manajer/view_nasabah'); ?>"><i class="fa fa-circle-o"></i> List Seluruh Nasabah</a></li>
                <!-- <li><a href="<?php //echo site_url('Admin/nasabah_baru'); ?>"><i class="fa fa-circle-o"></i> Nasabah Baru</a></li>
                <li><a href="<?php //echo site_url('Admin/existed_nasabah'); ?>"><i class="fa fa-circle-o"></i> Nasabah Lama</a></li> -->
              </ul>
            </li>
           
           <li class="treeview">
            <a href="<?php echo site_url('Manajer/view_agen'); ?>">
                <i class="fa fa-users"></i>
                <span>Data Agen</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url('Manajer/view_polis'); ?>">
                <i class="fa fa-th"></i>
                <span>Data Polis</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url('Manajer/view_staff'); ?>">
                <i class="fa fa-table"></i>
                <span>Data Staff</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>


           <li class="treeview">
            <a href="<?php echo site_url(''); ?>">
                <i class="fa fa-pie-chart"></i>
                <span>Data Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('Manajer/view_transaksi'); ?>"><i class="fa fa-circle-o"></i> List Transaksi</a></li>
                <li><a href="<?php echo site_url('Manajer/view_report'); ?>"><i class="fa fa-circle-o"></i> Filter Data</a></li>
                <!-- <li><a href="<?php //echo site_url('Admin/existed_nasabah'); ?>"><i class="fa fa-circle-o"></i> Nasabah Lama</a></li> -->
              </ul>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url('Manajer/view_user'); ?>">
                <i class="fa fa-book"></i>
                <span>Data User</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url('Manajer/view_produk'); ?>">
                <i class="fa fa-gear"></i>
                <span>Data Produk</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      <?php endif; ?>

      <?php }
    elseif ($role == "nasabah") { ?>
      <?php if($this->session->userdata('namaUser')): ?>
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('namaUser'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            <a href="<?php echo site_url('Nasabah'); ?>">
                <i class="fa fa-home"></i>
                <span>Home</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url('Nasabah/view_transaksi'); ?>">
                <i class="fa fa-pie-chart"></i>
                <span>Riwayat Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
        </section>
        <!-- /.sidebar -->
      <?php endif; ?>
    
    <?php }
    elseif ($role == "staff") { ?>
      <?php if($this->session->userdata('namaUser')): ?>
        <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('namaUser'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            <a href="<?php echo site_url('Admin'); ?>">
                <i class="fa fa-home"></i>
                <span>Home</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url(''); ?>">
                <i class="fa fa-pie-chart"></i>
                <span>Data Nasabah</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('Admin/view_nasabah'); ?>"><i class="fa fa-circle-o"></i> List Seluruh Nasabah</a></li>
                <!-- <li><a href="<?php //echo site_url('Admin/nasabah_baru'); ?>"><i class="fa fa-circle-o"></i> Nasabah Baru</a></li>
                <li><a href="<?php //echo site_url('Admin/existed_nasabah'); ?>"><i class="fa fa-circle-o"></i> Nasabah Lama</a></li> -->
              </ul>
            </li>
           
           <li class="treeview">
            <a href="<?php echo site_url('Admin/view_agen'); ?>">
                <i class="fa fa-users"></i>
                <span>Data Agen</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
          <li class="treeview">
            <a href="<?php echo site_url('Staff/view_transaksi'); ?>">
                <i class="fa fa-pie-chart"></i>
                <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      <?php endif; ?>

      

    <?php }
?>

      
</aside>
