@extends('layouts.login')

{{-- Content --}}
@section('content')
<!-- start: LOGIN BOX -->
<div class="box-login">
    <h3>@lang('auth.sign_title')</h3>
    <p>
        @lang('auth.sign_instructions')
    </p>

    {!! Form::open(['route' => 'login', 'class' => 'form-login']) !!}

    <!-- Notifications -->
    @include('partials.notifications')
    <!-- ./ notifications -->

    <fieldset>
        <div class="form-group">
            <span class="input-icon">
                {!! Form::text('username', null, array(
                            'class' => 'form-control',
                            'placeholder' => trans('auth.username'),
                            'autofocus' => 'autofocus'
                            )) !!}
                <i class="fa fa-user"></i> </span>
        </div>
        <div class="form-group form-actions">
            <span class="input-icon">
                {!! Form::password('password', array(
                            'class' => 'form-control password',
                            'placeholder' => trans('auth.password')
                            )) !!}
                <i class="fa fa-lock"></i> </span>
        </div>
        <div class="form-actions">
            <label for="remember" class="checkbox-inline">
                {!! Form::checkbox('remember', '1', false, array('class' => 'grey remember')) !!}
                @lang('auth.remember_me')
            </label>
            <button type="submit" class="btn btn-bricky pull-right">
                @lang('general.submit') <i class="fa fa-arrow-circle-right"></i>
            </button>
        </div>
    </fieldset>
    {!! Form::close() !!}
</div>
<!-- end: LOGIN BOX -->
@endsection
