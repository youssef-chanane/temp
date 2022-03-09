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
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon

        $("#togglePassword").toggleClass("fa-eye-slash fa-eye");
    });
    const role =document.querySelector("#role");
    const oneapp = document.querySelector("#oneapp");
    $(function(){
        $("#role").change(
            function(){
                console.log($(this).val());
                if($(this).val()=="viewer"){
                    $("#viewer").removeClass("d-none");
                    $("#admin").addClass("d-none");
                    $("#manager").addClass("d-none");
                    $("#technicien").addClass("d-none");
                }else if($(this).val()=="admin"){
                    $("#admin").removeClass("d-none");
                    $("#viewer").addClass("d-none");
                    $("#manager").addClass("d-none");
                    $("#technicien").addClass("d-none");
                }else if($(this).val()=="manager"){
                    $("#manager").removeClass("d-none");
                    $("#viewer").addClass("d-none");
                    $("#admin").addClass("d-none");
                    $("#technicien").addClass("d-none");
                }else{
                    $("#technicien").removeClass("d-none");
                    $("#viewer").addClass("d-none");
                    $("#admin").addClass("d-none");
                    $("#manager").addClass("d-none");
                }
            }
        );
        $("#example-flatpickr-custom").change(
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

        <!-- Page Content -->
    <div class="content">
              <!-- Vertical Block Tabs Default Style -->
              <div class="block block-rounded row g-0">

                <div class="tab-content col-md-12">

                  {{-- <div class="block-content tab-pane" id="btabs-vertical-profile" role="tabpanel" aria-labelledby="btabs-vertical-profile-tab">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">AJOUTER L'ADRESSE DE L'UTILISATEUR</h3>
                        </div>
                        <div class="block-content">
                          <form class="row g-3 needs-validation" novalidate onsubmit="return false;">
                            @csrf
                            <div class="col-12 mb-2">
                                <label class="form-label" for="">Nom de l'entreprise</label>
                                <input type="text" class="form-control"  name="" placeholder="Nom de l'entreprise">
                            </div>
                            <div class="col-12 mb-2">
                                <label class="form-label" for="">Adresse</label>
                                <textarea class="form-control"  name="" rows="4" placeholder="Adresse.."></textarea>
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Code postale</label>
                                <input type="text" class="form-control"  name="" placeholder="Code postale">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">state</label>
                                <input type="text" class="form-control"  name="" placeholder="state">
                            </div>

                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Tel </label>
                                <input type="text" class="form-control"  name="" placeholder="Tel ">
                            </div>

                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Tel 2</label>
                                <input type="text" class="form-control"  name="" placeholder="Tel ">
                            </div>

                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Map Logitude</label>
                                <input type="text" class="form-control"  name="" placeholder="Map ">
                            </div>

                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Map Latitude</label>
                                <input type="text" class="form-control"  name="" placeholder="Map ">
                            </div>
                            <div class="col-12 2">
                              <button class="btn btn-primary" type="submit">Enregistrer</button>
                              <a href="{{route('users.index')}}" class="btn btn-light" >Cancel</a>

                            </div>
                          </form>
                        </div>
                      </div> --}}
                      <!-- END Flatpickr Datetimepicker -->
                  </div>
                  <div class="block-content tab-pane active" id="btabs-vertical-home" role="tabpanel" aria-labelledby="btabs-vertical-home-tab">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">Ajouter Utilisateur</h3>
                        </div>
                        <div class="block-content">
                          <form class="row g-3 needs-validation" method="POST" action="{{route('users.store')}}">
                            @csrf
                            <div class="col-12 col-lg-6 mb-1">
                              <div class="">
                                <label class="form-label" for="val-username">nom d'utilisateur  <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="name" placeholder="Entrer un  nom d'utilisateur.." >

                              </div>
                            </div>

                            <div class="col-12 col-lg-6 mb-1">

                              <label class="form-label" for="val-email">
                                Email <span class="text-danger">*</span>
                              </label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control" name="email" placeholder="Entrer un Email" aria-describedby="inputGroupPrepend" >

                              </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-1 ">
                              <div class="">
                                  <label class="form-label" for="val-password">Mot de passe <span class="text-danger">*</span></label>
                              <div class="input-group has-validation">
                                  <span class="input-group-text" id="inputGroupPrepend">
                                      <i class="fa fa-eye-slash" id="togglePassword"></i>
                                  </span>
                                  <input class="form-control" type="password" name="password" id="password"  placeholder="entrer un mot de passe.." />

                                  </div>
                              </div>
                              </div>

                              <div class="col-12 col-lg-6 mb-1">

                                <div class="">
                                    <label class="form-label" for="example-flatpickr-custom">Compte valable jusqu'à <span class="text-danger">*</span></label>
                                    <input type="text" class="js-flatpickr form-control" id="example-flatpickr-custom" name="disable_at" placeholder="A-m-j" data-date-format="Y-m-d" data-min-date="today" />
                                </div>
                              </div>

                            <div class="col-12 mb-1">
                              <label for="role" class="form-label">Privilége <span class="text-danger">*</span></label>
                              <select class="form-select" name="role" id="role" >
                                <option selected disabled value="">...</option>
                                @if(auth()->user()->role=="super admin")
                                <option value="admin">admin</option>
                                @endif
                                <option value="viewer">viewer</option>
                                <option value="technicien">téchnicien</option>
                                <option value="manager">manager</option>
                              </select>

                            </div>
                            <div id="viewer" class="d-none">
                                <h2 class="content-heading border-bottom mb-1 ">Choisir une Appartement</h2>

                                  <div class="col-12 ">
                                    <div class="mb-1">
                                      <select class="js-select2 form-select" name="apartementsViewer" style="width: 100%;" data-placeholder="Choisir une..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach ($apartementsViewer as $apartement)
                                          <option value="{{$apartement->id}}">{{$apartement->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                            </div>
                            <div id="admin" class="d-none">
                            <h2 class="content-heading border-bottom mb-1">Choisir plusieur appartement</h2>

                              <div class="col-12">
                                <div class="mb-1">
                                  <select class="js-select2 form-select" name="apartementsAdmin[]" style="width: 100%;" data-placeholder="choisir plusieur.." multiple>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach ($apartementsAdmin as $apartement)
                                          <option value="{{$apartement->id}}">{{$apartement->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div id="manager" class="d-none">
                                <h2 class="content-heading border-bottom mb-1">Choisir plusieur appartement</h2>

                                  <div class="col-12">
                                    <div class="mb-1">
                                      <select class="js-select2 form-select"  name="apartementsManager[]" style="width: 100%;" data-placeholder="choisir plusieur.." multiple>
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach ($apartementsManager as $apartement)
                                              <option value="{{$apartement->id}}">{{$apartement->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div id="technicien" class="d-none">
                                    <h2 class="content-heading border-bottom mb-1">Choisir plusieur appartement</h2>

                                      <div class="col-12">
                                        <div class="mb-1">
                                          <select class="js-select2 form-select" name="apartementsTechnicien[]" style="width: 100%;" data-placeholder="choisir plusieur.." multiple>
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach ($apartementsTechnicien as $apartement)
                                                  <option value="{{$apartement->id}}">{{$apartement->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <h2 class="content-heading border-bottom mb-1">Définir l'adresse d'utilisateur</h2>

                                    <div class="col-12 col-lg-6 mb-1">
                                        <input type="text" class="form-control mb-4" id="" name="company" placeholder="Nom de l'entreprise">
                                        <input type="text" class="form-control" id="" name="state" placeholder="state">

                                    </div>
                                    <div class="col-12 col-lg-6 mb-1">
                                        <textarea class="form-control" id="" name="adress" rows="4" placeholder="Adresse.."></textarea>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-1">
                                        <input type="text" class="form-control" id="" name="poste" placeholder="Code postale">

                                    </div>


                                    <div class="col-12 col-lg-4 mb-1">
                                        <input type="text" class="form-control" id="" name="tel" placeholder="Tel ">
                                    </div>

                                    <div class="col-12 col-lg-4 mb-1">
                                        <input type="text" class="form-control" id="" name="tel1" placeholder="Tel 2">
                                    </div>

                                    <div class="col-12 col-lg-4 mb-1">
                                        <input type="text" class="form-control" id="" name="logitude" placeholder="Map Logitude">
                                    </div>

                                    <div class="col-12 col-lg-4 mb-1">
                                        <input type="text" class="form-control" id="" name="latitude" placeholder="Map Latitude">
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

                            <div class="col-12 mb-1">
                              <button class="btn btn-primary" type="submit">Enregistrer</button>
                              <a href="{{route('users.index')}}" class="btn btn-light" >Cancel</a>
                            </div>

                          </form>
                        </div>
                      </div>
                      <!-- END Flatpickr Datetimepicker -->
                  </div>
                </div>
              </div>
              <!-- END Vertical Block Tabs Default Style -->
    </div>

@endsection
