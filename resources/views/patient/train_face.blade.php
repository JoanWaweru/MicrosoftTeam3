@extends('layouts.profile')
@section('content')

<link rel="stylesheet" href="{{asset('css/train_face.css')}}">
 <div id="main-container">
    <div id="sub-container" class="card">
        <div id="take-photo-container">

            <div id="display-boxes">
                <video id="camera_view" class="card" autoplay playsinline></video>
                <!-- Camera sensor -->
                <canvas id="camera_sensor" class="card"></canvas>
            </div>
            <!-- Camera view -->
           
              <div class="camera-buttons">
                <button id="camera_open">Open Camera</button>
                <button id="camera_trigger" class="darg-green">Capture</button>
                <button id="camera_close" class="red-button" onclick="cameraEnd()">Close Camera</button>
              </div>
            
        </div>

        <button class="save" id="train-button"> Train</button>
    </div>

 </div>   
 <script src="{{asset('js/patient/train_face.js')}}"></script>
 <script src="{{asset('js/patient/common.js')}}"></script>
 @endsection
