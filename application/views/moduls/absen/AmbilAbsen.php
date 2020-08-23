<style>
    canvas.canvasimg{
        position: relative;
    }
</style>

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
<div class="row"
    style="
        background-color: #ebf4ff;
        overflow-x: hidden;
        height: 100vh;
    "
>
    <div class="col-7 pl-4" 
        id="wrapper"
    >
    
        <div style="
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content:center;
        ">
            <a href="<?= base_url('login') ?>" class="btn btn-primary mt-4" style="align-self: flex-start;"><i class="fa fa-chevron-left"></i> Ke Main Menu</a>
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
    <div class="col-5" style="border-left: 1px solid #fff; background-color: #5a67d8">
        <div class="row pt-4 pl-4">
            <div class="col-12 " id="indikatormsg">
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
            <div class="col-12 mt-4 pt-4" id="detailuserdetection" style="display:none">
                <h4 class="text-white" id="msg-nm"></h4>
                <h6 class="text-white" style="line-height: 30px;">Anda telah berhasil melakukan absen masuk</h6>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 text-white">
                                Mata Kuliah
                            </div>
                            <div class="col">
                                <h6 class="text-white " id="msg-mk"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 text-white">
                                Tanggal
                            </div>
                            <div class="col">
                                <h6 class="text-white" id="msg-tanggal"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 text-white text-left">
                                Jam 
                            </div>
                            <div class="col">
                                <h6 class="text-white" id="msg-jam"> </h6>
                            </div>
                        </div>
                    </div>
                </div>
                
            
                <div class="row">
                    <div class="col-12 pr-4 mt-4" style="position: relative;">
                        <canvas id="canvas" class="canvasimg" style="width: 352px; height: 288px; background-color: #6588f1; border-radius: 20px;"> 
                    
                        </canvas>
                    </div>
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
        console.log(labeledFaceDescriptors)
        window.faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
        window.loadedImage = true
        $('#loader').hide()
    }

    async function onFaceDetection(faceData, resizeDetections){
        try {
            if (scanning === false && window.loadedImage){
                scanning = true
                const faceMatcher = window.faceMatcher
                
                const result = resizeDetections.map(d => {
                    return faceMatcher.findBestMatch(d.descriptor)
                })

                const whoisit = result[0]._label
                
                if (whoisit !== 'unknown'){
                    const mahasiswa = window.allmhs.filter(mhs => {
                        return mhs.id_mst_auth == whoisit
                    })   
                    const canvas = document.getElementById(`canvas`)
                    const context1 = canvas.getContext('2d')
                    
                    context1.drawImage(video, 0,0,canvas.width, canvas.height)                  
                    const photo = canvas.toDataURL('image/jpeg', 1.0);
                    const {success, mk, date,time} = await checkMKOnDb(mahasiswa[0],photo)
                    if (success == true){
                        $('#msg-nm').html(mahasiswa[0].nama_mahasiswa)
                        $('#msg-mk').html(mk.nama_mata_kuliah)
                        $('#msg-tanggal').html(date)
                        $('#msg-jam').html(time)
                        $('#indikatormsg').hide()
                        $('#detailuserdetection').show()
                        setTimeout(() => {
                            $('#detailuserdetection').hide()
                            $('#indikatormsg').show()
                            scanning = false
                        }, 10000);
                    } else {
                        setTimeout(() => {
                            scanning = false
                            $('#detailuserdetection').hide()
                            $('#indikatormsg').show()
                        }, 5000);
                    }
                } else {
                    setTimeout(() => {
                        scanning = false
                        $('#detailuserdetection').hide()
                        $('#indikatormsg').show()
                    }, 5000);
                }

                
            }  
        } catch(err){
            console.log(err)
            scanning = false
        }
    }


    async function checkMKOnDb(data,photo){
        try {
            return await new Promise((rs, rj) => {
                $.ajax({
                    url: base_url+'/absen/C_Absen/createAbsensi',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        ...data,
                        photo
                    },
                    success: resp => rs(resp),
                    error: err => rj(err)
                })
            })
        } catch(err){
            scanning = false
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
        try {
            const users = await new Promise((rs, rj) => {
                $.ajax({
                    url: base_url+'/absen/C_Absen/getAbsenRegister/'+'<?= $id_mst_kelas ?>',
                    method: 'get',
                    dataType: 'json',
                    success: resp => rs(resp),
                    error: err => rj(err)
                })
            })

            if (user.length === 0){
                alert('Tidak ada mahasiswa terdaftar absensi di kelas ini')
                window.history.back()
                return false
            }

            window.allmhs = users

            let descriptions = []
            // let label = []
            for (const user of users){
                const img = await faceapi.fetchImage(base_url+`/uploaddata/registerabsensi/${user.id_mst_auth}/${user.filename}`)
                const detection = await faceapi.detectSingleFace(img)
                                                .withFaceLandmarks()
                                                // .withFaceExpressions()
                                                .withFaceDescriptor()
                // console.log(detection.descriptor)
                if (detection.descriptor !== undefined){
                    descriptions.push(new faceapi.LabeledFaceDescriptors(user.id_mst_auth.toString(), [detection.descriptor]))
                }
            }
            // console.log(label)
            return descriptions
        } catch(err){
            
        }

    }
</script>