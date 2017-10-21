 <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-5">

              <!-- Profile Image -->
                <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('asset/dist/img/user4-128x128.jpg'); ?>" alt="User profile picture">
                  <?php 

                    if (isset($user)) { 
                      foreach ($user as $row ) { ?>
                          <h3 class="profile-username text-center"><?php echo $row->nama; ?></h3>
                          <p class="text-muted text-center"><?php echo $row->id_nasabah; ?></p>

                          <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                              <b>Alamat</b> <a class="pull-right"><?php echo $row->alamat; ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Nama Agen</b> <a class="pull-right"><?php echo $row->nama_agen; ?></a>
                            </li>
                          </ul>

                          <a href="#modalEditBarang<?php echo $row->id_nasabah?>" class="btn btn-primary btn-block" data-toggle="modal">
                          <i class="fa fa-pencil"></i> Ubah
                          </a>
                        </div><!-- /.box-body -->
                      </div><!-- /.box -->
                      <?php }
                    }
                   ?>              
                      </div><!-- /.col -->
        
 <div class="col-md-7">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li><a href="#settings" data-toggle="tab">Data Transaksi</a></li>
                </ul>
                <div class="tab-content">
          

                  <div class="tab-pane" id="settings">
                     <div class="box">
    <div class="box-header">
     
      
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Pembayaran</th>
              <th>Nama Nasabah</th>
              <th>Nama Asuransi</th>
              <th>Tanggal Bayar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
    
    if(isset($data)){
    foreach($data as $row){
    ?>
    <tr>
       
        <td><?=$row->id_pembayaran ?></td>
        <td><?=$row->nama ?></td>
        <td><?=$row->nama_produk ?></td>
        <td><?=$row->tgl_transaksi?></td>
        <td>
           <a class="btn btn-primary" href="<?php echo site_url('Nasabah/detail_transaksi/'.$row->id_pembayaran)?>">
                        <i class="fa fa-eye"></i> Lihat</a>
        </td>
    </tr>

    <?php }
    }
    ?>
          </tbody>
          <tr>
              <th>ID Pembayaran</th>
              <th>ID Nasabah</th>
              <th>Nama</th>
              <th>Tanggal Bayar</th>
              <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
  </div><!-- /.box -->
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
  <?php
if (isset($user)){
    foreach($user as $row){
        ?>
        <div id="modalEditBarang<?php echo $row->id_nasabah?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Nasabah</h3>
            </div>
            <?php 
                $role = 'nasabah_sess'
             ?>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/update_nasabah/'.$role)?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID Nasabah</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_nasabah" type="text" value="<?php echo $row->id_nasabah;?>" readonly>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="kd_nama" name="kd_nama"value="<?php echo $row->nama?>">
                  </div>
                </div>
                
                <?php
                  $date = $row->tgl_mulai;
                  $res = date("m-d-Y",strtotime($date));
                  ?>
              <div class="form-group">
                  <label class="control-label">Tanggal Mulai</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="tgl_mulai1" name="tgl_mulai1" value="<?php echo $res;?>" disabled>
                  </div>
                </div>            
             

              <?php
                  $date2 = $row->tgl_habis;
                  $res2 = date("m-d-Y",strtotime($date2));
                  ?>
              <div class="form-group">
                  <label class="control-label">Tanggal Akhir</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="tgl_akhir1" name="tgl_akhir1" value="<?php echo $res2;?>" disabled>
                  </div>
                </div>            
                  <div class="form-group">
                  <label class="control-label">Jenis Pembayaran</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="kd_bayar">
                    <option value="<?php echo $row->id_bayar?>" selected><?php echo $row->nama_bayar?></option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Jenis Asuransi</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="kd_produk">
                    <option value="<?php echo $row->id_produk?>" selected><?php echo $row->nama_produk?></option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Alamat</label>
                  <div class="col-sm-7">   
                  <input type="text" class="form-control pull-right" id="kd_alamat" name="kd_alamat" value="<?php echo $row->alamat;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Telepon</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control pull-right" id="kd_telepon" name="kd_telepon" value="<?php echo $row->telepon;?>">
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Email</label>
                  <div class="col-sm-7">   
                    <input type="mail" class="form-control pull-right" id="kd_mail" name="kd_mail" value="<?php echo $row->email;?>">
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Password</label>
                  <div class="col-sm-7">   
                    <input type="password" class="form-control pull-right" id="kd_password" name="kd_password" value="<?php echo $row->password;?>">
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
}?>
<!-- /=======================================================================================/ -->
 
   <script>
        //Date range picker
        $('#tgl_mulai1,#tgl_akhir1,#kd_lahir').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
        });
        $('#tgl_mulai2,#tgl_habis2').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
        });
  </script>

  <script type="text/javascript">
       $("#nasabah").change(function(){
            var nasabah = $("#nasabah").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('Admin/get_detail_nasabah'); ?>",
                data: "nasabah="+nasabah,
                cache:false,
                success: function(data){
                    $('#detail_nasabah').html(data);
                }
            });
        });

  </script>