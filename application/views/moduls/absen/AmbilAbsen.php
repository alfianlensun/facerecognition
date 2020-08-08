<div class="row">
    <div class="col-8" 
        id="wrapper"
    >
        <div
            class="mt-2"
            id="videowrapper"
            style="
                width: 720px;
                heigth: 560px;
                overflow: hidden;
            "
        >
            <video id="video"
                autoplay 
                muted
                style="
                    transform: scaleX(-1);
                    height: 100%;
                    width: 100%;
                "
            ></video>
        </div>
    </div>
    <div class="col-4">
        <div class="row pt-4">
            <div class="col-12">
                <h4 id="messageFaceDetection">Hadapkan wajah anda ke kamera</h4>
                <div id="messageFaceDetectionDetail">Pastikan wajah anda tetap berada dalam jangkauan kamera sampai absen berhasil di lakukan</div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/face-api.min.js') ?>"></script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script>
    let scanning = false

    function onFaceDetection(faceData){
        if (scanning === false){
            console.log('ok')   
        }  
    }

    let status = null
    function faceStatus(stt){
        if (status !== stt){
            status = stt
            if (stt === false){
                $('#messageFaceDetection').html('Hadapkan wajah anda ke kamera')
                // $('#messageFaceDetectionDetail').html('Silahkan hadapkan wajah anda ke kamera untuk mulai melakukan absensi')
                // $('#messageFaceDetectionDetail').show()
            } else {
                $('#messageFaceDetection').html('Wajah terdeteksi')
                // $('#messageFaceDetectionDetail').hide()
            }
        }
    }

    async function loadAllUserImage(){
        const users = [
            {
                id_mst_mahasiswa: 1,
                nama_mahasiswa: 'ALfian',
                filename: 'register1.jpg',
            },
            {
                id_mst_mahasiswa: 2,
                nama_mahasiswa: 'Mark',
                filename: 'register1.jpg',
            }
        ]

        let descriptions = []
        for (const user of users){
            const img = await faceapi.fetchImage(`/uploaddata/registerabsensi/${user.id_mst_mahasiswa}/${user.filename}`)
            const detection = await faceapi.detectSingleFace(img)
                                            .withFaceLandmarks()
                                            .withFaceExpressions()
            // descriptions
        }


    }
</script>