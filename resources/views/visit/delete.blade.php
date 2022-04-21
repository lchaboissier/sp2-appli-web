@extends('adminlte::page')

@section('title', 'SafiVisits - Annulation de la visite')

@section('content_header')
    <h1 class="m-0 text-dark">@lang('lang.Delete Visit')</h1>
    @error('visit')
    <div><strong>{{ $message }}</strong></div>
    @enderror
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="destroy">
            @csrf
            @method('PUT')
            <!-- Profile Image -->
                <div class="card card-danger card-outline">
                    <div class="card-body">
                        @lang('lang.Do you want to delete this visit?')
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{url()->previous()}}" class="btn btn-default float-left">@lang('lang.Cancel')</a>
                        <input type="submit" class="btn btn-danger float-right" value="@lang('lang.Delete')">
                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
    </div>
@stop

