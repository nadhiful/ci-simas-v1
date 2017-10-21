<!-- Main content --> 
<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" "btn btn-success">Tambah Data Agen</a></li>
                  <!-- <li><a href="#tab_2" data-toggle="tab" class="btn btn-success">Nasabah Saya</a></li>
                   -->
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                   <div class="box">
    <?php 
        $role = $this->session->userdata('levelUser');
        if ($role == "admin") { ?>
      <a href="#modalAddBarang" class="btn btn-success" data-toggle="modal">
        <i class="fa fa-align-left"></i> Tambah Data
      </a>
        <?php }
      ?>
      
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Agen</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
    
    if(isset($data)){
    foreach($data as $row){
    ?>
    <tr>
       
        <td><?=$row->id_agen ?></td>
        <td><?=$row->nama_agen ?></td>
        <td><?=$row->alamat?></td>
        <td>
        <?php 
            $id = $this->session->userdata('idUser');
            $pecah  = explode("-",$id);
            $hasil  = $pecah[0];
            if ($hasil == "ADM") { ?>
              <a href="#modalEditBarang<?php echo $row->id_agen?>" class="btn btn-primary" data-toggle="modal">
              <i class="fa fa-pencil"></i> Edit
              </a>
            <!-- <a class="btn btn-danger" href="<?php //echo site_url('Data_control/delete_agen/'.$row->id_agen);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a> -->
          <a href="#modalDetailBarang<?php echo $row->id_agen?>" class="btn btn-warning" data-toggle="modal">
          <i class="fa fa-eye"></i> Detail
          </a>
        </td>
            <?php }
            elseif ($hasil == "STF" || $hasil == "MNG") { ?>
              <a href="#modalDetailBarang<?php echo $row->id_agen?>" class="btn btn-warning" data-toggle="modal">
              <i class="fa fa-eye"></i> Detail
              </a>
        </td>
            <?php }
         ?>
          
    </tr>

    <?php }
    }
    ?>
          </tbody>
          <tr>
            <th>ID Agen</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
  </div><!-- /.box -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
            </div>
</section><!-- /.content -->
  
 <div id="modalAddBarang" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Agen</h4>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/add_agen')?>">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label"><?php echo $title_id; ?></label>
                  <div class="col-sm-7">
                    <input type="text" name="id_agen" class="form-control" placeholder="ID Polis" value="<?php echo $id_agen; ?>" readonly>
                  </div>
                </div>

               <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="nama" name="nama">
                  </div>
                </div>

              
                <div class="form-group">
                  <label class="control-label">Alamat</label>
                  <div class="col-sm-7">   
                   <textarea name="alamat" class="form-control pull-right"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Tempat</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control pull-right" id="tempat" name="tempat">
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Tanggal Lahir</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="tgl_lahir" name="tgl_lahir">
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Password</label>
                  <div class="col-sm-7">   
                    <input type="password" class="form-control pull-right" id="password" name="password">
                  </div>
                </div>            
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Tambah</button>
              </div>
              </form>
              <?php form_close(); ?>
            </div>
          </div>
        </div>
<!-- /=======================================================================================/ -->
 <?php
if (isset($data)){
    foreach($data as $row){
        ?>
        <div id="modalEditBarang<?php echo $row->id_agen?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Agen</h3>
            </div>
            <?php 
                $status = "admin_sess";
             ?>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/update_agen/'.$status)?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID Agen</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_agen" type="text" value="<?php echo $row->id_agen;?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nama Agen</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_nama" type="text" value="<?php echo $row->nama_agen;?>">
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_alamat" type="text" value="<?php echo $row->alamat;?>">
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Tempat</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_tempat" type="text" value="<?php echo $row->tempat;?>">
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Tanggal Lahir</label>
                        <div class="col-sm-7">
                         <?php
                          $date = $row->tanggal;
                          $res = date("m-d-Y",strtotime($date));
                        ?>
                          <input class="form-control" id="kd_lahir" name="kd_lahir" type="text" value="<?php echo $res;?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_password" type="password" value="<?php echo $row->password;?>">
                        </div>
                    </div>
                     
                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
               </form>
            </div>
        </div>
        </div>
    <?php }
}
?>
  <!-- /=======================================================================================/ -->
 <?php
if (isset($data)){
    foreach($data as $row){
        ?>
        <div id="modalDetailBarang<?php echo $row->id_agen?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detail Data Agen</h3>
            </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/update_agen')?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID Agen</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_agen" type="text" value="<?php echo $row->id_agen;?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nama Agen</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_nama" type="text" value="<?php echo $row->nama_agen;?>" readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_alamat" type="text" value="<?php echo $row->alamat;?>" readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Tempat</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_tempat" type="text" value="<?php echo $row->tempat;?>" readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Tanggal Lahir</label>
                        <div class="col-sm-7">
                         <?php
                          $date = $row->tanggal;
                          $res = date("m-d-Y",strtotime($date));
                        ?>
                          <input class="form-control" id="kd_lahir" name="kd_lahir" type="text" value="<?php echo $res;?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_password" type="password" value="<?php echo $row->password;?>" readonly>
                        </div>
                    </div>
                     
                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-info">Update</button> -->
                </div>
               </form>
            </div>
        </div>
        </div>
    <?php }
}
?>
  <!-- /=======================================================================================/ -->

  <script>      
        //Date range picker
        $('#tgl_lahir,#kd_lahir').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
        });
  </script>
        <!-- Modal Delete Polis