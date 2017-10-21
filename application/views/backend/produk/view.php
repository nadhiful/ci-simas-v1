<section class="content">
  <div class="box">
    <div class="box-header">
      <a href="#modalAddBarang" class="btn btn-success" data-toggle="modal">
        <i class="fa fa-align-left"></i> Tambah Data
      </a>
      
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Produk</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Durasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
    
    if(isset($data)){
    foreach($data as $row){
    ?>
    <tr>
       
        <td><?=$row->id_produk ?></td>
        <td><?=$row->nama_produk ?></td>
        <td><?=$row->harga?></td>
        <td><?=$row->durasi?> tahun</td>
        <td>
          <a href="#modalEditBarang<?php echo $row->id_produk?>" class="btn btn-primary" data-toggle="modal">
        <i class="fa fa-pencil"></i> Edit
      </a>
            <a class="btn btn-danger" href="<?php echo site_url('Data_control/delete_produk/'.$row->id_produk);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a>
         
        </td>
    </tr>

    <?php }
    }
    ?>
          </tbody>
          <tr>
            <th>ID Produk</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Durasi</th>
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
                <h4 class="modal-title">Tambah Data Produk</h4>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/add_produk')?>">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label"><?php echo $title_id; ?></label>
                  <div class="col-sm-7">
                    <input type="text" name="id_produk" class="form-control" placeholder="ID Produk" value="<?php echo $id_produk; ?>" readonly>
                  </div>

                </div>

               <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="nama" name="nama">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Harga</label>
                  <div class="col-sm-7">   
                   <input type="text" class="form-control pull-right" id="harga" name="harga">
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

  <?php
if (isset($data)){
    foreach($data as $row){
        ?>
        <div id="modalEditBarang<?php echo $row->id_produk?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Produk</h3>
            </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/update_produk')?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID Produk</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_produk" type="text" value="<?php echo $row->id_produk;?>" readonly>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="kd_nama" name="kd_nama"value="<?php echo $row->nama_produk?>">
                  </div>
                </div>
                
              
                <div class="form-group">
                  <label class="control-label">Harga</label>
                  <div class="col-sm-7">   
                  <input type="text" class="form-control pull-right" id="kd_harga" name="kd_harga" value="<?php echo $row->harga;?>">
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

  