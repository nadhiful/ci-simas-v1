<?php
if(isset($detail_nasabah)){
    foreach($detail_nasabah as $row){
        ?>
         <div class="form-group">
            <label class="control-label">Alamat</label>
            <div class="col-sm-7">
                <input type="text" name="alamat" value="<?php echo $row->alamat; ?>" placeholder="Alamat" class="form-control" readonly>
            </div>
        </div>

       <div class="form-group">
            <label class="control-label">Jenis Asuransi</label>
            <div class="col-sm-7">
                <input type="text" name="produk" value="<?php echo $row->nama_produk; ?>" placeholder="Produk" class="form-control" readonly>
            </div>
        </div>

         <div class="form-group">
            <label class="control-label">Nominal</label>
            <div class="col-sm-7">
                <input type="text" name="nominal" id="nominal" placeholder="Nominal" class="form-control">
            </div>
        </div>
    <?php
    }
}
?>
