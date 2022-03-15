@extends('layouts.app')

@section('css_before')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

  <!-- Page JS Code -->
  <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-2">
            LISTE DES APPARTEMENTS
          </h1>
          {{-- <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Plugin Integration
          </h2> --}}
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="javascript:void(0)">Apartement</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              List
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
      <div class="block-header block-header-default">
            <h3 class="block-title">
                liste des appartements
            </h3>

        </div>
      <div class="m-3 table-responsive">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom d'apartement</th>
              <th>Bat</th>
              <th>Esc</th>
              <th>Etg</th>
              <th>Type</th>
              <th>Entreprise</th>
              <th>Adresse</th>
              <th>State</th>
              <th>Poste Code</th>
              <th>ipBox</th>
              <th>Tel</th>
              <th>Tel 2</th>
              <th>Map Logitude</th>
              <th>Map Latitude</th>

            </tr>
          </thead>
          <tbody>
            @foreach ( $apartements as $apartement )

              <tr>
                <td class="text-center">{{ $apartement->id }}</td>
                <td class="fw-semibold">
                  <a href="javascript:void(0)">{{ $apartement->apartementName }}</a>
                </td>
                <td>
                  {{ $apartement->batiment }}
                </td>
                <td>
                    {{ $apartement->escalier }}
                  </td>
                <td>
                    {{$apartement->etage}}
                </td>
                <td>
                    {{$apartement->type}}
                </td>
                <td>
                    {{$apartement->adresse->company}}
                </td>
                    <td>
                    {{$apartement->adresse->adress}}

                    </td>
                    <td>
                    {{$apartement->adresse->state}}

                    </td>
                    <td>
                    {{$apartement->adresse->poste}}

                    </td>
                    <td>
                    {{$apartement->adresse->ipBox}}

                    </td>
                    <td>
                    {{$apartement->adresse->tel}}

                    </td>
                    <td>
                    {{$apartement->adresse->tel1}}

                    </td>
                    <td>
                        {{$apartement->adresse->logitude}}
                    </td>
                    <td>
                        {{$apartement->adresse->latitude}}
                    </td>
                {{-- <td class="text-center">
                    <div class="btn-group">

                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </a>
                        <form class="d-inline" action="{{route('users.destroy',$user->id
                            )}}" method="POST" >
                               @csrf
                               @method('DELETE')
                               <button href="" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled">
                                   <i class="fa fa-fw fa-times"></i>
                               </button>
                        </form>
                    </div>
                </td> --}}
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- END Dynamic Table Full -->


  </div>
  <!-- END Page Content -->
@endsection
