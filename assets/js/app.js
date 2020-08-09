
let onFaceApiReady = null
const video = document.getElementById('video')
const addListener = () => {
    video.addEventListener('play', () => {
        const canvas = faceapi.createCanvasFromMedia(video);
        document.getElementById('videowrapper').append(canvas)
        const displaySize = {
            width: video.offsetWidth,
            height: video.offsetHeight
        }
        faceapi.matchDimensions(canvas, displaySize)
        window.interval = setInterval(async () => {
            try {
                const detection = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
                                            .withFaceLandmarks()
                                            .withFaceDescriptors()
                                            .withFaceExpressions()
                
                
                const resizeDetections = faceapi.resizeResults(detection, displaySize)

                canvas.getContext('2d').clearRect(0, 0,canvas.width, canvas.height)
                faceapi.draw.drawDetections(canvas, resizeDetections)

                if (onFaceDetection !== undefined && detection.length > 0) onFaceDetection(detection, resizeDetections)
                if (faceStatus !== undefined){
                    if (detection.length > 0){
                        faceStatus(true)
                    } else {
                        faceStatus(false)
                    }
                }
            } catch(err){
                console.log('errorr ', err)
            }
        }, 100);
    })
}
const startvideo = async () => {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({'video':true,'audio':false})
        window.stream = stream
        video.srcObject = stream
        
    } catch(err){
        console.log(err)
    }
}


$(async () => {
    try {
        window.loadedImage = false
        if (window.interval) clearInterval(window.interval)
        addListener()
        Promise.all([
            faceapi.nets.tinyFaceDetector.loadFromUri('/assets/js/modelsnew/tiny_face_detector'),
            faceapi.nets.faceLandmark68Net.loadFromUri('/assets/js/modelsnew/face_landmark_68'),
            faceapi.nets.faceRecognitionNet.loadFromUri('/assets/js/modelsnew/face_recognition'),
            faceapi.nets.faceExpressionNet.loadFromUri('/assets/js/modelsnew/face_expression'),
        ]).catch(err => console.log('err', err))

        await faceapi.nets.ssdMobilenetv1.loadFromUri('/assets/js/modelsnew/face_expression/ssd_mobilenetv1')
        startvideo()
        
        if (onFaceApiReady !== null) onFaceApiReady()
        
    } catch(err){
        window.loadedImage = false
        console.log(err)   
    }
})