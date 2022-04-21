@extends('adminlte::page')

@section('title', 'SafiVisits - Programmer une nouvelle visite')

@section('content_header')
    <a href="{{route('visit.index')}}" class="btn btn-primary mb-4">
        <i class="fa fa-arrow-left"></i>
        Revenir en arrière
    </a>
    <h1 class="m-0 text-dark">@lang('lang.Schedule a visit')</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-6">
            <form method="POST" action="createConfirmationVisit">
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="practitionerName">@lang('lang.Practitioner Name')</label>
{{--                            <input type="hidden" name="practitionerName" value="{{ $visit->practitioners->id }}" />--}}
                            <select name="practitioner_id" class="form-control select2 select2-hidden-accessible">
                                <option selected="selected" value="{{null}}">-- Sélectionnez un praticien --</option>
                                @foreach($practitioners as $practitioner)
                                <option value="{{ $practitioner->id }}">{{ $practitioner->firstname.' '.$practitioner->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="attendedDate">@lang('lang.Attended Date')</label>
                        <div class='input-group' id='attendedDate'  data-td-target-input='nearest' data-td-target-toggle='nearest'>
                            <input name="attendedDate" id='attendedDate' type='text' class='form-control' data-td-target='#attendedDate'/>
                            <span class='input-group-text' data-td-target='#attendedDate' data-td-toggle='datetimepicker'>
                                <span class='fas fa-calendar'></span>
                            </span>
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
