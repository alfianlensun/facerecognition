<div class="bg-primary" id="loader"  style="
    position: absolute;
    z-index: 100;
    top: 0;
    color: #fff;
    height: 100vh;
    width: 100vw;
">
    <div style="
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    ">
        <h1 style="color: #fff;">Mohon Tunggu</h1>
        <h5 style="color: #fff;">Mengambil data mahasiswa <i class="fa fa-spin fa-spinner"></i></h5>
    </div>
</div>
<div class="row bg-primary"
    style="
        overflow-x: hidden;
        height: 100vh;
    "
>
    <div class="col-8 pl-4" 
        id="wrapper"
    >
        <div style="
            width: 100%;
            display: flex;
            align-items: center;
            justify-content:center;
        ">
            <div
                class="mt-4"
                id="videowrapper"
                style="
                    borderRadius: 20px;
                    width: 720px;
                    position: relative;
                    heigth: 560px;
                    overflow: hidden;
                "
            >
                <video id="video"
                    autoplay 
                    muted
                    style="
                        position: relative;
                        height: 100%;
                        width: 100%;
                    "
                ></video>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="row pt-4">
            <div class="col-12 ">
                <div style="
                    display: flex;
                    height: 100%;
                    width: 100%;
                    flex-direction: column;
                    justify-content: center;
                    align-items:flex-start;
                ">
                    <h4 id="messageFaceDetection" class="text-white">Hadapkan wajah anda ke kamera</h4>
                    <div id="messageFaceDetectionDetail" class="text-white">Pastikan wajah anda tetap berada dalam jangkauan kamera sampai absen berhasil di lakukan</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/face-api.min.js') ?>"></script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script>
    let scanning = false

    onFaceApiReady = async () => {
        const labeledFaceDescriptors = await loadAllUserImage();
        window.faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
        window.loadedImage = true
        $('#loader').hide()
    }

    function onFaceDetection(faceData, resizeDetections){
        if (scanning === false && window.loadedImage){
            scanning = true
            const faceMatcher = window.faceMatcher
            
            const result = resizeDetections.map(d => {
                return faceMatcher.findBestMatch(d.descriptor)
            })

            const whoisit = result[0]._label


            setTimeout(() => {
                scanning = false
            }, 5000);
            
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
                nama_mahasiswa: 'Oma',
                filename: 'register1.jpg',
            }
        ]

        let descriptions = []
        // let label = []
        for (const user of users){
            const img = await faceapi.fetchImage(`/uploaddata/registerabsensi/${user.id_mst_mahasiswa}/${user.filename}`)
            const detection = await faceapi.detectSingleFace(img)
                                            .withFaceLandmarks()
                                            // .withFaceExpressions()
                                            .withFaceDescriptor()
            // console.log(detection.descriptor)
            descriptions.push(new faceapi.LabeledFaceDescriptors(user.id_mst_mahasiswa.toString(), [detection.descriptor]))
        }
        // console.log(label)
        return descriptions

    }
</script>