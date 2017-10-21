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