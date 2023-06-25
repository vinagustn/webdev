@extends('superadmin.index')

@section('layouts')
    <div class="row">
        <div class="col-lg-3"> 
            <div class="card" style="border: 1px solid; background: #1F6E8C">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <p style="font-size: 30px; font-weight:bolder; color: white">{{ $breed }}</p>
                            <p style="color: white">Data Breeding</p>
                        </div>
                        <div class="col">
                            <svg style="opacity: 40%; color:white" width="70px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path fill="white" d="M273 459l7.79-20 6.21 20 5.79-23.33-4.25-48c-7.76 7.94-17.54 17.85-29.74 30.27zm38.5-380.86a115.06 115.06 0 0 0-21.13-19.6c-17.315-11.88-35.418-18.913-55.08-22.14-18.751-3.067-37.99-2.743-56.33.12A203.86 203.86 0 0 0 133 49.42a184.2 184.2 0 0 0-29.62 15.36c-12.304 8.597-10.431 6.828.95 1.82a179.6 179.6 0 0 1 30.9-10c50.427-4.832 98.41-7.579 134.17 27.17a80 80 0 0 1 12.28 16c4.714 8.06 7.805 16.877 9.66 25.59l45.69 2.84c-5.032-17.752-15.256-37.574-25.53-50.06zm50.05 26.63c-8.531-13.217-18.495-25.428-29.66-34.88a78.24 78.24 0 0 0-15.79-10.38c2.67 2.68 5.22 5.45 7.61 8.32a138.13 138.13 0 0 1 9.13 12.11l.1.14.09.14c9.772 15.14 17.164 33.862 20.78 49.15l22.19 1.3a253.49 253.49 0 0 0-14.43-25.91zm29.89 43l70 179.4-11.82 28.37-65.77-37.94-8 13.86 67.56 39-4.327 5.754L394.12 372l-65.33-31.47a42.41 42.41 0 0 0-9.29-1.43c-5.71 0-9.52 2.06-12.71 6.62-2.53 3.61-78.5 80.52-147.64 150.28H16V243.73l92.85 3.85 96.61-33.26 10.13-11a214.71 214.71 0 0 1 38 24.27 18.57 18.57 0 0 0 11.61 3.93c13.792-1.574 22.025-9.12 32.83-17.83-3.267-21.244-6.724-43.71-9.56-62.1-6.463-2.155-12.926-4.308-19.39-6.46l4.39-4.78zm-37.25 65.02c-4.024-14.705-20.114-19.427-30.58-18.14-3.073.432-6.167 1.427-8.77 2.68.868 3.09 2.17 7.87 3.79 10.35 6.527 9.211 17.348 13.898 27.64 12.51 3.967-.672 8.94-3.676 7.92-7.4zm61.63 105.47l19 20 11.6-11-19-20zM475 172.99s-40.54-27.8-57-1.2l11.25 28.83zM294 382.05l13.4 22.28-.4-35.64c-3.29 3.45-7.53 7.82-12.95 13.36zm-30.6-167c5.858 1.872 17.61-6.048 17.33-8.01l-6.67-43.33-28-9.31c-17.65-2.861-58.224-4.989-67.27 9.28 39.596 39.732 39.526 16.87 84.61 51.37zm127.08 172.89c-15.313-7.704-30.838-14.996-46.28-22.44 5.153 29.387 10.895 58.672 15.75 88.11l25.26 37.33-2.6-34L400 469.61v-28.67l10.19-41.95 6.67-11.05z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <button class="card-footer" style="color: white; border-bottom: none; border-right:none; border-left:none" data-bs-target="#breeding" data-bs-toggle="collapse" aria-expanded="true">
                    View details <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>   
        <div class="col-lg-3"> 
            <div class="card bg-success" style="border: 1px solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <p style="font-size: 30px; font-weight:bolder; color:white">{{ $marriages }}</p>
                            <p style="color: white">Data Perkawinan</p>
                        </div>
                        <div class="col">
                            <svg style="opacity: 40%" fill="white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                width="70px"viewBox="0 0 31.385 31.385"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M13.684,24.416h-2.225v-2.102c4.412-0.796,7.753-4.655,7.753-9.282c0-1.251-0.239-2.445-0.685-3.538
                                            c-0.486-0.183-1.004-0.281-1.539-0.281c-0.849,0-1.657,0.241-2.354,0.689c0.585,0.903,0.925,1.977,0.925,3.13
                                            c0,3.184-2.587,5.773-5.771,5.773c-3.182,0-5.77-2.589-5.77-5.773c0-2.423,1.501-4.499,3.62-5.354
                                            C8.07,7.001,8.579,6.365,9.161,5.784c0.794-0.793,1.69-1.451,2.661-1.96c-0.654-0.144-1.334-0.222-2.03-0.222
                                            c-5.199,0-9.446,4.232-9.446,9.431c0,4.524,3.208,8.31,7.437,9.22v2.164H5.71c-1.011,0-1.831,0.829-1.831,1.838
                                            c0,1.012,0.82,1.84,1.831,1.84h2.073v1.462c0,1.009,0.828,1.828,1.838,1.828c1.011,0,1.838-0.819,1.838-1.828v-1.462h2.225
                                            c1.011,0,1.829-0.828,1.829-1.84C15.513,25.245,14.694,24.416,13.684,24.416z"/>
                                        <path d="M29.13,0c-0.084-0.004-5.847,0.062-5.847,0.062c-1.024,0.012-1.848,1.016-1.834,2.044
                                            c0.013,1.018,0.843,1.996,1.857,1.996c0.006,0,0.016,0,0.024,0l1.073-0.177l-1.955,1.877c-1.594-1.108-3.479-1.753-5.459-1.753
                                            c-2.559,0-4.965,0.977-6.775,2.786c-2.892,2.891-3.544,7.177-1.962,10.702c0.102,0.034,0.205,0.066,0.31,0.095
                                            c0.349,0.095,0.709,0.146,1.068,0.158c0.052,0.002,0.105,0.003,0.158,0.003c0.882,0,1.742-0.245,2.492-0.709
                                            c-1.703-2.294-1.517-5.558,0.564-7.64c1.106-1.107,2.579-1.718,4.146-1.718s3.039,0.61,4.146,1.718
                                            c2.289,2.288,2.289,6.01,0,8.296c-0.844,0.846-1.902,1.401-3.054,1.616c-0.079,0.104-0.16,0.208-0.242,0.309
                                            c-1.078,1.31-2.455,2.335-4.004,2.989c1.001,0.347,2.063,0.528,3.153,0.528c2.56,0,4.966-1.001,6.777-2.811
                                            c3.248-3.249,3.783-8.269,1.385-11.981l2.209-2.092v1.299c0,1.026,0.812,1.859,1.838,1.859c1.027,0,1.84-0.833,1.84-1.859V1.844
                                            C31.039,1.347,30.955,0.113,29.13,0z"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <button class="card-footer" style="color: white; border-bottom: none; border-right:none; border-left:none" data-bs-target="#marriage" data-bs-toggle="collapse" aria-expanded="true">
                    View details <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div> 
        <div class="col-lg-3"> 
            <div class="card" style="border: 1px solid; background: #FFA41B">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <p style="font-size: 30px; font-weight:bolder; color:white">{{ $births }}</p>
                            <p style="color: white">Data Kelahiran</p>
                        </div>
                        <div class="col">
                            <svg style="opacity: 40%" fill="white" height="70px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                viewBox="0 0 512 512" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M420.224,261.952c-10.731-6.741-23.936-7.467-35.328-1.984L352,275.797V256c11.797,0,21.333-9.557,21.333-21.333V192
                                            c0-23.531-19.136-42.667-42.667-42.667h-21.333c-6.379,0-21.333,0-21.333-85.333c0-35.285-28.715-64-64-64s-64,28.715-64,64
                                            c0,85.333-14.955,85.333-21.333,85.333h-21.333c-23.531,0-42.667,19.136-42.667,42.667v42.667C74.667,246.443,84.203,256,96,256
                                            v192c0,35.285,28.715,64,64,64h128c34.368,0,62.272-27.285,63.723-61.291l32.512,16.448c5.248,2.667,10.901,3.989,16.533,3.989
                                            c6.635,0,13.227-1.835,19.136-5.44c10.901-6.72,17.429-18.368,17.429-31.168V292.928
                                            C437.333,280.256,430.933,268.693,420.224,261.952z M330.667,213.333H117.333V192h21.333h170.667h21.333V213.333z
                                            M394.667,424.619L352,403.029v-79.893l42.667-20.523V424.619z"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        
                    </div>
                </div>
                <button class="card-footer" style="color: white; border-bottom: none; border-right:none; border-left:none" data-bs-target="#birth" data-bs-toggle="collapse" aria-expanded="false">
                    View details <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div> 
        <div class="col-lg-3"> 
            <div class="card bg-danger" style="border: 1px solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <p style="font-size: 30px; font-weight:bolder; color:white">{{ $healths }}</p>
                            <p style="color: white">Data Kesehatan</p>
                        </div>
                        <div class="col">
                            <svg width="70px" style="opacity: 40%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                <g id="SVGRepo_iconCarrier"> <path d="M22 7.81V12.5H17.92C17.8 12.49 17.54 12.34 17.48 12.23L16.44 10.26C16.03 9.48 15.32 9.04 14.56 9.08C13.8 9.12 13.15 9.63 12.82 10.46L11.44 13.92L11.24 13.4C10.75 12.13 9.35 11.17 7.97 11.17L2 11.2V7.81C2 4.17 4.17 2 7.81 2H16.19C19.83 2 22 4.17 22 7.81Z" fill="#ffffff"/> <path d="M22 16.1887V13.9987H17.92C17.25 13.9987 16.46 13.5187 16.15 12.9287L15.11 10.9587C14.83 10.4287 14.43 10.4587 14.21 11.0087L11.91 16.8187C11.66 17.4687 11.24 17.4687 10.98 16.8187L9.84 13.9387C9.57 13.2387 8.73 12.6687 7.98 12.6687L2 12.6987V16.1887C2 19.7687 4.1 21.9287 7.63 21.9887C7.74 21.9987 7.86 21.9987 7.97 21.9987H15.97C16.12 21.9987 16.27 21.9987 16.41 21.9887C19.92 21.9087 22 19.7587 22 16.1887Z" fill="#ffffff"/> <path d="M2.0007 12.6992V16.0092C1.9807 15.6892 1.9707 15.3492 1.9707 14.9992V12.6992H2.0007Z" fill="#ffffff"/> </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <button class="card-footer" style="color: white; border-bottom: none; border-right:none; border-left:none" data-bs-target="#health" data-bs-toggle="collapse" aria-expanded="false">
                    View details <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div> 
    </div>
    <center>
        <div class="collapsing" id="breeding"></div>
        <div class="collapsing" id="marriage"></div>
        <div class="collapsing mt-5" id="birth"></div>
        <div class="collapsing mt-1" id="health">{{ $counts }}</div>
    </center>
    
