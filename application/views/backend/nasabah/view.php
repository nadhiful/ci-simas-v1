<!-- Main content --> 
<section class="content">
  <div class="box">
    <div class="box-header">
    <?php 
            $id   = $this->session->userdata('idUser');
            $pecah  = explode("-",$id);
            $hasil  = $pecah[0];
            if ($hasil == 'ADM') { ?>
              <a href="#modalAddBarang" class="btn btn-success" data-toggle="modal">
              <i class="fa fa-align-left"></i> Tambah Data
              </a>
            <?php }
    ?>
      
      
      </div><!-- /.box-header -->
         
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Nasabah</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Jumlah Angsuran</th>
              <th>Bayar Angsuran</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
    
    if(isset($data)){
    foreach($data as $row){
    ?>
    <tr>
       
        <td><?=$row->id_nasabah ?></td>
        <td><?=$row->nama ?></td>
        <td><?=$row->alamat?></td>
        <td><?=$row->angsuran?></td>
       <td> 
       <?php
          foreach ($bayar as $by) {
            if ($row->id_nasabah == $by['id_nasabah']) {
                echo $by['bayar'];
            }else {}
          }
    
      ?></td>
       <td> 
       <?php
       foreach ($bayar as $by) {

           if ($row->id_nasabah == $by['id_nasabah']) {
                  $date1=date_create($row->tgl_mulai);
                  $date2=date_create($row->tgl_habis);
                  $diff=date_diff($date1,$date2);
                if ($row->id_bayar == 1) {
                  $hasil =  $diff->format('%m');
                    if ($by['bayar'] == $hasil) {
                        echo "<a class='btn btn-success  btn-xs'>Lunas</a>";
                    }else {
                      echo "<a class='btn btn-danger btn-xs'>Belum Lunas</a>";
                    }
                } else if($row->id_bayar == 2){
                      $hasil = $diff->format("%m") / 3;
                    if ($by['bayar'] == $hasil) {
                      echo "<a class='btn btn-success  btn-xs'>Lunas</a>";
                    }else {
                      echo "<a class='btn btn-danger btn-xs'>Belum Lunas</a>";
                    }
                 } else if($row->id_bayar == 3){
                      $hasil = $diff->format("%m") / 6;
                    if ($by['bayar'] == $hasil) {
                      echo "<a class='btn btn-success  btn-xs'>Lunas</a>";
                    }else {
                      echo "<a class='btn btn-danger btn-xs'>Belum Lunas</a>";
                    }
                 } else {
                      $hasil = $diff->format("%y");
                    if ($by['bayar'] == $hasil) {
                      echo "<a class='btn btn-success  btn-xs'>Lunas</a>";
                    }else {
                      echo "<a class='btn btn-danger btn-xs'>Belum Lunas</a>";
                    }
                 }
      
      }else {} 
      }
    
      ?></td>
        <td>
        
        <?php 
            $id   = $this->session->userdata('idUser');
            $pecah  = explode("-",$id);
            $hasil  = $pecah[0];
            if ($hasil == "ADM") { ?>
                <a href="#modalEditBarang<?php echo $row->id_nasabah?>" class="btn btn-primary" data-toggle="modal">
        <i class="fa fa-pencil"></i> Edit
      </a>
            <a class="btn btn-danger" href="<?php echo site_url('Data_control/delete_nasabah/'.$row->id_nasabah);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a>
          <a href="#modalDetailBarang<?php echo $row->id_nasabah?>" class="btn btn-warning" data-toggle="modal">
        <i class="fa fa-eye"></i> Detail
      </a>
        </td>
            <?php } elseif ($hasil == "STF" || $hasil == "MNG") { ?>
                  <a href="#modalDetailBarang<?php echo $row->id_nasabah?>" class="btn btn-warning" data-toggle="modal">
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
            <th>ID Nasabah</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jumlah Angsuran</th>
            <th>Bayar Angsuran</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
  
 <div id="modalAddBarang" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Nasabah</h4>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/add_nasabah')?>">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label"><?php echo $title_id; ?></label>
                  <div class="col-sm-7">
                    <input type="text" name="id_nasabah" class="form-control" placeholder="ID Polis" value="<?php echo $id_nasabah; ?>" readonly>
                  </div>

                </div>

               <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="nama" name="nama">
                  </div>
                </div>
              
              <div class="form-group">
                  <label class="control-label">Gender</label>
                  <div class="col-sm-7">   
                    <select name="gender" id="gender" class="form-control">
                        <option value="L">Laki-Laki</option> 
                        <option value="P">Perempuan</option> 
                    </select>
                  </div>
                </div>            
                
              <div class="form-group">
                  <label class="control-label">Usia</label>
                  <div class="col-sm-7">   
                    <input type="text" name="usia" class="form-control" id="usia">
                  </div>
                </div>            
                
               <div class="form-group">
                  <label class="control-label">Cara Pembayaran</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="j_bayar">
                      <option selected="">-</option>
                      <?php foreach ($id_bayar as $key):?>
                      <option value="<?=$key->id_bayar?>"><?=$key->nama_bayar?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Jenis Asuransi</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="j_produk">
                      <option selected="">-</option>
                      <?php foreach ($produk as $key2):?>
                      <option value="<?=$key2->id_produk?>"><?=$key2->nama_produk?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Nama Agen</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="j_agen">
                      <option selected="">-</option>
                      <?php foreach ($id_agen as $key3):?>
                      <option value="<?=$key3->id_agen?>"><?=$key3->nama_agen?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="control-label">Alamat</label>
                  <div class="col-sm-7">   
                   <textarea name="alamat" class="form-control pull-right"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Telepon</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control pull-right" id="telepon" name="telepon">
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Email</label>
                  <div class="col-sm-7">   
                    <input type="mail" class="form-control pull-right" id="mail" name="mail">
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Password</label>
                  <div class="col-sm-7">   
                    <input type="password" class="form-control pull-right" id="password" name="password">
                  </div>
                </div>

          <!-- <div class="form-group">
                  <label class="control-label">Nominal</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="nominal" name="nominal">
                  </div>
                </div> -->
              

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

<?php
if (isset($data)){
    foreach($data as $row){
        ?>
        <div id="modalEditBarang<?php echo $row->id_nasabah?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Nasabah</h3>
            </div>
            <?php 
                $role = 'admin_sess'
             ?>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/update_nasabah/'.$role)?>">
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
                    <select class="form-control" name="kd_bayar" disabled>
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
                    <select class="form-control" name="kd_produk" disabled>
                    <?php foreach ($produk as $key2) :?>
                    <option value="<?php echo $key2->id_produk?>"><?php echo $key2->nama_produk?></option>
                    <?php endforeach; ?>
                    <option value="<?php echo $row->id_produk?>" selected><?php echo $row->nama_produk?></option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Nama Agen</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="kd_agen" disabled>
                    <?php foreach ($id_agen as $key3) :?>
                    <option value="<?php echo $key3->id_agen?>"><?php echo $key3->nama_agen?></option>
                    <?php endforeach; ?>
                    <option value="<?php echo $row->id_agen?>" selected><?php echo $row->nama_agen?></option>
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

            <div class="form-group">
                  <label class="control-label">Nominal</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id=kd_"nominal" name="kd_nominal" value="<?php echo $row->nominal;?>" disabled>
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

 <?php
if (isset($data)){
    foreach($data as $row){
        ?>
        <div id="modalDetailBarang<?php echo $row->id_nasabah?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                  <label class="control-label">Nama Nasabah</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="kd_nama" name="kd_nama"value="<?php echo $row->nama?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Nama Agen</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="kd_agen" name="kd_agen"value="<?php echo $row->nama_agen?>"readonly>
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
                  <label class="control-label">Angsuran</label>
                  <div class="col-sm-7">   
                  <input type="text" class="form-control pull-right" id="kd_angsuran" name="kd_angsuran" value="<?php echo $row->angsuran;?>" readonly>
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
              <div class="form-group">
                  <label class="control-label">Nominal</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id=kd_"nominal" name="kd_nominal" value="<?php echo $row->nominal;?>" readonly>
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
    <?php }
}?>
<!-- /=======================================================================================/ -->

  <script>      
        //Date range picker
        $('#tgl_mulai,#tgl_akhir,#tgl_mulai1,#tgl_akhir1').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
        });
  </script>
        <!-- Modal Delete Polis