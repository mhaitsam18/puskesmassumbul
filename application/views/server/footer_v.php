    <footer class="main-footer">
      <!-- <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2020 <a href="#"> All Rights Reserved</a></strong> -->
    </footer>
    </div>

    <script src="<?php echo base_url(); ?>assets/server/assets/js/hapus.js"></script>

    <script src="<?php echo base_url(); ?>assets/server/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/server/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>assets/server/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/server/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/server/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/server/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/server/assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assets/server/assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/server/assets/dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="<?php echo base_url(); ?>plugins/ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('editor1', {
        filebrowserImageBrowseUrl: '<?php echo base_url(); ?>assets/kcfinder'
      });
    </script>

    <script>
      function formatCurrency(num) {
        num = num.toString().replace(/\$|\,/g, '');
        if (isNaN(num))
          num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        cents = num % 100;
        num = Math.floor(num / 100).toString();
        if (cents < 10)
          cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
          num = num.substring(0, num.length - (4 * i + 3)) + '.' +
          num.substring(num.length - (4 * i + 3));
        return (((sign) ? '' : '-') + 'Rp. ' + num);
      }
    </script>

    <script>
      $(function() {
        $('#example1').DataTable({
          'scrollX': true
        });

        $('#example2').DataTable({
          'paging': true,
          'lengthChange': true,
          'searching': true,
          'info': true,
          'autoWidth': true,
          'bSort': false
        })
      })
    </script>

    <script>
      var ckeditor = CKEDITOR.replace('editor1', {
        height: '600px'
      });
      CKEDITOR.disableAutoInline = true;
      CKEDITOR.inline('editable');
    </script>

    </body>

    </html>