@endsection
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawMarriage);
      google.charts.setOnLoadCallback(drawBreed);
    //   google.charts.setOnLoadCallback(drawHealth);
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawBirth);

      function drawMarriage() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'Jumlah Data'],
          ['Proses', {{ $isProcess }}],
          ['Hamil', {{ $isPregnant }}],
          ['Tidak Hamil', {{ $isUnpreg }}]
        ]);

        var options = {
          title: 'Data Perkawinan Berdasarkan Status',
          pieSliceText: 'value',
          'width': 900,
          'height': 500
        };

        var chart = new google.visualization.PieChart(document.getElementById('marriage'));

        chart.draw(data, options);
      }

      function drawBreed() {
        var data = google.visualization.arrayToDataTable([
          ['Jenis Kelamin', 'Jumlah Data'],
          ['Jantan', {{ $male }}],
          ['Betina', {{ $female }}]
        ]);

        var options = {
          title: 'Data Perkawinan Berdasarkan Status',
          pieSliceText: 'value',
          'width': 900,
          'height': 500,
          legend: {
            position: 'top'
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('breeding'));

        chart.draw(data, options);
      }

      function drawBirth() {
        var data = google.visualization.arrayToDataTable([
          ['Bulan', 'Banyak Data'],
          ['Januari', {{ $jan }}],
          ['Februari', {{ $feb }}],
          ['Maret', {{ $march }}],
          ['April', {{ $apr }}],
          ['Mei', {{ $may }}],
          ['Juni', {{ $jun }}],
          ['Juli', {{ $jul }}],
          ['Agustus', {{ $aug }}],
          ['September', {{ $sept }}],
          ['Oktober', {{ $oct }}],
          ['November', {{ $nov }}],
          ['Desember', {{ $dec }}]          
        ]);

        var options = {
            chart: {
                title: 'Data Kelahiran Ternak Tahun 2023'
            },
            bars: 'vertical',
            'width': 800,
            'height': 300,
            legend: {
                position:'none'
            }
        };

        var chart = new google.charts.Bar(document.getElementById('birth'));
        chart.draw(data, options);
      }

    //   function drawHealth() {
    //     var data = google.visualization.arrayToDataTable([
    //         ['ID Ternak', 'Jumlah Data'],
                        
    //     ]);

    //     var options = {
    //         title: 'Data Ternak Sakit Berdasarkan ID Ternak',
    //         pieHole: 0.4,
    //     };
    //     var chart = new google.visualization.PieChart(document.getElementById('health'));
    //     chart.draw(data, options);
    //   }
    </script>