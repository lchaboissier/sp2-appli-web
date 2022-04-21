@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <a href="{{url()->previous()}}" class="btn btn-primary mb-4">
        <i class="fa fa-arrow-left"></i>
        Revenir en arrière
    </a>
    <h1 class="m-0 text-dark">@lang('lang.Practitioner details') : {{$practitioner->firstname.' '.$practitioner->lastname}}</h1>
    <p>{{ $message ?? '' }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <form method="POST" action="editConfirmationPractitioner">
            @csrf
            @method('PUT')
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">{{$practitioner->firstname.' '.$practitioner->lastname}}</h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>@lang('lang.PractitionerProfession')</b>
                                <span class="float-right">{{$practitioner->complementarySpeciality}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>@lang('lang.PractitionerAddress')</b>
                                <span class="float-right">{{$practitioner->address}}</span>
                                <a href="https://www.openstreetmap.org/search?query={{$practitioner->address}}" target="_blank">
                                    <i class="fa fa-search-location"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>@lang('lang.email')</b>
                                <a href="mailto:{{($practitioner->email)}}">
                                    <span class="float-right">{{$practitioner->email}}</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>@lang('lang.website')</b>
                                <a href="{{($practitioner->website)}}">
                                    <span class="float-right">{{$practitioner->website}}</span>
                                </a>

                            </li>
                            <li class="list-group-item">
                                <b>@lang('lang.meeting_online')</b>
                                <span class="float-right">{{$practitioner->meeting_online}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>@lang('lang.Phone')</b>
                                <span class="float-right">{{$practitioner->tel}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>@lang('lang.status')</b>
                                <span class="float-right">{{$practitioner->status}}</span>
                            </li>
                        </ul>
                        <a href="{{$practitioner->id}}/edit" class="btn btn-primary col-12">
                            <b>@lang('lang.Edit')</b>
                        </a>
                    </div>
                    <!-- /.card-body -->
                </div>
            </form>
            <!-- /.card -->
        </div>
        <div class="col-9">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3>Historique des visites effectuées</h3>
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>Date de la visite</th>
                                <th>Extrait du compte-rendu</th>
                                <th>Le médicament ayant le plus grand nombre</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($practitioner->visits as $practitioner)
                            <tr>
                                <td>
                                    {{$practitioner->attendedDate}}
                                </td>
                                <td>
                                    {{$practitioner->visitstate_id}}
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="" title="Consulter le profil du praticien."><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
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
