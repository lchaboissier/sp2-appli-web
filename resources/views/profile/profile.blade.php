@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <a href="{{route('visit.index')}}" class="btn btn-primary mb-4">
        <i class="fa fa-arrow-left"></i>
        Revenir en arrière
    </a>
    <h1 class="m-0 text-dark">@lang('lang.Profile')</h1>
    <p>{{ $message ?? '' }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{$profile->avatar}}" width="512" height="512" alt="User profile picture">
                    </div>
                    <a href="profile/{{$profile->id}}/avatar"><p class="text-center mt-4">Modifier l'image de profil</p></a>
                    <h3 class="profile-username text-center">{{$profile->firstname.' '.$profile->lastname}}</h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>@lang('lang.Address')</b> <a class="float-right">{{$profile->address}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('lang.Phone')</b> <a class="float-right">{{$profile->phone}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('lang.email')</b> <a class="float-right">{{$profile->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('lang.password')</b> <a class="float-right">********</a>
                        </li>
                        <li class="list-group-item">

                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-block"><b>@lang('lang.Edit password')</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
