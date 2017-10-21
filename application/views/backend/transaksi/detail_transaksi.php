<!--========================= Content Wrapper ==============================-->
<div class="container">

    <div class="well">
        <h4 class="alert alert-success" style="text-align: center">Keterangan</h4>
        <div class="row-fluid">
            <?php if(isset($data)){
                $no=1;
                foreach($data as $row){
                    ?>
                    <div class="span6">
                        <dl class="dl-horizontal">
                            <dt>Kode Transaksi :</dt>
                            <dd><?php echo $row->id_pembayaran?></dd>
                            <br/>
                            <dt>Tanggal Transaksi :</dt>
                            <dd><?php echo $row->tgl_transaksi?></dd>
                            <dd><strong><u></u></strong></dd>
                        </dl>
                    </div>
                    <div class="span6">
                        <dl class="dl-horizontal">
                            <dt>Nasabah :</dt>
                            <dd><?php echo $row->nama_nasabah?></dd>
                            <br/>
                            <dt>Alamat :</dt>
                            <dd><?php echo $row->alamat?></dd>
                            <br/>
                            <dt>Email :</dt>
                            <dd><?php echo $row->email?></dd>
                            <br/>
                            <dt>Nama Agen :</dt>
                            <dd><?php echo $row->nama_agen?></dd>
                            <br/>
                            <dt>Nominal :</dt>
                            <dd><?php echo $row->nominal?></dd>
                            <br/>
                             <dt>Sisa Angsuran :</dt>
                            <dd><?php echo $row->angsuran?></dd>
                            <br/>
                            <dt>Saldo Saat Ini :</dt>
                            <dd><?php echo $row->saldo?></dd>
                            <br/>
                        </dl>
                    </div>
              
        </div>
    </div>


    <div class="well">
        <h4 class="alert alert-success" style="text-align: center"> Daftar Produk</h4>
        <div class="row-fluid">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Asuransi</th>
                    <th>Harga</th>
                </tr>
                </thead>
                <tbody>
                        <td><?= $no++; ?></td>
                        <td><?= $row->id_produk ?></td>
                        <td><?= $row->nama_produk ?></td>
                        <td><?= $row->harga ?></td>
                </tbody>
            </table>

            <div class="form-actions">
            <?php 
                $role = $this->session->userdata('levelUser');
                if ($role == "admin") { ?>
                    <a href="<?php echo site_url('Admin/view_transaksi')?>" class="btn btn-primary">
                    <i class="fa fa-arrow-left fa fa-white"></i> Back
                </a>     
                <?php }
                elseif ($role == "agen") { ?>
                    <a href="<?php echo site_url('Agen/view_transaksi')?>" class="btn btn-primary">
                    <i class="fa fa-arrow-left fa fa-white"></i> Back
                </a>
                <?php }
                elseif ($role == "nasabah") { ?>
                    <a href="<?php echo site_url('Nasabah/view_transaksi')?>" class="btn btn-primary">
                    <i class="fa fa-arrow-left fa fa-white"></i> Back
                </a>
                <?php }
                elseif ($role == "staff") { ?>
                    <a href="<?php echo site_url('Staff/view_transaksi')?>" class="btn btn-primary">
                    <i class="fa fa-arrow-left fa fa-white"></i> Back
                </a>
                <?php }
             ?>
                
            </div>
        </div>
    </div>
            <?php }
        }
    ?>
</div>

