<!-- Main content --> 
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
              <th>ID Staff</th>
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
       
        <td><?=$row->id_staf ?></td>
        <td><?=$row->nama ?></td>
        <td><?=$row->alamat?></td>
        <td>
        <?php 
            $id = $this->session->userdata('idUser');
            $pecah  = explode("-",$id);
            $hasil  = $pecah[0];
            if ($hasil == "ADM") { ?>
          <a href="#modalEditBarang<?php echo $row->id_staf?>" class="btn btn-primary" data-toggle="modal">
              <i class="fa fa-pencil"></i> Edit
          </a>
          <a class="btn btn-danger" href="<?php echo site_url('Data_control/delete_staf/'.$row->id_staf);?>"
               onclick="return confirm('Anda yakin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
          <a href="#modalDetailBarang<?php echo $row->id_staf?>" class="btn btn-warning" data-toggle="modal">
          <i class="fa fa-eye"></i> Detail
          </a>  
          <?php }
          elseif ($hasil == "MNG") { ?>
          
          <a href="#modalDetailBarang<?php echo $row->id_staf?>" class="btn btn-warning" data-toggle="modal">
          <i class="fa fa-eye"></i> Detail
          </a> 
          
          <?php }

        ?>
          
        </td>
    </tr>

    <?php }
    }
    ?>
          </tbody>
          <tr>
            <th>ID Nasabah</th>
            <th>Nama</th>
            <th>Alamat</th>
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
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/add_staf')?>">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label"><?php echo $title_id; ?></label>
                  <div class="col-sm-7">
                    <input type="text" name="id_staf" class="form-control" placeholder="ID Staff" value="<?php echo $id_staf; ?>" readonly>
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
                  <label class="control-label">Telepon</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control pull-right" id="telepon" name="telepon">
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label">Email</label>
                  <div class="col-sm-7">   
                    <input type="mail" class="form-control pull-right" id="email" name="email">
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

<?php
if (isset($data)){
    foreach($data as $row){
        ?>
        <div id="modalEditBarang<?php echo $row->id_staf?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Staf</h3>
            </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control/update_staf/')?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><?php echo $title_id; ?></label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_staf" type="text" value="<?php echo $row->id_staf;?>" readonly>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="kd_nama" name="kd_nama"value="<?php echo $row->nama?>">
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
                    <input type="mail" class="form-control pull-right" id="kd_email" name="kd_email" value="<?php echo $row->email;?>">
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

<?php
if (isset($data)){
    foreach($data as $row){
        ?>
        <div id="modalDetailBarang<?php echo $row->id_staf?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Staf</h3>
            </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Data_control')?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><?php echo $title_id; ?></label>
                        <div class="col-sm-7">
                          <input class="form-control" name="kd_staf" type="text" value="<?php echo $row->id_staf;?>" readonly>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="kd_nama" name="kd_nama"value="<?php echo $row->nama?>" readonly>
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