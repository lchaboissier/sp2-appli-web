@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <a href="{{url()->previous()}}" class="btn btn-primary mb-4">
        <i class="fa fa-arrow-left"></i>
        Revenir en arrière
    </a>
    <h1 class="m-0 text-dark">@lang('lang.Edit practitioner') : {{$practitioner->firstname.' '.$practitioner->lastname}}</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-6">
            <form method="POST" action="editConfirmationPractitioner">
                @csrf
                @method('PUT')
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="lastname">@lang('lang.PractitionerLastName')</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$practitioner->lastname ?? ''}}" placeholder="Nom du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="firstname">@lang('lang.PractitionerFirstName')</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{$practitioner->firstname ?? ''}}" placeholder="Prénom du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="complementarySpeciality">@lang('lang.PractitionerProfession')</label>
                            <input type="text" class="form-control" id="complementarySpeciality" name="complementarySpeciality" value="{{$practitioner->complementarySpeciality ?? ''}}" placeholder="Profession médicale du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="address">@lang('lang.PractitionerAddress')</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$practitioner->address ?? ''}}" placeholder="Adresse du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="email">@lang('lang.email')</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$practitioner->email ?? ''}}" placeholder="Adresse email du praticien"/>
                        </div>
                        <div class="form-group row">
                            <label for="website">@lang('lang.website')</label>
                            <input type="url" class="form-control" id="website" name="website" value="{{$practitioner->website ?? ''}}" placeholder="Site Internet du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="meeting_online">@lang('lang.meeting_online')</label>
                            <input type="text" class="form-control" id="meeting_online" name="meeting_online" value="{{$practitioner->meeting_online ?? ''}}" placeholder="Prise de RDV en ligne du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="tel">@lang('lang.Phone')</label>
                            <input type="tel" class="form-control" id="tel" name="tel" value="{{$practitioner->tel ?? ''}}" placeholder="Numéro de téléphone du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="status">@lang('lang.status')</label>
                            <select id="status" name="status" class="form-control select2 select2-hidden-accessible">
                                <option value="{{null}}">-- Statut du praticien --</option>
                                <option selected="selected" value="{{$practitioner->status}}">{{$practitioner->status}}</option>
                                <option value="En exercice">En exercice</option>
                                <option value="Radié">Radié</option>
                                <option value="En retraite">En retraite</option>
                                <option value="Décédé">Décédé</option>
                            </select>
                        </div>
                        @error('formulaire')
                        <div><strong>{{$message}}</strong></div>
                        @enderror
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary float-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {

            $('#example').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });
        });

    </script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <!-- Popperjs -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <!-- Tempus Dominus JavaScript -->
    <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet" crossorigin="anonymous">
    <script>
        $(document).ready(function () {
            new tempusDominus.TempusDominus(document.getElementById('attendedDate'), {
                display: {
                    components: {
                        useTwentyfourHour: true
                    }
                },
            });
        });

    </script>

@stop
