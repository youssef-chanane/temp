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
            LISTE DES UTILISATEURS
          </h1>
          {{-- <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Plugin Integration
          </h2> --}}
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="javascript:void(0)">Utilisateur</a>
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
                liste des utilisateurs
            </h3>
            <div>
                <a href="{{route('users.create')}}" class="btn btn-success">
                    ajouter utilisateur
                </a>
            </div>
        </div>
      <div class="m-3 table-responsive">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
          <thead>
            <tr>
              <th class="text-center" style="width: 80px;">#</th>
              <th>UserName</th>
              <th class="d-none d-sm-table-cell" style="max-width: 30%;">Email</th>
              <th>active</th>
              <th>privilége</th>
              <th style="max-width: 15%;">date de création</th>
              <th style="max-width: 15%;">date d'expiration</th>
              <th>sous compte</th>
              <th class="text-center" style="width: 150px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $users as $user )

              <tr>
                <td class="text-center">{{ $user->id }}</td>
                <td class="fw-semibold">
                  <a href="javascript:void(0)">{{ $user->name }}</a>
                </td>
                <td class="d-none d-sm-table-cell">
                  {{ $user->email }}
                </td>
                <td>
                    @if($user->deleted_at==NULL)
                    <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">
                        <div class="flex-shrink-0">
                            <i class="fa fa-fw fa-check"></i>
                          </div>
                    </span>
                    @else
                    <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">
                        <div class="flex-shrink-0">
                            <i class="fa fa-fw fa-times"></i>
                          </div>
                    </span>
                    @endif
                </td>
                <td>
                    {{$user->role}}
                </td>
                <td>
                  <em class="text-muted">{{ ($user->created_at) ? $user->created_at->format('j-m-Y') : " " }}  </em>
                </td>
                <td>
                    <em class="text-muted">{{ ($user->created_at) ? date('j-m-Y', strtotime($user->disable_at)) : " "}} </em>
                </td>
                <td>
                </td>
                <td class="text-center">
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
                </td>
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
