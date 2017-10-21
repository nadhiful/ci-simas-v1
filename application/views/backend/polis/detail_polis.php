<div class="container">

    <div class="well">
        <h4 class="alert alert-success" style="text-align: center">Keterangan</h4>
        <div class="row-fluid">
            <?php if(isset($data)){
                foreach($data as $row){
                    ?>
                    <div class="span6">
                        <dl class="dl-horizontal">
                            <dt>Kode Polis :</dt>
                            <dd><?php echo $row->id_polis?></dd>
                            <br/>
                            <dt>Kode Nasabah :</dt>
                            <dd><?php echo $row->id_nasabah?></dd>
                            <br/>
                            <dt>Tanggal Pendaftaran :</dt>
                            <dd><?php echo date("d M Y",strtotime($row->tgl_mulai));?></dd>
                            <br/>
                        </dl>
                    </div>
                    <div class="span6">
                        <dl class="dl-horizontal">
                            <dt>Nama Nasabah :</dt>
                            <dd><?php echo $row->nama_nasabah?></dd>
                            <br/>
                            <dt>Saldo Saat Ini :</dt>
                            <dd><?php echo $row->saldo?></dd>
                            <br/>
                             <dt>Sisa Angsuran :</dt>
                            <dd><?php echo $row->angsuran?></dd>
                            <br/>
                            <dt>Alamat :</dt>
                            <dd><?php echo $row->alamat?></dd>
                            <br/>
                            <dt>Email :</dt>
                            <dd><?php echo $row->email?></dd>
                            <br/>
                            <dt>Jenis Asuransi :</dt>
                            <dd><?php echo $row->nama_produk?></dd>
                            <br/>
                            <dt>Harga Asuransi :</dt>
                            <dd><?php echo $row->harga?></dd>
                            <br/>
                            <dt>Habis Kontrak :</dt>
                            <dd><?php echo $row->tgl_habis?></dd>
                            <br/>
                            
                        </dl>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>

                 <?php
                $no=1;
                if(isset($agen)){
                    if ($agen == FALSE) { ?>
                      <div class="well">
                        <h4 class="alert alert-danger" style="text-align: center"> Agen Belum Ditambahkan</h4>
                        <div class="row-fluid">
                            <div class="form-actions">
                                <a href="<?php echo site_url('Admin/view_polis')?>" class="btn btn-primary">
                                    <i class="fa fa-arrow-left icon-white"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                      
                    <?php }

                    else { ?>
                        <div class="well">
                        <h4 class="alert alert-success" style="text-align: center"> Keterangan Agen</h4>
                        <div class="row-fluid">
                         <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Agen</th>
                                    <th>Nama Agen</th>
                                    <th>Alamat</th>
                                    <th>Tempat</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1;
                                if(isset($agen)){
                                    foreach($agen as $key ){
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $key->id_agen?></td>
                                            <td><?php echo $key->nama_agen?></td>
                                            <td><?php echo $key->alamat?></td>
                                            <td><?php echo $key->tempat?></td>
                                        </tr>
                                    <?php }
                                }
                                ?>
                                </tbody>
                            </table>

                            <div class="form-actions">
                                <a href="<?php echo site_url('Admin/view_polis')?>" class="btn btn-primary">
                                    <i class="fa fa-arrow-left icon-white"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php }
                
                }
                ?>
    




<!-- End Div -->
</div>



