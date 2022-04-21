@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <a href="{{url()->previous()}}" class="btn btn-primary mb-4">
        <i class="fa fa-arrow-left"></i>
        Revenir en arrière
    </a>
    <h1 class="m-0 text-dark">@lang('lang.Visit details') n°{{$visit->id}}</h1>
    <p>{{ $message ?? '' }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">Visite n°{{$visit->id}}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>@lang('lang.Address')</b>
                            <span class="float-right">{{$visit->address}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('lang.Attended Date')</b>
                            <span class="float-right">{{date('d/m/Y H:i:s', strtotime($visit->attendedDate))}}</span>
                        </li>
                    </ul>
                    <!--<a href="visit//delete" class="btn btn-danger col-5 float-left">
                        <b>@lang('lang.Cancel')</b>
                    </a>

                    <a href="" class="btn btn-warning col-5 float-right">
                        <b>@lang('lang.Report')</b>
                    </a>-->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">Compte-rendu de la visite</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>@lang('lang.creationDateReport')</b>
                            <span class="float-right">Test</span>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('lang.Comment')</b>
                            <span class="float-right">Test</span>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('lang.StarScore')</b>
                            <span class="float-right">Test</span>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('lang.VisitReportState')</b>
                            <span class="float-right">Test</span>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('lang.Medicines')</b>
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                <tr>
                                    <th>@lang('lang.code')</th>
                                    <th>@lang('lang.commercialName')</th>
                                    <th>@lang('lang.composition')</th>
                                    <th>@lang('lang.effects')</th>
                                    <th>@lang('lang.contraindication')</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <a href="">

                                            </a>
                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td class="float-right">

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@stop

@section('js')
    <script src="https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json"></script>
    <script>
        $('.datatable').DataTable({
        });
    </script>
@endsection
