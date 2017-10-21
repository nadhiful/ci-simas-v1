<!-- Main content --> 
<section class="content">
  <div class="box">
    <div class="box-header">

      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Polis</th>
              <th>Nama Nasabah</th>
              <th>Tanggal Mulai-Habis Kontrak</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
    
    if(isset($data)){
    foreach($data as $row){
    ?>
    <tr>
       
        <td><?=$row->id_polis ?></td>
        <td><?=$row->nama ?></td>
        <td><?=$row->tgl_mulai?> - <?=$row->tgl_habis?></td>
        <td>
        <a class="btn btn-primary" href="<?php echo site_url('Admin/detail_polis/'.$row->id_polis)?>">
        <i class="fa fa-eye"></i> Lihat</a>
        <!-- <a class="btn btn-danger" href="<?php //echo site_url('Data_control/delete_polis/'.$row->id_polis);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a> -->
        </td>
    </tr>

    <?php }
    }
    ?>
          </tbody>
          <tr>
            <th>ID Polis</th>
            <th>Nama Nasabah</th>
            <th>Tanggal Mulai-Habis Kontrak</th>
            <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
  </div><!-- /.box -->
        
</section><!-- /.content -->
        
   
<!-- /=======================================================================================/ -->
