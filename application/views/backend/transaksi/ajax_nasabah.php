<?php
if(isset($nasabah)){ ?>
         <div class="form-group">
            <label class="control-label">Daftar Nasabah</label>
            <div class="col-sm-7">
               <select name="nasabah" id="nasabah" class="form-control">
               <?php 
                    foreach ($nasabah as $row) { ?>
                    <option value="<?php echo $row->id_nasabah; ?>"><?php echo $row->nama; ?></option>
                    <?php }
                    ?>
               </select>
            </div>
        </div>

<?php 
}
?>
<script>
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