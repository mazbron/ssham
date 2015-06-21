@extends('layouts.login')

{{-- Content --}}
@section('content')
<!-- start: LOGIN BOX -->
<div class="box-login">
    <h3>{!! Lang::get('auth.sign_title') !!}</h3>
    <p>
        {!! Lang::get('auth.sign_instructions') !!}
    </p>

    {!! Form::open(array('url' => array('auth/login'), 'class' => 'form-login')) !!}

    <!-- Notifications -->
    @include('partials.notifications')
    <!-- ./ notifications -->

    <fieldset>
        <div class="form-group">
            <span class="input-icon">
                {!! Form::text('name', null, array(
                            'class' => 'form-control',
                            'placeholder' => Lang::get('models/user.name'),
                            'autofocus' => 'autofocus'
                            )) !!}
                <i class="fa fa-user"></i> </span>
        </div>
        <div class="form-group form-actions">
            <span class="input-icon">
                {!! Form::password('password', array(
                            'class' => 'form-control password',
                            'placeholder' => Lang::get('models/user.password')
                            )) !!}
                <i class="fa fa-lock"></i> </span>
        </div>
        <div class="form-actions">
            <label for="remember" class="checkbox-inline">
                {!! Form::checkbox('remember', '1', false, array('class' => 'grey remember')) !!}
                {!! Lang::get('auth.remember_me') !!}
            </label>
            <button type="submit" class="btn btn-bricky pull-right">
                {!! Lang::get('button.submit') !!}
            </button>
        </div>
    </fieldset>
    {!! Form::close() !!}
</div>
<!-- end: LOGIN BOX -->
@stop
