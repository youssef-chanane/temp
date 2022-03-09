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

<script>
    $(function(){
      var tab=["table-active","table-primary","table-warning","table-danger","table-info","table-success"];
      for(i=1;i<6;i++){
          $(`#chambre${i}`).addClass(tab[i-1]);
      }
      $("#example-flatpickr-datetime").change(
            function(){
                console.log($(this).val());
            }
        );
      console.log(tab[0]);

  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>{{-- <script src="{{asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script> --}}
<script src="{{asset('js/plugins/jsdelivr/chartjs.bundle.min.js')}}"></script>
<script>
    var tab1=["rgb(128,128,128)","rgb(185,207,255)","rgb(251,202,174)","rgb(243,92,92)","rgb(158,255,85)","rgb(24,99,205)"];
    var format;
    // console.log()
    const ctx = document.getElementById('myChart');
    const ctx1 = document.getElementById('myChart1');
    const rooms = @json($user->apartements[0]->rooms);
    console.log(rooms);
    // var temp1 = rooms[0].temperatures;



    var i =0;
    // const len = temp.size;
    const len = rooms[0].temp_filtre.length;
    var start = Date.parse(rooms[0].temp_filtre[len-1].Date_temperatures);
    var end =Date.parse(rooms[0].temp_filtre[0].Date_temperatures);
    // use to change date format
    var x1;
    //use
    var x2;

    console.log(end);
    if((start-end) < 86400000 ){
        x1= 'hour';
        x2=6;
    }else if((start-end)< 2592000000 ){
        x1="day";
        x2=144;
    }else
    {
        x1 = "month";
        x2=432;
    }
    // console.log(Date.parse(rooms[0].temp_filtre[0].Date_temperatures)-Date.parse(rooms[0].temp_filtre[len-1].Date_temperatures));
    let chart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets:
            rooms.map(
                (elem,i)=>({
                    fill: false,
                     borderColor: tab1[i],
                    label: elem.number_name,

                    data:elem.temp_filtre.map(element => ({
                            x: element.Date_temperatures,
                            y: element.Temperature_Values
                    }))
                })
            )
    },
    options: {
        responsive: true,
        interaction: {
          intersect: false,
        },
        scales: {
            y: {
                display: true,

        suggestedMin: 14,
        suggestedMax: 20
      },
      xAxis: {
                type: 'time',
                time: {
                    unit: x1,
                    displayFormats: {
                            hour: 'HH:mm',
                        }
                }
            }
        },

        elements: {
                    point:{
                        radius: 0
                    },
                    responsive: true,
                }
    }
}
);



//bar chart
let labels = [];
let data1 = []



let chart3=[];
rooms.forEach((element,i) => {
    data1[element.id]=  {
//   labels: ['lunid','mardi','mercredi'],
  datasets: [{
    label: element.number_name,
    data: element.temp_filtre.filter((el,i)=>i%x2==0).map(element => ({
                            x: element.Date_temperatures,
                            y: element.kWh
                    })),
    backgroundColor: tab1[i],
    borderColor: [
      'rgb(255, 99, 132)'

    ],
    borderWidth: 1
  }]
};
     config = {
  type: 'bar',
  data: data1[element.id],
  options: {
        responsive: true,
        scales: {
      xAxis: {
                // id:"a",
                type: 'time',
                time: {
                    unit: x1,
                    displayFormats: {
                            hour: 'HH:mm',
                        }
                }
            }
        },
        elements: {
                point:{
                    radius: 0
                },
            responsive: true,
        }
    },
};
    console.log(element.temp_filtre[0].Date_temperatures);
    chart3[element.id] = new Chart(
        document.getElementById(`histo${element.id}`),config
    );
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
            <h3 class="block-title">la température des piéces de l'appartement</h3>

          </div>
          <div class="block-header block-header-default">

            <form  action="" class="col-12" method="GET">
                @csrf
              <div class="row ">
                  <div class="col-6 col-lg-4">
                    <label class="form-label" for="">Voir la température à l'instant</label>
                    <input type="text" class="js-flatpickr form-control" data-max-date="today" id="" name="filtre" data-date-format="d-m-Y h:i"  placeholder="d-m-Y h:i" data-enable-time="true">
                  </div>
                  <div class="col-3 mb-2">
                      <button class="btn btn-primary mt-4" type="submit">Voir</button>
                  </div>
              </div>
            </form>
            </div>
          <div class="p-2 table-responsive">
            <table class="table table-borderless table-vcenter table-hover">
                <thead>
                    <tr>
                        <th>chambre</th>
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
                @foreach ($user->apartements as $apartement)
                <div class="d-none"> {{$i=1}}</div>
                @foreach ($apartement->rooms as $room)
                <tr id="chambre{{$i}}">
                    <td>

                        {{$room->number_name}}
                    </td>
                    <td style="text-align: center"> {{($room->temperature)?$room->temperature->Temperature_Values:""}}°C</td>
                    <td>
                        {{($room->temperature)?$room->temperature->Consigne_A:""}}

                    </td>
                    <td>
                        {{($room->temperature)?$room->temperature->Consigne_B:""}}

                    </td>
                    <td>
                        {{($room->temperature)?$room->temperature->Fin_Manuel:""}}
                    </td>
                    <td>
                        {{($room->temperature)?$room->temperature->Percent:""}}
                    </td>
                    <td>
                        {{($room->temperature)?$room->temperature->Compter:""}}
                    </td>
                    <td>
                        {{($room->temperature)?$room->temperature->kWh:""}}
                    </td>
                    <td>
                        {{($room->temperature)?$room->temperature->Regim:""}}
                    </td>
                    <td>
                        {{($room->temperature)?$room->temperature->Puiss:""}}
                    </td>
                    <td>
                        {{($room->temperature)?$room->temperature->Diam:""}}
                    </td>
                    <td>
                        {{($room->temperature)?$room->temperature->V_Pos:""}}
                    </td>
                </tr>
                <div class="d-none">
                    {{$i++}}
                </div>
                @endforeach
                @endforeach

              </tbody>
            </table>
          </div>

        </div>
        <!-- END Contextual Table -->
        <div class="col-12 m-auto">


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
              <div class="block-header block-header-default">

                <form  action="" class="col-12" method="GET">
                    @csrf
                  <div class="row ">
                      <div class="col-6 col-lg-4">
                        <label class="form-label" for="example-flatpickr-datetime">De</label>
                        <input type="text" class="js-flatpickr form-control" data-max-date="today" id="start" name="start" data-date-format="d-m-Y h:i"  placeholder="d-m-Y h:i" data-enable-time="true">
                      </div>
                      <div class="col-3 mb-2">
                        <label class="form-label" for="example-flatpickr-datetime">Vers</label>
                        <input type="text" class="js-flatpickr form-control" data-max-date="today" id="end" name="end" data-date-format="d-m-Y h:i"  placeholder="d-m-Y h:i" data-enable-time="true">
                      </div>
                      <div class="col-2">
                        <button class="btn btn-primary mt-4" type="submit">Voir</button>

                      </div>
                  </div>
                </form>
            </div>
              <div class="block-content block-content-full text-center">
                <div class="py-3">
                  <!-- Lines Chart Container -->
                  <canvas id="myChart" width="400" height="200"></canvas>
                </div>
                {{-- <div class="py-3">
                    <!-- Bar Chart Container -->
                    <canvas id="myChart1" width="400" height="200"></canvas>
                  </div> --}}
                @foreach ($user->apartements as $apartement)
                    @foreach ($apartement->rooms as $room)
                        <div class="py-3">
                        <!-- Bar Chart Container -->
                        {{-- {{$room->id}} --}}
                        <canvas id="histo{{$room->id}}" width="400" height="200"></canvas>
                      </div>
                    @endforeach
                @endforeach
              </div>
            </div>
            <!-- END Lines Chart -->
          </div>
    </div>

@endsection
