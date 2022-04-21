@extends('adminlte::page')

@section('title', 'SafiVisits - Plannification des visites')

@section('content_header')
    <h1 class="m-0 text-dark">@lang('lang.Visit planning')
        <a href="{{route('visit.create')}}" class="btn btn-primary float-right">
            <i class="fa fa-plus"></i>
            @lang('lang.Schedule a visit')
        </a>
    </h1>
    <p></p>
    {{ $message ?? '' }}
    <p class="mt-4 border-bottom"></p>
@stop

@section('content')
    <h3>Visites effectuées pour aujourd'hui</h3>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>@lang('lang.Attended Date')</th>
                            <th>@lang('lang.Practitioner Name')</th>
                            <th>@lang('lang.Address')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($finishedVisits as $finishedVisit)
                            <tr>
                                <td>
                                    {{date('d/m/Y H:i:s', strtotime($finishedVisit->attendedDate))}}
                                </td>
                                <td>
                                    {{$finishedVisit->practitioners->firstname.' '.$finishedVisit->practitioners->lastname}}
                                </td>
                                <td>
                                    {{$finishedVisit->practitioners->address}}
                                </td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="visit/{{$finishedVisit->id}}" title="Consulter les détails de la visite."><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-info btn-xs" href="" title="Accéder à la rédaction du compte-rendu de la visite."><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h3>Visites à effectuer pour le lendemain</h3>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>@lang('lang.Attended Date')</th>
                            <th>@lang('lang.Practitioner Name')</th>
                            <th>@lang('lang.Address')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plannedVisits as $plannedVisit)
                            <tr>
                                <td>
                                    {{date('d/m/Y H:i:s', strtotime($plannedVisit->attendedDate))}}
                                </td>
                                <td>
                                    {{$plannedVisit->practitioners->firstname.' '.$plannedVisit->practitioners->lastname}}
                                </td>
                                <td>
                                    {{$plannedVisit->practitioners->address}}
                                </td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="visit/{{$plannedVisit->id}}" title="Consulter les détails de la visite."><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary btn-xs" href="" title="Reporter la visite."><i class="fa fa-calendar"></i></a>
                                    <a class="btn btn-danger btn-xs" href="visit/{{$plannedVisit->id}}/delete" title="Annuler la visite."><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script>
        $('.datatable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
            },
        });
    </script>
@endsection
