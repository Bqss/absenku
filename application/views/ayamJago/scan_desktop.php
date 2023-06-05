<section class="content">
    <div class="box p-6">
        <div class="box-header">
            <h1 class="text-4xl font-bold">Form Cek Ayam Jago</h1>
        </div>
        <div class="box-body mt-3">
            <form action="" method="POST" class="max-w-7xl flex flex-col items-center">
                <div class="ml-0 flex gap-6 items-center w-full ">
                    <label for="id">No.ID </label>
                    <input type="text" name="" class="form-control" id="result">
                    <button class="btn btn-primary text-base" id="qrTrigger">QR</button>
                </div>
                <button class="btn btn-success mt-6  text-base">Submit</button>
            </form>

            <div class="max-w-3xl">
                <video id="video" width="100%" class="aspect-square mt-8" style="border: 1px solid gray"></video>
            </div>
        </div
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
    
    window.addEventListener('DOMContentLoaded', function() {
        let selectedDeviceId;
        let audio = new Audio("assets/audio/beep.mp3");
        const qrTrigger = document.querySelector("#qrTrigger");
        const codeReader = new ZXing.BrowserQRCodeReader();


        codeReader.getVideoInputDevices()
            .then((videoInputDevices) => {
                // const sourceSelect = document.getElementById('sourceSelect')
                console.log(videoInputDevices)

                if (videoInputDevices.length >= 0) {
                    videoInputDevices.forEach((element, i) => {
                        if ( element.label.contains("facing back") || i == 0) {
                            selectedDeviceId = element.deviceId;
                        }
                        // sourceOption.text = element.label
                        // sourceOption.value = element.deviceId
                        // sourceSelect.appendChild(sourceOption)
                    })
                    //   decode();
                    // const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                    // sourceSelectPanel.style.display = 'block'
                }
                // handler ketika ganti kamera 
                // sourceSelect.onchange = () => {
                //     selectedDeviceId = sourceSelect.value;
                //     //   decode();
                // }
            })
            .catch((err) => {

            })

        qrTrigger.addEventListener("click", async (ev) => {
            ev.preventDefault();
            const control = await codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err, control) => {

                if (result) {
                    console.log(result)
                    document.getElementById('result').value = result.text
                    audio.play();
                    codeReader.reset();
                    control.stop();
                }
            })

        })
    })
</script>

