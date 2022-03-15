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


    $(function(){
        $("select").change(
            function(){
                console.log($(this).val());

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
                <h3 class="block-title">Ajout d 'un appartement</h3>
              </div>
              <div class="block-content">
                <form class="row g-3" action="{{route('apartements.store')}}" method="POST">
                  @csrf
                  <div class="col-12 col-lg-6 ">
                    <div class="mb-1">
                      <input type="text" class="form-control" value="{{old('apartementName') ?? NULL}}" name="apartementName" placeholder="nom de l'appartement">

                    </div>
                  </div>
                  <div class="col-12 col-lg-6 ">
                    <div class="mb-1">
                      <input type="text" class="form-control" value="{{old('batiment') ?? NULL}}" name="batiment" placeholder="Bâtiment N°: ">
                    </div>
                  </div>
                  <div class="col-12 col-lg-6 ">
                    <div class="mb-1">
                      <input type="text" class="form-control" value="{{old('escalier') ?? NULL}}" name="escalier" placeholder="Escalier ">
                    </div>
                  </div>
                  <div class="col-12 col-lg-6 ">
                    <div class="mb-1">
                      <input type="text" class="form-control" value="{{old('etage') ?? NULL}}" name="etage" placeholder="Etage ">
                    </div>
                  </div>
                    <div class="mb-1 col-12 col-lg-6">
                      <select class="js-select2 form-select"   name="type" data-placeholder="Type">
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          @for ( $i=1;$i<=10;$i++)
                              <option value="F{{$i}}">F{{$i}}</option>
                          @endfor
                      </select>
                    </div>
                  <div  class="col-12 col-lg-6">
                      <div>
                        <div class="mb-4">
                            <select class="js-select2 form-select" multiple="multiple" id="" name="number_name[]" style="width: 100%;" data-placeholder="les piéces de l'appartement.." multiple>
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            <option value="cuisine" selected>Cuisine</option>
                            <option value="salon" selected>Salon</option>
                            {{-- <option value="Garde-manger">Garde manger</option> --}}
                            <option value="Salle-a-manger">Salle à manger</option>
                            <option value="Salle-de-réception">Salle de réception</option>
                            @for($i=1;$i<7;$i++)
                              <option value="chambre{{$i}}">Chambre {{$i}}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-lg-6 mb-1">
                        <textarea class="form-control"  name="adress" rows="4" placeholder="Adresse..">{{old('adress') ?? NULL}}</textarea>
                    </div>
                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control mb-4" value="{{old('state') ?? NULL}}" name="state" placeholder="state">
                        <input type="text" class="form-control " value="{{old('company') ?? NULL}}" name="company" placeholder="Nom de l'entreprise">

                    </div>
                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control" value="{{old('poste') ?? NULL}}" name="poste" placeholder="Code postale">

                    </div>
                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control" id="ipBox" value="{{old('ipBox') ?? NULL}}" name="ipBox" placeholder="ip box">
                    </div>

                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control"  name="tel" value="{{old('tel') ?? NULL}}" placeholder="Tel ">
                    </div>

                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control"  name="tel1" value="{{old('tel1') ?? NULL}}" placeholder="Tel 2">
                    </div>

                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control"  name="logitude" value="{{old('logitude') ?? NULL}}" placeholder="Map Logitude">
                    </div>
                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control"  name="latitude" value="{{old('latitude') ?? NULL}}" placeholder="Map Latitude">
                    </div>
                  <div  class="col-12 col-lg-6">
                      <h2 class="content-heading border-bottom  p-0">Choisir le viewer de l'appartement</h2>
                        <div >
                          <div class="mb-1">
                            <select class="js-select2 form-select" id="example-select2" name="viewer" style="width: 100%;" data-placeholder="Choisir une..">
                              <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                @foreach ( $viewers as $viewer)
                                    <option value="{{$viewer->id}}">{{$viewer->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                  </div>
                  <div  class="col-12 col-lg-6">
                  <h2 class="content-heading border-bottom  p-0">Choisir un ou plusieurs technicien</h2>

                    <div>
                      <div class="mb-1">
                        <select class="js-select2 form-select" id="" name="technicien[]" multiple="multiple" style="width: 100%;" data-placeholder="choisir plusieur.." multiple>
                          <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          @foreach($techniciens as $technicien)
                            <option value="{{$technicien->id}}">{{$technicien->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  {{-- ce champ sera visible sauf si l'utilisateur et superadmin --}}
                @if(auth()->user()->role=="super admin" || auth()->user()->role=="super-admin")
                  <div class="col-12 col-lg-6 ">
                    <h2 class="content-heading border-bottom p-0">Choisir l'admin de l'appartement </h2>

                      <div >
                        <div class="mb-1">
                          <select class="js-select2 form-select" id="" name="admin" style="width: 100%;" data-placeholder="Choisir une..">
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            @foreach ( $admins as $admin)
                                <option value="{{$admin->id}}">{{$admin->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                </div>
                @endif
                <div class="col-12 col-lg-6 ">
                    <h2 class="content-heading border-bottom p-0">Choisir le manager de l'appartement </h2>
                      <div >
                        <div class="mb-1">
                          <select class="js-select2 form-select" id="" name="manager" style="width: 100%;" data-placeholder="Choisir une..">
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            @foreach ( $managers as $manager)
                                <option value="{{$manager->id}}">{{$manager->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                       <ul>
                           @foreach($errors->all() as $error)
                           <li class="list-group-item text-danger">{{$error}}</li>
                           @endforeach
                       </ul>
                    </div>
                @endif
                  <div class="col-12 mb-2">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                    <a href="{{url()->previous()}}" class="btn btn-light" >Cancel</a>
                  </div>
                </form>
              </div>
            </div>
    </div>
{{-- </main> --}}
@endsection
