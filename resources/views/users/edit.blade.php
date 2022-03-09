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
    //   const togglePassword = document.querySelector("#togglePassword");
    //   const password = document.querySelector("#password");


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
            <div class="col-12">
              <div class="mb-2">
                <label class="form-label" for="val-username">nom d'utilisateur  <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="val-username" name="name" value="{{old('name',isset($user->name) ? $user->name:'') ?? NULL}}" placeholder="Entrer un  nom d'utilisateur.." >

              </div>
            </div>

            <div class="col-12 mb-2">

              <label class="form-label" for="val-email">
                Email <span class="text-danger">*</span>
              </label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="email" class="form-control" name="email" placeholder="Entrer un Email" aria-describedby="inputGroupPrepend"  value="{{old('email',isset($user->email) ? $user->email:'') ?? NULL}}">

              </div>
            </div>


              <div class="col-12">

                <div class=" mb-2">
                    <label class="form-label" for="example-flatpickr-custom">Compte valable jusqu'à <span class="text-danger">*</span></label>
                    <input type="text" class="js-flatpickr form-control" id="example-flatpickr-custom" name="disable_at" value="{{old('disable_at',isset($user->disable_at) ? $user->disable_at:'') ?? NULL}}" placeholder="A-m-j" data-date-format="Y-m-d" data-min-date="today"/>
                </div>
              </div>
              <div class="col-12">

                <div class=" mb-2">
                    <label class="form-label" for="example-flatpickr-custom">Ajouter sous compte <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="val-username" name="sub_acount" value="{{old('sub_acount',isset($user->sub_acount) ? $user->sub_acount:'') ?? NULL}}" placeholder="Entrer un sous compte.." >
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
              <a href="{{route('users.index')}}" class="btn btn-light" >Cancel</a>
            </div>
          </form>
        </div>
      </div>
      <!-- END Flatpickr Datetimepicker -->
  </div>
</div>
@endsection
