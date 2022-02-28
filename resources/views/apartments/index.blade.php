@extends('layouts.app')

@section('css_before')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
  <script>One.helpersOnLoad(['one-table-tools-checkable', 'one-table-tools-sections']);</script>



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
            DataTables Example
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Plugin Integration
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="javascript:void(0)">Examples</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              DataTables
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
   <!-- Table Sections (.js-table-sections class is initialized in Helpers.oneTableToolsSections()) -->
   <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Appartements</h3>
      <div class="block-options">
        <div class="block-options-item">
                <a href="{{route('apartments.create')}}" class="btn btn-success">
                    Ajouter Appartement
                </a>
        </div>
      </div>
    </div>
    <div class="table-responsive">

      <table class="js-table-sections table table-hover table-vcenter table-bordered">
        {{-- <thead>
          <tr>
            <th style="width: 30px;"></th>
            <th></th>
            <th style="width: 15%;">Access</th>
            <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th>
          </tr>
        </thead> --}}
        @for($i=0;$i<5;$i++)
        <tbody class="js-table-sections-header">
          <tr>
            <td class="text-center">
              <i class="fa fa-angle-right text-muted"></i>
            </td>
            <td class="fw-semibold fs-sm">
              <div class="py-1">
                <a href="">appartement {{$i}}</a>
              </div>
            </td>
            {{-- <td>
              <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
            </td>
            <td class="d-none d-sm-table-cell">
              <em class="fs-sm text-muted">November 3, 2018 08:29</em>
            </td> --}}
          </tr>
        </tbody>

        <tbody class="fs-sm">

        @for ($j=0;$j<5;$j++)

        <tr>
            <td style="min-width: 15%">Chambre {{$j}}</td>
            <td style="text-align: center">{{$i}}{{$j}}°C</td>
            <td>consign a
                <button  class="btn btn-sm btn-alt-secondary "  data-bs-toggle="modal" data-bs-target="#modal-block-small">
                    <i class="fa fa-fw fa-pencil-alt"></i>
                </button>
            </td>
            <td>consign b
                <button  class="btn btn-sm btn-alt-secondary "  data-bs-toggle="modal" data-bs-target="#modal-block-small2">
                    <i class="fa fa-fw fa-pencil-alt"></i>
                </button>
            </td>
            <td>Fin manuel</td>
            <td>percent %</td>
            <td>compter</td>
            <td>{{$i}}{{$j}}kwh</td>
            <td>Regim</td>
            <td>Puiss</td>
            <td>diam</td>
            <td>V.Pos</td>
        </tr>
        @endfor

        </tbody>
        @endfor
      </table>
    </div>
  </div>
  <!-- END Table Sections -->
  {{-- for consign 1 --}}
  <!-- Small Block Modal -->
  <div class="modal" id="modal-block-small" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="block block-rounded block-transparent mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">Modifier consigne 1</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
              </button>
            </div>
          </div>
          <form action="">
              <div class="block-content fs-sm mb-4">
                <textarea class="form-control " id="" name="" placeholder="Nouveau Consigne"></textarea>
              </div>
              <div class="block-content block-content-full text-end bg-body">
                <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Enregistrer</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END Small Block Modal -->
  {{-- for consign 2 --}}
    <!-- Small Block Modal -->
    <div class="modal" id="modal-block-small2" tabindex="-1" role="dialog" aria-labelledby="modal-block-small2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
          <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
              <div class="block-header block-header-default">
                <h3 class="block-title">Modifier consigne 2</h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-times"></i>
                  </button>
                </div>
              </div>
              <form action="">
                  <div class="block-content fs-sm mb-4">
                    <textarea class="form-control " id="" name="" placeholder="Nouveau Consigne"></textarea>
                  </div>
                  <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Enregistrer</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- END Small Block Modal -->

  </div>
  <!-- END Page Content -->
@endsection
