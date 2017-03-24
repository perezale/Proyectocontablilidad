@extends('layouts.admin') @section('htmlheader_title') {{ trans('entrust-gui::message.serviceunavailable') }} @endsection @section('main-content')

<div class="error-page">
    <h2 class="headline text-red">503</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-red"></i> Oops! {{ trans('entrust-gui::message.somethingwrong') }}</h3>
        <p>
            {{ trans('entrust-gui::message.mainwhile') }} <a href='{{ url(' /home ') }}'>{{ trans('entrust-gui::message.returndashboard') }}</a> {{ trans('entrust-gui::message.usingsearch') }}
        </p>
        <form class='search-form'>
            <div class='input-group'>
                <input type="text" name="search" class='form-control' placeholder="{{ trans('entrust-gui::message.search') }}" />
                <div class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <!-- /.input-group -->
        </form>
    </div>
</div>
<!-- /.error-page -->
@endsection
