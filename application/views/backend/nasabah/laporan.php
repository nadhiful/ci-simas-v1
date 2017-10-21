<section class="content">
  <div class="box">
    <div class="box-header">
      
      </div><!-- /.box-header -->
      <div class="box-body">
       <h3 style="text-align: center">
    Lihat Laporan Penjualan Berdasarkan Nasabah dan Tanggal Yang Dipilih
</h3>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4">&nbsp;</div>
        <div class="span4 loader" style="text-align: center">
            <div class="progress progress-striped active" style="display: none">
                <div class="bar" style="width: 100%;"></div>
            </div>
        </div>
        <div class="span4">&nbsp;</div>
    </div>

    <div style="border-bottom: 1px #999 dashed; margin-bottom: 20px"></div>

    <div class="row-fluid">
        <div id="laporanPage">
            <?php 
                $role   = $this->session->userdata('levelUser');
                if ($role == "admin") { ?>
                
                <form class="form-horizontal" method="post" action="<?= site_url('Admin/cari')?>">

                 <div class="form-group">
                  <label class="control-label">Tanggal Mulai</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="tgl_mulai" name="tgl_mulai">
                  </div>
                </div>            
             

              <div class="form-group">
                  <label class="control-label">Tanggal Akhir</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="tgl_akhir" name="tgl_akhir">
                  </div>
                </div>
                
             <div class="form-group">
                  <label class="control-label">Daftar Nasabah</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="nasabah" id="nasabah">
                      <option selected="">-</option>
                      <?php foreach ($data_nasabah as $key2):?>
                      <option value="<?=$key2->id_nasabah?>"><?=$key2->nama?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>



                <div class="control-group">
                    <div class="controls">
                        <button id="btnCari" type="submit" class="btn btn-success"><i class="fa fa-white fa fa-search"></i> Search...</button>
                    </div>
                </div>
            </form>
        </div>
                <?php }
                elseif ($role == "agen") { ?>
                
                <form class="form-horizontal" method="post" action="<?= site_url('Agen/cari')?>">

                 <div class="form-group">
                  <label class="control-label">Tanggal Mulai</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="tgl_mulai" name="tgl_mulai">
                  </div>
                </div>            
             

              <div class="form-group">
                  <label class="control-label">Tanggal Akhir</label>
                  <div class="col-sm-7">   
                    <input type="text" class="form-control pull-right" id="tgl_akhir" name="tgl_akhir">
                  </div>
                </div>
                
             <div class="form-group">
                  <label class="control-label">Daftar Nasabah</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="nasabah" id="nasabah">
                      <option selected="">-</option>
                      <?php foreach ($data_nasabah as $key2):?>
                      <option value="<?=$key2->id_nasabah?>"><?=$key2->nama?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>



                <div class="control-group">
                    <div class="controls">
                        <button id="btnCari" type="submit" class="btn btn-success"><i class="fa fa-white fa fa-search"></i> Search...</button>
                    </div>
                </div>
            </form>
        </div>
                <?php }
             ?>
    </div>
    <div style="border-bottom: 1px #999 dashed; margin-bottom: 20px"></div>

    <div class="row-fluid">
        <div id="result"></div>
    </div>

</div>
      </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
 <script>      
        //Date range picker
        $('#tgl_mulai,#tgl_akhir,#tgl_mulai1,#tgl_akhir1').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
        });
  </script>

  <script type="text/javascript">
    $(function(){
        $("#btnCari").click(function() {
            var $form = $('#laporanPage').find('form'),
                $tgl_awal = $("#tgl_mulai").val(),
                $tgl_akhir = $("#tgl_akhir").val(),
                $nasabah    = $("#nasabah").val(),
                $url = $form.attr('action');
            $.ajax({
                type: "POST",
                url: $url,
                dataType: "html",
                data: "tgl_awal="+$tgl_awal+"&tgl_akhir="+$tgl_akhir+"&nasabah"+$nasabah,
                cache:false,
                success: function(data){
                    $(".loader").fadeIn(500).fadeOut(500).queue(function(){
                        $('#result').html(data);
                    });
                }
            });
            return false;
        });
    });
</script>
        <!-- Modal Delete Polis