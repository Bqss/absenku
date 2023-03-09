

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistem Absensi Kegiatan SH Terate 057</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/custom-button.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/font-awesome-4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
        <?php $this->load->view('template/css'); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
        <?php $this->load->view('template/header'); ?>
          <!-- Left side column. contains the logo and sidebar -->
          <?php $this->load->view('template/sidebar'); ?>
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
              <?php
                      echo $contents;
              ?>
          </div><!-- /.content-wrapper -->
          <?php $this->load->view('template/footer'); ?>
        
               <!-- Add the sidebar's background. This div must be placed
                    immediately after the control sidebar -->
               <div class="control-sidebar-bg"></div>
             </div>
          <!-- ./wrapper -->
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

        <script type="text/javascript">
          var d = new Date();
          var hours = d.getHours();
          var minutes = d.getMinutes();
          var seconds = d.getSeconds();
          var hari = d.getDay();
          var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
          hariIni = namaHari[hari];
          var tanggal = ("0" + d.getDate()).slice(-2);
          var month = new Array();
          month[0] = "Januari";
          month[1] = "Februari";
          month[2] = "Maret";
          month[3] = "April";
          month[4] = "Mei";
          month[5] = "Juni";
          month[6] = "Juli";
          month[7] = "Agustus";
          month[8] = "September";
          month[9] = "Oktober";
          month[10] = "Nopember";
          month[11] = "Desember";
          var bulan = month[d.getMonth()];
          var tahun = d.getFullYear();
          var date = Date.now(),
          second = 1000;
          function pad(num) {
            return ('0' + num).slice(-2);
            }
          function updateClock() {
              var clockEl = document.getElementById('clock'),
              dateObj;
              date += second;
              dateObj = new Date(date);
              clockEl.innerHTML = '' + hariIni + '.  ' + tanggal + ' ' + bulan + ' ' + tahun + '. ' + pad(dateObj.getHours()) + ':' + pad(dateObj.getMinutes()) + ':' + pad(dateObj.getSeconds());
          }
          setInterval(updateClock, second);
      </script>
    </body>
</html>
