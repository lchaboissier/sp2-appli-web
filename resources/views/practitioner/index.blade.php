@extends('adminlte::page')

@section('title', 'SafiVisits - Portefeuille de praticiens')

@section('content_header')
    <h1 class="m-0 text-dark">@lang('lang.Practitioner portfolio')
        <a href="{{route('practitioner.create')}}" class="btn btn-primary float-right">
            <i class="fa fa-plus"></i>
            @lang('lang.add practitioner')
        </a>
    </h1>
    <p></p>
    {{ $message ?? '' }}
@stop

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>@lang('lang.identity')</th>
                                <th>@lang('lang.profession')</th>
                                <th>@lang('lang.Address')</th>
                                <th>@lang('lang.email')</th>
                                <th>@lang('lang.website')</th>
                                <th>@lang('lang.meeting_online')</th>
                                <th>@lang('lang.Phone')</th>
                                <th>@lang('lang.status')</th>
                                <th>@lang('lang.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($practitioners as $practitioner)
                                <tr>
                                    <td>
                                        {{$practitioner->firstname.' '.$practitioner->lastname}}
                                    </td>
                                    <td>
                                        {{$practitioner->complementarySpeciality}}
                                    </td>
                                    <td>
                                        {{$practitioner->address}}
                                        <a href="https://www.openstreetmap.org/search?query={{$practitioner->address}}" target="_blank">
                                            <i class="fa fa-search-location"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="mailto:{{($practitioner->email)}}">
                                            {{($practitioner->email)}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{($practitioner->website)}}">
                                            {{$practitioner->website}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$practitioner->meeting_online}}
                                    </td>
                                    <td>
                                        {{$practitioner->tel}}
                                    </td>
                                    <td>
                                        {{$practitioner->status}}
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="practitioner/{{$practitioner->id}}" title="Consulter le profil du praticien."><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-primary btn-xs" href="practitioner/{{$practitioner->id}}/edit" title="Modifier le profil du praticien."><i class="fa fa-pen"></i></a>
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
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json',
            },
        });
    </script>
@endsection
