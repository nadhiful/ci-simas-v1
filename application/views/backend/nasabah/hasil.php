<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kode Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    if(isset($dt_result)){
        foreach($dt_result as $row){
            ?>
            <tr class="gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo date("d M Y",strtotime($row->tgl_transaksi)); ?></td>
                <td><?php echo $row->id_pembayaran; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo currency_format($row->total_all); ?></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center; background: #49afcd"><strong>Total Seluruh Penjualan</strong></td>
                <td><?= currency_format($row->total_all)?></td>
            </tr>
        <?php }
    }
    ?>
    </tbody>
</table>

<hr/>

<button class="btn btn-primary pull-right" onclick="print()">
    <i class="fa fa-print"></i> Print
</button>