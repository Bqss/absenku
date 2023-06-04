<style media="screen">
  .btn-md {
    padding: 1rem 2.4rem;
    font-size: .94rem;
    display: none;
  }

  .swal2-popup {
    font-family: inherit;
    font-size: 1.2rem;
  }
</style>
<section class='content' id="demo-content">
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'></div>
        <div class='box-body'>
          <?php $attributes = array('id' => 'QR');
          echo form_open('scan/cek_id', $attributes); ?>
          <div id="sourceSelectPanel" style="display:'none';">
            <label for="sourceSelect">Change video source:</label>
            <select id="sourceSelect" style="max-width:400px">
            </select>
          </div>
          <div>
            <label for="jenis_kegiatan">Nama kegiatan : </label>
            <?= cmb_dinamis_ec("jenis_kegiatan","jenis_kegiatan",$kegiatan,'kegiatan','id_kegiatan',$prev_kegiatan) ?>
          </div>
          <div>
            <video id="video" width="100%" style="border: 1px solid gray"></video>
          </div>

          <input type="text" name="no_induk" hidden id="result" >
          <span> <input type="submit" id="button" class="btn btn-success btn-md" value="Cek Kehadiran"></span>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetAlert.min.js"></script>
<script>
  <?= $this->session->flashdata('messageAlert'); ?>
</script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/zxing/zxing.min.js"></script>
<script type="text/javascript">
  // mengambil data kamera , yaitu arah kamera ke belakang/ atau depan  
  const getCamName = (cam) => {
    return cam.label.split(",")[1]?.trim();
  }
  window.addEventListener('load', function() {
    let selectedDeviceId;
    let audio = new Audio("assets/audio/beep.mp3");
    const codeReader = new ZXing.BrowserQRCodeReader()


    //
    const decode = () => {
      codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').
      then((result) => {
 
        document.getElementById('result').value = result.text
        if (result != null) {
          audio.play();
          $('#QR').submit();
        }

      }).catch((err) => {
 
        document.getElementById('result').textContent = err
      })
    }



    codeReader.getVideoInputDevices()
      .then((videoInputDevices) => {
        const sourceSelect = document.getElementById('sourceSelect')
        console.log(videoInputDevices)

        if (videoInputDevices.length >= 0) {
          videoInputDevices.forEach((element, i) => {
            const sourceOption = document.createElement('option')

            // validasi kamera belakang atau depan , default kamera kedua 
            console.log(getCamName(element))
            if (getCamName(element) == "facing back" || i == 1) {
              selectedDeviceId = element.deviceId;
              // setting dropdown agar sesuai dengan kondisi kamera yang saat ini terpilih 
              sourceOption.selected = true;
            }
            sourceOption.text = element.label
            sourceOption.value = element.deviceId
            sourceSelect.appendChild(sourceOption)
          })
          decode();
          const sourceSelectPanel = document.getElementById('sourceSelectPanel')
          sourceSelectPanel.style.display = 'block'
        }


        // handler ketika ganti kamera 
        sourceSelect.onchange = () => {
          selectedDeviceId = sourceSelect.value;
          decode();

        }
      })
      .catch((err) => {
  
      })
  })
</script>