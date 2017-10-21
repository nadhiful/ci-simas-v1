<!-- /.content-wrapper -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url('asset/plugins/daterangepicker/daterangepicker.js'); ?>"></script> 
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('asset/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('asset/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('asset/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('asset/plugins/fastclick/fastclick.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('asset/dist/js/app.min.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('asset/dist/js/demo.js'); ?>"></script>
    <script src="<?php echo base_url('asset/plugins/iCheck/icheck.min.js'); ?>"></script>
    
    <!-- page script -->

    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

    <script type="text/javascript" src="<?php echo base_url('asset/dist/js/jquery.printPage.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btnPrint").printPage();
        })
    </script>
  </body>
</html>
