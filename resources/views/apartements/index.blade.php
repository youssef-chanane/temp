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
            Liste des Appartements
          </h1>
          {{-- <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Plugin Integration
          </h2> --}}
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="javascript:void(0)">APPARTEMENTS</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              list
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
                <a href="{{route('apartements.create')}}" class="btn btn-success">
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
        @foreach($apartements as $apartement)
        <tbody class="js-table-sections-header">
          <tr>
            <td class="text-center">
              <i class="fa fa-angle-right text-muted"></i>
            </td>
            <td class="fw-semibold fs-sm">
              <div class="py-1">

                <a href="">{{$apartement->apartementName}}</a>
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
            <tr>
                <th>id</th>
                <th>chambre</th>
                <th>Date </th>
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
        @foreach ($apartement->rooms as $room)

        <tr>
            <td >{{$room->id}}</td>
            <td style="min-width: 15%">{{$room->number_name}}</td>
            <td>{{($room->temperature)?$room->temperature->Date_temperatures:""}}</td>
            <td style="text-align: center"> {{($room->temperature)?$room->temperature->Temperature_Values:""}}°C</td>
            <td>
                {{($room->temperature)?$room->temperature->Consigne_A:""}}
                @if($room->temperature)
                <button  class="btn btn-sm btn-alt-secondary "  data-bs-toggle="modal" data-bs-target="#modal-block-small{{$room->temperature->id}}">
                    <i class="fa fa-fw fa-pencil-alt"></i>
                </button>
                @endif
            </td>
            <td>
                {{($room->temperature)?$room->temperature->Consigne_B:""}}
                @if($room->temperature)
                <button  class="btn btn-sm btn-alt-secondary "  data-bs-toggle="modal" data-bs-target="#modal-block-small2{{$room->temperature->id}}">
                    <i class="fa fa-fw fa-pencil-alt"></i>
                </button>
                @endif
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
          {{-- for consign 1 --}}
  <!-- Small Block Modal -->
  @if($room->temperature)
  <div class="modal" id="modal-block-small{{$room->temperature->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
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
          <form action="{{route('apartements.updateconsigne',$room->temperature->id)}}" method="POST">
            @csrf
            @method('PUT')
              <div class="block-content fs-sm mb-4">
                <textarea class="form-control " id="" name="Consigne_A" placeholder="Nouveau Consigne">{{old('Consigne_A',isset($room->temperature->Consigne_A) ? $room->temperature->Consigne_A:'') ?? NULL}}</textarea>
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
    <div class="modal" id="modal-block-small2{{$room->temperature->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small2" aria-hidden="true">
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
              <form action="{{route('apartements.updateconsigne',$room->temperature->id)}}" method="POST">
                @csrf
                @method('PUT')
                  <div class="block-content fs-sm mb-4">
                    <textarea class="form-control " id="" name="Consigne_B"  placeholder="Nouveau Consigne">{{old('Consigne_B',isset($room->temperature->Consigne_B) ? $room->temperature->Consigne_B:'') ?? NULL}}</textarea>
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
      @endif
      <!-- END Small Block Modal -->
        @endforeach

        </tbody>
        @endforeach
      </table>
    </div>
  </div>
  <!-- END Table Sections -->


  </div>
  <!-- END Page Content -->
@endsection
