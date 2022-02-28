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
                    $("#oneapp").removeClass("d-none");
                    $("#plusapp").addClass("d-none");
                }else{
                    $("#oneapp").addClass("d-none");
                    $("#plusapp").removeClass("d-none");
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
                <ul class="nav nav-tabs nav-tabs-block flex-md-column col-md-4" role="tablist">
                  <li class="nav-item d-md-flex flex-md-column">
                    <button class="nav-link text-md-start active" id="btabs-vertical-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-home" role="tab" aria-controls="btabs-vertical-home" aria-selected="true">
                        <i class="fa fa-fw fa-user-circle opacity-50 me-1 d-none d-sm-inline-block"></i> Profile
                    </button>
                  </li>
                  <li class="nav-item d-md-flex flex-md-column">
                    <button class="nav-link text-md-start" id="btabs-vertical-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-profile" role="tab" aria-controls="btabs-vertical-profile" aria-selected="false">
                        <i class="far fa-fw fa-address-card opacity-50 me-1 d-none d-sm-inline-block"></i>  Adresse
                    </button>
                  </li>
                  <li class="nav-item d-md-flex flex-md-column">
                    <a href="{{route("users.index")}}" class="nav-link text-md-start"  aria-selected="false">
                        <i class="fa fa-fw fa-home opacity-50 me-1 d-none d-sm-inline-block"></i>  retourner à la liste des utilisateurs
                  </a>
                  </li>
                </ul>
                <div class="tab-content col-md-8">

                  <div class="block-content tab-pane" id="btabs-vertical-profile" role="tabpanel" aria-labelledby="btabs-vertical-profile-tab">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">AJOUTER L'ADRESSE DE L'UTILISATEUR</h3>
                        </div>
                        <div class="block-content">
                          <form class="row g-3 needs-validation" novalidate onsubmit="return false;">
                            @csrf
                            <div class="col-12 mb-2">
                                <label class="form-label" for="">Nom de l'entreprise</label>
                                <input type="text" class="form-control" id="" name="" placeholder="Nom de l'entreprise">
                            </div>
                            <div class="col-12 mb-2">
                                <label class="form-label" for="">Adresse</label>
                                <textarea class="form-control" id="" name="" rows="4" placeholder="Adresse.."></textarea>
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Code postale</label>
                                <input type="text" class="form-control" id="" name="" placeholder="Code postale">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">state</label>
                                <input type="text" class="form-control" id="" name="" placeholder="state">
                            </div>

                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Tel </label>
                                <input type="text" class="form-control" id="" name="" placeholder="Tel ">
                            </div>

                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Tel 2</label>
                                <input type="text" class="form-control" id="" name="" placeholder="Tel ">
                            </div>

                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Map Logitude</label>
                                <input type="text" class="form-control" id="" name="" placeholder="Map ">
                            </div>

                            <div class="col-12 col-lg-6 mb-2">
                                <label class="form-label" for="">Map Latitude</label>
                                <input type="text" class="form-control" id="" name="" placeholder="Map ">
                            </div>
                            <div class="col-12 2">
                              <button class="btn btn-primary" type="submit">Enregistrer</button>
                            </div>
                          </form>
                        </div>
                      </div>
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
                            <div class="col-12">
                              <div class="mb-2">
                                <label class="form-label" for="val-username">nom d'utilisateur  <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="name" placeholder="Entrer un  nom d'utilisateur.." required>
                                <div class="valid-feedback">
                                  semble bien!
                                </div>
                                <div class="invalid-feedback">
                                  Veuillez choisir un nom d'utilisateur .
                                </div>
                              </div>
                            </div>

                            <div class="col-12 mb-2">

                              <label class="form-label" for="val-email">
                                Email <span class="text-danger">*</span>
                              </label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control" name="email" placeholder="Entrer un Email" aria-describedby="inputGroupPrepend" required>
                                <div class="valid-feedback">
                                  semble bien!
                                </div>
                                <div class="invalid-feedback">
                                  Veuillez saisir un email valide.
                                </div>
                              </div>
                            </div>
                            <div class="col-12 ">
                              <div class="mb-2">
                                  <label class="form-label" for="val-password">Mot de passe <span class="text-danger">*</span></label>
                              <div class="input-group has-validation">
                                  <span class="input-group-text" id="inputGroupPrepend">
                                      <i class="fa fa-eye-slash" id="togglePassword"></i>
                                  </span>
                                  <input class="form-control" type="password" name="password" id="password"  placeholder="entrer un mot de passe.." required/>
                                  <div class="valid-feedback">
                                      semble bien!
                                  </div>
                                  <div class="invalid-feedback">
                                      Veuillez choisir un Mot de passe.
                                  </div>
                                  </div>
                              </div>
                              </div>

                              <div class="col-12">

                                <div class=" mb-2">
                                    <label class="form-label" for="example-flatpickr-custom">Compte valable jusqu'à <span class="text-danger">*</span></label>
                                    <input type="text" class="js-flatpickr form-control" id="example-flatpickr-custom" name="disable_at" placeholder="j-m-A" data-date-format="d-m-Y" data-min-date="today" required/>
                                </div>
                              </div>

                            <div class="col-12">
                              <label for="role" class="form-label">Privilége <span class="text-danger">*</span></label>
                              <select class="form-select" name="role" id="role" required>
                                <option selected disabled value="">...</option>
                                @if(auth()->user()->role=="super admin")
                                <option value="admin">admin</option>
                                @endif
                                <option value="viewer">viewer</option>
                                <option value="téchnicien">téchnicien</option>
                                <option value="manager">manager</option>
                              </select>
                              <div class="invalid-feedback">
                                Veuillez sélectionner un rôle valide.
                              </div>
                              <div class="valid-feedback">
                                semble bien!
                              </div>
                            </div>
                            <div id="oneapp" class="d-none">
                                <h2 class="content-heading border-bottom mb-2 pb-2">Choisir une Appartement</h2>

                                  <div class="col-12 ">
                                    <div class="mb-2">
                                      <select class="js-select2 form-select" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choisir une..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @for($i=0;$i<5;$i++)
                                          <option value="{{$i}}">Appartement {{$i}}</option>
                                        @endfor
                                      </select>
                                    </div>
                                  </div>
                            </div>
                            <div id="plusapp" class="d-none">
                            <h2 class="content-heading border-bottom mb-2 pb-2">Choisir plusieur appartement</h2>

                              <div class="col-12">
                                <div class="mb-2">
                                  <select class="js-select2 form-select" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="choisir plusieur.." multiple>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @for($i=0;$i<5;$i++)
                                      <option value="{{$i}}">appartement {{$i}}</option>
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
                      <!-- END Flatpickr Datetimepicker -->
                  </div>
                </div>
              </div>
              <!-- END Vertical Block Tabs Default Style -->

            <!-- Flatpickr Datetimepicker (.js-flatpickr class is initialized in Helpers.jsFlatpickr()) -->
            <!-- For more info and examples you can check out https://github.com/flatpickr/flatpickr -->
            {{-- <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Ajouter Utilisateur</h3>
              </div>
              <div class="block-content">
                <form class="row g-3 needs-validation" novalidate onsubmit="return false;">
                  @csrf
                  <div class="col-8 ">
                    <div class="mb-4">
                      <label class="form-label" for="val-username">nom d'utilisateur  <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Entrer un  nom d'utilisateur.." required>
                      <div class="valid-feedback">
                        semble bien!
                      </div>
                      <div class="invalid-feedback">
                        Veuillez choisir un nom d'utilisateur .
                      </div>
                    </div>
                  </div>

                  <div class="col-8 mb-4">

                    <label class="form-label" for="val-email">
                      Email <span class="text-danger">*</span>
                    </label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" class="form-control" id="validationCustomUsername" placeholder="Entrer un Email" aria-describedby="inputGroupPrepend" required>
                      <div class="valid-feedback">
                        semble bien!
                      </div>
                      <div class="invalid-feedback">
                        Veuillez saisir un email valide.
                      </div>
                    </div>
                  </div>
                  <div class="col-8 ">
                    <div class="mb-4">
                        <label class="form-label" for="val-password">Mot de passe <span class="text-danger">*</span></label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">
                            <i class="fa fa-eye-slash" id="togglePassword"></i>
                        </span>
                        <input class="form-control" type="password" name="password" id="password"  placeholder="entrer un mot de passe.." required/>
                        <div class="valid-feedback">
                            semble bien!
                        </div>
                        <div class="invalid-feedback">
                            Veuillez choisir un Mot de passe.
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-8">

                      <div class=" mb-4">
                          <label class="form-label" for="example-flatpickr-custom">Compte valable jusqu'à <span class="text-danger">*</span></label>
                          <input type="text" class="js-flatpickr form-control" id="example-flatpickr-custom" name="example-flatpickr-custom" placeholder="j-m-A" data-date-format="d-m-Y" data-min-date="today" required/>
                      </div>
                    </div>

                  <div class="col-8">
                    <label for="role" class="form-label">Privilége <span class="text-danger">*</span></label>
                    <select class="form-select" name="role" id="role" required>
                      <option selected disabled value="">...</option>
                      <option value="admin">admin</option>
                      <option value="viewer">viewer</option>
                      <option value="téchnicien">téchnicien</option>
                      <option value="manager">manager</option>
                    </select>
                    <div class="invalid-feedback">
                      Veuillez sélectionner un rôle valide.
                    </div>
                    <div class="valid-feedback">
                      semble bien!
                    </div>
                  </div>
                  <div id="oneapp" class="d-none">
                      <h2 class="content-heading border-bottom mb-4 pb-2">Choisir une Appartement</h2>

                        <div class="col-8 ">
                          <div class="mb-4">
                            <select class="js-select2 form-select" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choisir une..">
                              <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                              @for($i=0;$i<5;$i++)
                                <option value="{{$i}}">Appartement {{$i}}</option>
                              @endfor
                            </select>
                          </div>
                        </div>
                  </div>
                  <div id="plusapp" class="d-none">
                  <h2 class="content-heading border-bottom mb-4 pb-2">Choisir plusieur appartement</h2>

                    <div class="col-8">
                      <div class="mb-4">
                        <select class="js-select2 form-select" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="choisir plusieur.." multiple>
                          <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          @for($i=0;$i<5;$i++)
                            <option value="{{$i}}">appartement {{$i}}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-4">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                  </div>
                </form>
              </div>
            </div> --}}
            <!-- END Flatpickr Datetimepicker -->
    </div>

@endsection
