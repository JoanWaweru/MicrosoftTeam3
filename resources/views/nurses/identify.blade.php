
 @extends('layouts.nurse')

 @section('content')
 <link rel="stylesheet" href="{{asset('css/identify_face.css')}}">

 <div id="main-container">

    <div id="sub-container" class="card">

        <div id="take-photo-container" class=" flex ">


                <video id="camera_view" class="card" autoplay playsinline></video>
                <!-- Camera sensor -->
                <canvas id="camera_sensor" class="card hide-element" style="display:none;"></canvas>
           
            <!-- Camera view -->
           
              <div class="camera-buttons">
                <button id="camera_open">Open Camera</button>
                <button id="camera_close" class="red-button" onclick="cameraEnd()">Close Camera</button>
              </div>
            
        </div>
        <button class="save" id="identify-button" style="display:block; margin:10px auto;"> Identify</button>
    </div>

 </div>   
</body>
<script src="{{asset('js/identify_face.js')}}"></script>
<script src="{{asset('js/patient/common.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</html>
@endsection