@extends('layouts.simple')
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/dropzone/min/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
@endsection
@section('js_after')

<script src="{{asset('js/oneui.app.js')}}"></script>

<!-- jQuery (required for BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script src="{{asset('js/lib/jquery.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
{{-- <script src="{{asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script> --}}
<script src="{{asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('js/plugins/dropzone/min/dropzone.min.js')}}"></script>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<script>

    const role =document.querySelector("#role");
    const oneapp = document.querySelector("#oneapp");
    $(function(){
        $("#role").change(
            function(){
                console.log($(this).val());
                if($(this).val()=="viewer"){
                    $("#oneapp").removeClass("d-none");
                    $("#plusapp").addClass("d-none");
                }else{
                    $("#oneapp").addClass("d-none");
                    $("#plusapp").removeClass("d-none");
                }
            }
        );

    });
</script>
{{-- js validation --}}
{{-- <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>
<script src="{{asset('js/pages/be_forms_validation.min.js')}}"></script> --}}


<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider + BS Colorpicker plugins) -->
<script>One.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-masked-inputs', 'jq-rangeslider', 'jq-colorpicker']);</script>
@endsection

@section('content')
{{-- <main id="main-container" class="container"> --}}
        <!-- Page Content -->
    <div class="content ">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Ajouter Une appartement</h3>
              </div>
              <div class="block-content">
                <form class="row g-3" novalidate onsubmit="return false;">
                  @csrf
                  <div class="col-12 col-lg-6 ">
                    <div class="mb-1">
                      <input type="text" class="form-control" id="" name="val-username" placeholder="nom de l'appartement" required>

                    </div>
                  </div>
                  <div  class="col-12 col-lg-6">
                      <div>
                        <div class="mb-1">
                            <select class="js-select2 form-select" id="" name="example-select2-multiple" style="width: 100%;" data-placeholder="les piéces de l'appartement.." multiple>
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            @for($i=0;$i<5;$i++)
                              <option value="{{$i}}">Chambre {{$i}}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control mb-1" id="" name="" placeholder="Nom de l'entreprise">
                    </div>
                    <div class="col-12 col-lg-6 mb-1">
                        <textarea class="form-control" id="" name="" rows="4" placeholder="Adresse.."></textarea>
                    </div>
                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control" id="" name="" placeholder="Code postale">

                    </div>
                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control" id="" name="" placeholder="state">
                    </div>

                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control" id="" name="" placeholder="Tel ">
                    </div>

                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control" id="" name="" placeholder="Tel 2">
                    </div>

                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control" id="" name="" placeholder="Map Logitude">
                    </div>

                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control" id="" name="" placeholder="Map Latitude">
                    </div>
                  <div  class="col-12 col-lg-6">
                      <h2 class="content-heading border-bottom  p-0">Choisir le viewer de l'appartement</h2>

                        <div >
                          <div class="mb-1">
                            <select class="js-select2 form-select" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choisir une..">
                              <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                              @for($i=0;$i<5;$i++)
                                <option value="{{$i}}">Viewer {{$i}}</option>
                              @endfor
                            </select>
                          </div>
                        </div>
                  </div>
                  <div  class="col-12 col-lg-6">
                  <h2 class="content-heading border-bottom  p-0">Choisir un ou plusieurs technicien</h2>

                    <div>
                      <div class="mb-1">
                        <select class="js-select2 form-select" id="" name="example-select2-multiple" style="width: 100%;" data-placeholder="choisir plusieur.." multiple>
                          <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          @for($i=0;$i<5;$i++)
                            <option value="{{$i}}">Technicien {{$i}}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </div>
                  {{-- ce champ sera visible sauf si l'utilisateur et superadmin --}}
                  <div class="col-12 col-lg-6 ">
                    <h2 class="content-heading border-bottom p-0">Choisir l'admin de l'appartement </h2>

                      <div >
                        <div class="mb-1">
                          <select class="js-select2 form-select" id="" name="example-select2" style="width: 100%;" data-placeholder="Choisir une..">
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            @for($i=0;$i<5;$i++)
                              <option value="{{$i}}">Admin {{$i}}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                </div>
                <div class="col-12 col-lg-6 ">
                    <h2 class="content-heading border-bottom p-0">Choisir le manager de l'appartement </h2>
                      <div >
                        <div class="mb-1">
                          <select class="js-select2 form-select" id="" name="example-select2" style="width: 100%;" data-placeholder="Choisir une..">
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            @for($i=0;$i<5;$i++)
                              <option value="{{$i}}">Manager {{$i}}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                </div>
                  <div class="col-12 mb-2">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                  </div>
                </form>
              </div>
            </div>
    </div>
{{-- </main> --}}
@endsection
