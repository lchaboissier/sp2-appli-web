@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <a href="{{route('visit.index')}}" class="btn btn-primary mb-4">
        <i class="fa fa-arrow-left"></i>
        Revenir en arrière
    </a>
    <h1 class="m-0 text-dark">@lang('lang.edit Avatar')</h1>
    <p>{{ $message ?? '' }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <form method="POST" action="editAvatarProfile">
                @csrf
                @method('PUT')
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="lastname">@lang('lang.PractitionerLastName')</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="" placeholder="Nom du praticien" />
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
