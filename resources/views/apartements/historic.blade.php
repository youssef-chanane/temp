@extends('layouts.app')
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('js/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('js/plugins/dropzone/min/dropzone.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
@endsection
@section('js_after')

{{-- <script src="{{asset('js/oneui.app.js')}}"></script> --}}

<!-- jQuery (required for BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script src="{{asset('js/lib/jquery.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>{{-- <script src="{{asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script> --}}
<script>
    $(
        function(){
            $("form").submit(
                function(){
                    console.log('hi');
                    $("#datatab").removeClass("d-none");
                    $("#datachart").removeClass("d-none");
                }
            );
        }
    );
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {

            labels: ['12:00', '01:00', '02:00', '03:00', '04:00', '05:00'],
            datasets: [{
                label: 'chambre 1',
                data: [10, 11, 12, 10, 9, 9],
                borderColor: 'rgb(128,128,128)',
            },

            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
    </script>

{{-- <script src="{{asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script> --}}
{{-- <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script> --}}
{{-- <script src="{{asset('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script> --}}
{{-- <script src="{{asset('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script> --}}
{{-- <script src="{{asset('js/plugins/dropzone/min/dropzone.min.js')}}"></script> --}}


{{-- js validation --}}
{{-- <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>
<script src="{{asset('js/pages/be_forms_validation.min.js')}}"></script> --}}


<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider + BS Colorpicker plugins) -->
<script>One.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-masked-inputs', 'jq-rangeslider', 'jq-colorpicker']);</script>
@endsection

@section('content')

        <!-- Page Content -->
    <div class="content">
    <!-- Dynamic Table Full -->

    <div class="col-12">
        <!-- Contextual Table -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">

                <form onsubmit="return false;" action="" class="col-12" method="POST">
                  <div class="row ">
                      <div class="col-6 col-lg-4">
                        <label class="form-label" for="example-flatpickr-datetime">De</label>
                        <input type="text" class="js-flatpickr form-control" data-max-date="today" id="start" name="example-flatpickr-datetime"  data-date-format="d-m-Y h:i" placeholder="d-m-Y h:i" data-enable-time="true">
                      </div>
                      <div class="col-3 mb-2">
                        <label class="form-label" for="example-flatpickr-datetime">Vers</label>
                        <input type="text" class="js-flatpickr form-control" data-max-date="today" id="end" name="example-flatpickr-datetime" placeholder="d-m-Y h:i" data-date-format="d-m-Y h:i" data-enable-time="true">
                      </div>
                      <div class="col-2">
                        <button class="btn btn-primary mt-4" type="submit">Voir</button>

                      </div>
                  </div>
                </form>
            </div>
          <div class=" col-12 p-2 table-responsive d-none" id="datatab">
            <table class="table table-borderless table-vcenter table-hover table-striped ">
                <thead>
                    <tr>
                        <th>date</th>
                        <th style="text-align: center">°C</th>
                        <th>consign a</th>
                        <th>consign b</th>
                        <th>Fin manuel</th>
                        <th>percent %</th>
                        <th>compter</th>
                        <th>kwh</th>
                        <th>Regim</th>
                        <th>Puiss</th>
                        <th>diam</th>
                        <th>V.Pos</th>
                    </tr>
                  </thead>
              <tbody>
                @for ($i = 1; $i < 6; $i++)
                <tr id="chambre{{$i}}" >
                    <td>
                        {{now()->format('Y-m-d')}} 0{{$i}}:00
                    </td>
                    <td style="text-align: center">{{$i}}°C</td>
                    <td>consign a</td>
                    <td>consign b</td>
                    <td>Fin manuel</td>
                    <td>{{$i}} %</td>
                    <td>{{$i}}</td>
                    <td>{{$i}}kwh</td>
                    <td>Regim</td>
                    <td>Puiss</td>
                    <td>diam</td>
                    <td>V.Pos</td>
                </tr>
                @endfor

              </tbody>
            </table>
          </div>

        </div>
        <!-- END Contextual Table -->
        <div class="col-12 m-auto d-none" id="datachart">
            <!-- Lines Chart -->
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Lines</h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                  </button>
                </div>
              </div>
              <div class="block-content block-content-full text-center">
                <div class="py-3">
                  <!-- Lines Chart Container -->
                  <canvas id="myChart" width="400" height="200"></canvas>
                </div>
              </div>
            </div>
            <!-- END Lines Chart -->
          </div>
    </div>

@endsection
