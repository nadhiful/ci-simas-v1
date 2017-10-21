<!-- Main content --> 
<section class="content">
  <?php 
      if (isset($data)) {
        if ($data == FALSE) { ?>
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-default">
                    <div class="box-body">
                      <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                      Anda belum mempunyai nasabah baru.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        <?php }
        else { ?>
              
     <div class="box">
    <div class="box-header"> 
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Nasabah</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
        <?php foreach ($data as $row ) { ?>
              
        <tr>
        <td><?=$row->id_nasabah ?></td>
        <td><?=$row->nama ?></td>
        <td><?=$row->alamat?></td>
        <td><a href="#" class="btn btn-success" data-toggle="modal"><i class="fa fa-check"></i> Nasabah Baru  </a></td>
        <td>
          <a href="#modalDetailNasabah<?php echo $row->id_nasabah?>" class="btn btn-primary" data-toggle="modal">
        <i class="fa fa-eye"></i> Detail
          </a>
          <a class="btn btn-primary" href="<?php echo site_url('Data_control/nasabah_saya/'.$row->id_nasabah);?>"
               onclick="return confirm('Anda menambahkan nasabah ini sebagai nasabah Anda?')"> <i class="fa fa-plus"></i> Konfirmas
          </a>
        </td>
    </tr>

<div id="modalDetailNasabah<?php echo $row->id_nasabah?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detail Data Nasabah</h3>
            </div>
              <form class="form-horizontal" method="post" action="">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><?php echo $title_id; ?></label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_nasabah" type="text" value="<?php echo $row->id_nasabah;?>" readonly>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="kd_nama" name="kd_nama"value="<?php echo $row->nama?>"readonly>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="control-label">Jenis Pembayaran</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="kd_bayar" readonly>
                    <?php foreach ($id_bayar as $key1) :?>
                    <option value="<?php echo $key1->id_bayar?>"><?php echo $key1->nama_bayar?></option>
                    <?php endforeach; ?>
                    <option value="<?php echo $row->id_bayar?>" selected><?php echo $row->nama_bayar?></option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Jenis Asuransi</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="kd_produk" readonly>
                    <?php foreach ($produk as $key2) :?>
                    <option value="<?php echo $key2->id_produk?>"><?php echo $key2->nama_produk?></option>
                    <?php endforeach; ?>
                    <option value="<?php echo $row->id_produk?>" selected><?php echo $row->nama_produk?></option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Alamat</label>
                  <div class="col-sm-7">   
                  <input type="text" class="form-control pull-right" id="kd_alamat" name="kd_alamat" value="<?php echo $row->alamat;?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Telepon</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control pull-right" id="kd_telepon" name="kd_telepon" value="<?php echo $row->telepon;?>" readonly>
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Email</label>
                  <div class="col-sm-7">   
                    <input type="mail" class="form-control pull-right" id="kd_mail" name="kd_mail" value="<?php echo $row->email;?>" readonly>
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Password</label>
                  <div class="col-sm-7">   
                    <input type="password" class="form-control pull-right" id="kd_password" name="kd_password" value="<?php echo $row->password;?>" readonly>
                  </div>
                </div>            
          
              <?php
                  $date = $row->tgl_mulai;
                  $res = date("m-d-Y",strtotime($date));
                  ?>
              <div class="form-group">
                  <label class="control-label">Tanggal Mulai</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="tgl_mulai1" name="tgl_mulai1" value="<?php echo $res;?>">
                  </div>
                </div>            

              <?php
                  $date2 = $row->tgl_habis;
                  $res2 = date("m-d-Y",strtotime($date2));
                  ?>
              <div class="form-group">
                  <label class="control-label">Tanggal Akhir</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="tgl_akhir1" name="tgl_akhir1" value="<?php echo $res2;?>">
                  </div>
                </div>            

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
               </form>
            </div>
        </div>
        </div>
            <?php }  ?>
    </tbody>
          <tr>
            <th>ID Nasabah</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
  </div><!-- /.box -->

        <?php }

      }
   ?>


<!-- /=======================================================================================/ -->
</section>
  <script>      
        //Date range picker
        $('#tgl_mulai,#tgl_akhir,#tgl_mulai1,#tgl_akhir1').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
        });
  </script>
        <!-- Modal Delete Polis