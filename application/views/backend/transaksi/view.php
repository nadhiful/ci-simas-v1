<!-- Main content --> 
<section class="content">
  <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" class="btn btn-success">Transaksi</a></li>
                  <?php 

                    $role = $this->session->userdata('levelUser');
                    if ($role == "admin" || $role == "staff"){ ?>
                       <!--  <li><a href="#tab_2" data-toggle="tab" class="btn btn-success">Filter Data</a></li> -->
                    <?php }
                    elseif($role == "manajer"){ ?>
                        <!-- <li><a href="#tab_2" data-toggle="tab" class="btn btn-success">Filter Data</a></li> -->
                    <?php }
                   ?>
                  
                </ul>
                <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                <div class="box">
                <div class="box-header">
    <?php 
        $role = $this->session->userdata('levelUser');
        if ($role == "admin" || $role == "staff") { ?>
      <a href="#modalAddBarang" class="btn btn-success" data-toggle="modal">
        <i class="fa fa-align-left"></i> Tambah Data
      </a>
      
      <a href="#modalLaporan" class="btn btn-success" data-toggle="modal">
        <i class="fa fa-align-right"></i> Ekspor Data ke Excel
      </a>

      
        <?php }
        elseif ($role == "nasabah"  || $role == "agen" || $role == "manajer" ) {
          # code...
        }
     ?>
      
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
        <?php 

          $role  = $this->session->userdata('levelUser');
          
          if ($role == "admin") { ?>
            <a class="btn btn-primary" href="<?php echo site_url('Admin/detail_transaksi/'.$row->id_pembayaran)?>">
           <i class="fa fa-eye"></i> Lihat</a>
           <a class="btn btn-danger" href="<?php echo site_url('Data_control/delete_transaksi/'.$row->id_pembayaran);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a>
           <a class="btn btn-success btnPrint" href="<?php echo site_url('Admin/print_transaksi/'.$row->id_pembayaran)?>">
            <i class="fa fa-print"></i> Print</a> 
          
          <!-- Cek e gak bingung  -->
          
          <?php }
          elseif ($role == "agen" || $role == "manajer") { ?>
            
             <a class="btn btn-primary" href="<?php echo site_url('Agen/detail_transaksi/'.$row->id_pembayaran)?>">
                        <i class="fa fa-eye"></i> Lihat</a>
           <a class="btn btn-danger btnPrint" href="<?php echo site_url('Agen/print_transaksi/'.$row->id_pembayaran)?>">
            <i class="fa fa-print"></i> Print</a> 

          <!-- Cek e gak bingung  -->
          
          <?php }
          elseif ($role == "nasabah") { ?>
            <a class="btn btn-primary" href="<?php echo site_url('Nasabah/detail_transaksi/'.$row->id_pembayaran)?>">
                        <i class="fa fa-eye"></i> Lihat</a>
           <a class="btn btn-danger btnPrint" href="<?php echo site_url('Nasabah/print_transaksi/'.$row->id_pembayaran)?>">
            <i class="fa fa-print"></i> Print</a> 
          <!-- Cek e gak bingung  -->
          
          <?php }

          elseif ($role == "staff") { ?>
            <a class="btn btn-primary" href="<?php echo site_url('Staff/detail_transaksi/'.$row->id_pembayaran)?>">
                        <i class="fa fa-eye"></i> Lihat</a>
           <a class="btn btn-danger btnPrint" href="<?php echo site_url('Staff/print_transaksi/'.$row->id_pembayaran)?>">
            <i class="fa fa-print"></i> Print</a>
          <a class="btn btn-danger" href="<?php echo site_url('Data_control/delete_transaksi/'.$row->id_pembayaran);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a> 
           
          <?php }
         ?>
          <!-- Cek e gak bingung  -->
           
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
          </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
  </div><!-- /.box -->
  </div><!-- /.tab-pane 1 -->
    </div>

  </div><!-- /.tab-content  -->
</section><!-- /.content -->
          <div id="modalAddBarang" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Transaksi</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/add_transaksi')?>">
                <div class="form-group">
                  <label class="control-label">ID Polis</label>
                  <div class="col-sm-7">
                    <input type="text" name="id_trans" class="form-control" placeholder="ID Transaksi" value="<?php echo $id_trans; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Nama Agen</label>
                  <div class="col-sm-7">
                  <select name="agen" id="agen" class="form-control">
                  <option value="0" selected="">-Select Agen-</option>
                  <?php 
                    foreach ($agen_transaksi as $row) { ?>
                    <option value="<?php echo $row->id_agen; ?>"><?php echo $row->nama; ?></option>
                    <?php }
                    ?>
                    </select>
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Nama Nasabah</label>
                  <div class="col-sm-7">
                  <select name="nasabah" id="nasabah" class="form-control">
                 
                  </select>
                  </div>
                </div>

              <div class="form-group" >
                <label class="control-label">Alamat</label>
                  <div class="col-sm-7" id="alamat">
                  
                  </div>
              </div>
             
             <div class="form-group" >
                <label class="control-label">Produk</label>
                  <div class="col-sm-7" id="produk">
                  
                  </div>
              </div>
              <div class="form-group" >
                <label class="control-label">Email</label>
                  <div class="col-sm-7" id="email">
                  
                  </div>
              </div>

              <div class="form-group" >
                <label class="control-label">Nominal</label>
                  <div class="col-sm-7" id="nominal">
                  
                  </div>
              </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Tambah</button>
              </div>
              </form>
            </div>
          </div>
        </div>

      

        <!-- Ekspor Data -->
        <div id="modalLaporan" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ekspor Data</h4>
              </div>
              <div class="modal-body">
              <?php 
                $trigger = "biasa";
              ?>
                <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/ekspor/'.$trigger)?>">
                  <div class="form-group">
                  <label class="control-label">Tanggal Pertama</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control pull-right" id="tgl_pertama" name="tgl_pertama">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Tanggal Terakhir</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control pull-right" id="tgl_terakhir" name="tgl_terakhir">
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Ekspor</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<!-- /=======================================================================================/ -->
   <script>
        //Date range picker
        $('#tgl_mulai,#tgl_habis,#tgl_pertama,#tgl_terakhir').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
        });
        $('#tgl_mulai2,#tgl_habis2').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
        });
  </script>

  
<script>
        $(document).ready(function(){
            $("#agen").change(function (){
                var url = "<?php echo site_url('Admin/get_nasabah');?>/"+$(this).val();
                $('#nasabah').load(url);
                return false;
            })
            $("#nasabah").change(function (){
                var url = "<?php echo site_url('Admin/get_nasabah_alamat');?>/"+$(this).val();
                $('#alamat').load(url);
                return false;
            })
            $("#nasabah").change(function (){
                var url = "<?php echo site_url('Admin/get_nasabah_produk');?>/"+$(this).val();
                $('#produk').load(url);
                return false;
            })
            $("#nasabah").change(function (){
                var url = "<?php echo site_url('Admin/get_nasabah_nominal');?>/"+$(this).val();
                $('#nominal').load(url);
                return false;
            })
            $("#nasabah").change(function (){
                var url = "<?php echo site_url('Admin/get_nasabah_email');?>/"+$(this).val();
                $('#email').load(url);
                return false;
            })

        });
</script>