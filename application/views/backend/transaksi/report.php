<!-- Main content --> 
<section class="content">
  <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active">
                  <a href="#tab_1" data-toggle="tab" class="btn btn-success">Transaksi</a></li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                <div class="box">
                <div class="box-header">
    <?php 
        $role = $this->session->userdata('levelUser');
        if ($role == "manajer") { ?>
        <form method="post" action="<?php echo site_url('Data_control/ekspor/'.$role)?>">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <select name="bulan" id="bulan" class="form-control">
                          <?php
                          $bln=array(
                                      1   =>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember"
                                    );
                          for($bulan=1; $bulan<=12; $bulan++){
                          if($bulan<=9) {
                           echo "<option value='0$bulan'>$bln[$bulan]</option>"; }
                          else { 
                            echo "<option value='$bulan'>$bln[$bulan]</option>"; }
                          }
                          ?>
                        </select>
                      </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-3">
                      <div class="form-group">
                        <select name="tahun" id="tahun" class="form-control">
                          <?php
                            for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                            echo"<option value='$i'> $i </option>";
                            }
                            ?>
                        </select>
                      </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-3"> 
                        <div class="form-group">
                          <button type="submit" class="btn btn-info">Cari</button>
                        </div>
                    </div>
                  </div><!-- /.row -->
              </form>

      
        <?php }
        elseif ($role == "nasabah"  || $role == "agen" || $role == "manajer" ) {
          # code...
        }
     ?>
      
      </div><!-- /.box-header -->
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
                <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/ekspor/')?>">
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