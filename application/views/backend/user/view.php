<!-- Main content --> 
<section class="content">
  <div class="box">
    <div class="box-header">
      
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID User</th>
              <th>Nama User</th>
              <th>Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
    
    if(isset($data)){
    foreach($data as $row){
    ?>
    <tr>
       
        <td><?=$row->idUser ?></td>
        <td><?=$row->namaUser ?></td>
        <td><?=$row->levelUser ?></td>
        <td>
            <a href="#modalEditBarang<?php echo $row->idUser?>" class="btn btn-primary" data-toggle="modal">
        <i class="fa fa-pencil"></i> Lihat
      </a>
           
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
        
</section><!-- /.content -->
<?php
if (isset($data)){
    foreach($data as $row){
        ?>
        <div id="modalEditBarang<?php echo $row->idUser?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detail Data User</h3>
            </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('')?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><?php echo $title_id; ?></label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_agen" type="text" value="<?php echo $row->idUser;?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nama User</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="nama" type="text" value="<?php echo $row->namaUser;?>" readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Password</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="password" type="text" value="<?php echo $row->password;?>" readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Role</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="levelUser" type="text" value="<?php echo $row->levelUser;?>" readonly>
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
}
?>
        
<!-- /=======================================================================================/ -->
   <script>
        //Date range picker
        $('#tgl_mulai,#tgl_habis').daterangepicker({
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