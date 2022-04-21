@extends('adminlte::page')

@section('title', 'SafiVisits - Ajouter un praticien')

@section('content_header')
    <a href="{{url()->previous()}}" class="btn btn-primary mb-4">
        <i class="fa fa-arrow-left"></i>
        Revenir en arrière
    </a>
    <h1 class="m-0 text-dark">@lang('lang.add practitioner')</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-6">
            <form method="POST" action="createConfirmationPractitioner">
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="lastname">@lang('lang.PractitionerLastName')</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="firstname">@lang('lang.PractitionerFirstName')</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="complementarySpeciality">@lang('lang.PractitionerProfession')</label>
                            <input type="text" class="form-control" id="complementarySpeciality" name="complementarySpeciality" placeholder="Profession médicale du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="address">@lang('lang.PractitionerAddress')</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Adresse du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="email">@lang('lang.email')</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Adresse email du praticien"/>
                        </div>
                        <div class="form-group row">
                            <label for="website">@lang('lang.website')</label>
                            <input type="url" class="form-control" id="website" name="website" placeholder="Site Internet du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="meeting_online">@lang('lang.meeting_online')</label>
                            <input type="text" class="form-control" id="meeting_online" name="meeting_online" placeholder="Prise de RDV en ligne du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="tel">@lang('lang.Phone')</label>
                            <input type="tel" class="form-control" id="tel" name="tel" placeholder="Numéro de téléphone du praticien" />
                        </div>
                        <div class="form-group row">
                            <label for="status">@lang('lang.status')</label>
                            <select id="status" name="status" class="form-control select2 select2-hidden-accessible">
                                <option selected="selected" value="{{null}}">-- Statut du praticien --</option>
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

@stop
