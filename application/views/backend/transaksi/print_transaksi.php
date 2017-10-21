<div class="container">

    <style type="text/css">
        body{
            background-color: #ffffff;
        }
        [class*="span"] {
            float: left;
            min-height: 1px;
            margin-left: 5px;
        }
        .span {
            width: 220px;
        }
        .sign{
            height: 100px;
            border-bottom: 1px solid #000000;
        }
        .text-center{
            text-align: center
        }

    </style>
    <div align="left">
        <?php if(isset($data)){foreach($data as $row){?>
            <strong style="font-size: x-large; float: left; color: #3a87ad;"><?php echo $row->nama?></strong> <br/><br/>
        <?php }} ?>
        <hr/>
        <table>
            <tr>
                <?php if(isset($dt_contact)){foreach($dt_contact as $row){?>
                    <td width="70%"><strong>Alamat : </strong> <?php echo $row->alamat?></td>
                <?php }} ?>
            </tr>
            <tr>
                <?php if(isset($dt_contact)){foreach($dt_contact as $row){?>
                    <td width="70%"><strong>Phone : </strong> <?php echo $row->telepon?> </td>
                <?php }}?>
            </tr>
            <tr>
                <td align="left"><strong>Operator : </strong> <?php echo $row->nama_agen?></td>
            </tr>
            <tr>
                <td align="left"><strong>Date : </strong>  <?php echo isset($date1) ? $date1 : date('d M Y')?></td>
            </tr>
        </table>
    </div>
    <br/>

    <div align="center">
        <h3 style="border: 1px solid #333;">Report Transaksi</h3>
        <br/>
        <div align="left">
            <table>
                <?php if(isset($data)){ foreach($data as $row) { ?>
                    <tr>
                        <td width="65%"><strong>Kode Transaksi : </strong> <?php echo $row->id_pembayaran; ?></td>
                        <td style="float: right"><strong>Nasabah : </strong> <?php echo $row->nama_nasabah; ?></td>
                    </tr>
                    <tr>
                        <td width="65%"><strong>Tanggal Penjualan : </strong> <?php echo date("d M Y",strtotime($row->tgl_transaksi));?></td>
                        <td style="float: right"><strong>Alamat : </strong> <?php echo $row->alamat; ?></td>
                    </tr>
                    <tr>
                        <td width="65%"><strong>Pegawai : </strong> <?php echo $row->nama_agen?></td>
                        <td style="float: right"><strong>Email : </strong> <?php echo $row->email; ?></td>

                    </tr>



                <?php } } ?>
            </table>

        </div>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi </th>
                <th>Nama Nasabah</th>
                <th>Nama Barang</th>
                <th>Harga</th>
            </tr>
            </thead>
            <?php
            $no=1;
            if(isset($data)){
            foreach($data as $row){
            ?>
            <tbody>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->id_pembayaran; ?></td>
                <td><?php echo $row->nama_nasabah; ?></td>
                <td><?php echo $row->nama_produk; ?></td>
                <td><?php echo $row->nominal?></td>
            </tr>
            <?php }
            }
            ?>
            </tbody>
        </table>
        <?php if(isset($data)){ foreach($data as $row) { ?>
            <h5 style="float:right;">
                Total : <?php echo $row->nominal?>
            </h5>
        <?php }}?>
    </div>
    <br/>
    <hr/>

    <div class="span center">
        <?php
        if(isset($data)){
            foreach($data as $row) { ?>
                <h5 class="text-center">Nasabah</h5>
                <div class="sign"></div>
                <h6 class="text-center"><?php echo $row->nama?></h6>
            <?php }
        }
        ?>
    </div>
   