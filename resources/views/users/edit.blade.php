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
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon

        $("#togglePassword").toggleClass("fa-eye-slash fa-eye");
    });

</script>



<script>One.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-masked-inputs', 'jq-rangeslider', 'jq-colorpicker']);</script>

@endsection
@section('content')
<div class="block-content tab-pane active" id="btabs-vertical-home" role="tabpanel" aria-labelledby="btabs-vertical-home-tab">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Modifier l'utilisateur</h3>
        </div>
        <div class="block-content">
          <form class="row g-3 needs-validation" method="POST" action="{{route('users.update',$user->id)}}">
            @method('PUT')
            @csrf
            <div class="col-12 col-lg-6 mb-1">
              <div class="">
                <label class="form-label" for="val-username">nom d'utilisateur  <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="val-username" name="name" value="{{old('name',isset($user->name) ? $user->name:'') ?? NULL}}" placeholder="Entrer un  nom d'utilisateur.." >

              </div>
            </div>

            <div class="col-12 col-lg-6 mb-1">

              <label class="form-label" for="val-email">
                Email <span class="text-danger">*</span>
              </label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="email" class="form-control" name="email"  value="{{old('email',isset($user->email) ? $user->email:'') ?? NULL}}" placeholder="Entrer un Email" aria-describedby="inputGroupPrepend" >

              </div>
            </div>
            <div class="col-12 col-lg-6 mb-1 ">
              <div class="">
                  <label class="form-label" for="val-password">Nouveau Mot de passe <span class="text-danger"></span></label>
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
                    <input type="text" class="js-flatpickr form-control"  id="example-flatpickr-custom" name="disable_at" value="{{old('disable_at',isset($user->disable_at) ? $user->disable_at:'') ?? NULL}}"  placeholder="A-m-j" data-date-format="Y-m-d" data-min-date="today" />
                </div>
              </div>
              @if($user->role!='viewer')
              <div>
                <h2 class="content-heading border-bottom mb-1">Choisir plusieurs appartement</h2>

                  <div class="col-12">
                    <div class="mb-1">
                      <select class="js-select2 form-select" name="apartements[]" style="width: 100%;" data-placeholder="choisir plusieur.." multiple>
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        @foreach ($user->apartements as $apartement)
                            <option value="{{$apartement->id}}" selected>{{$apartement->apartementName}}</option>
                        @endforeach
                        @foreach ($apartements as $apartement)
                              <option value="{{$apartement->id}}">{{$apartement->apartementName}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                @else
                <div>
                    <h2 class="content-heading border-bottom mb-1 ">Choisir une Appartement</h2>

                      <div class="col-12 ">
                        <div class="mb-1">
                          <select class="js-select2 form-select" name="apartement" style="width: 100%;" data-placeholder="Choisir une..">
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            @foreach ($user->apartements as $apartement)
                                <option value="{{$apartement->id}}" selected>{{$apartement->apartementName}}</option>
                            @endforeach
                            @foreach ($apartements as $apartement)
                              <option value="{{$apartement->id}}">{{$apartement->apartementName}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                </div>
                @endif
                    <h2 class="content-heading border-bottom mb-1">Changer l'adresse d'utilisateur</h2>

                    <div class="col-12 col-lg-6 mb-1">
                        <input type="text" class="form-control mb-4" name="company"  value="{{old('company',isset( $user->personal->company) ?  $user->personal->company:'') ?? NULL}}" placeholder="Nom de l'entreprise">
                        <input type="text" class="form-control" name="state" placeholder="state">

                    </div>
                    <div class="col-12 col-lg-6 mb-1">
                        <textarea class="form-control" name="adress" rows="4"  placeholder="Adresse..">{{old('adress',isset( $user->personal->adress) ?  $user->personal->adress:'') ?? NULL}}</textarea>
                    </div>
                    <div class="col-12 col-lg-4 mb-1">
                        <input type="text" class="form-control" name="poste"  value="{{old('poste',isset( $user->personal->poste) ?  $user->personal->poste:'') ?? NULL}}" placeholder="Code postale">

                    </div>


                    <div class="col-12 col-lg-4 mb-1">
                        <input type="text" class="form-control" name="tel" value="{{old('tel',isset( $user->personal->tel) ?  $user->personal->tel:'') ?? NULL}}" placeholder="Tel " >
                    </div>

                    <div class="col-12 col-lg-4 mb-1">
                        <input type="text" class="form-control" name="tel1" value="{{old('tel1',isset( $user->personal->tel1) ?  $user->personal->tel1:'') ?? NULL}}" placeholder="Tel 2">
                    </div>

                    <div class="col-12 col-lg-4 mb-1">
                        <input type="text" class="form-control" name="logitude" value="{{old('logitude',isset( $user->personal->logitude) ?  $user->personal->logitude:'') ?? NULL}}" placeholder="Map Logitude">
                    </div>

                    <div class="col-12 col-lg-4 mb-1">
                        <input type="text" class="form-control" name="latitude" value="{{old('latitude',isset( $user->personal->latitude) ?  $user->personal->latitude:'') ?? NULL}}" placeholder="Map Latitude">
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
              <a href="{{route('users.index')}}" class="btn btn-light" >Cancel</a>
            </div>
          </form>
        </div>
      </div>
      <!-- END Flatpickr Datetimepicker -->
  </div>
</div>
@endsection
