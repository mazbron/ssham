@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
    {{ __('site.settings') }}
@endsection

{{-- Content Header --}}
@section('header')
    <h1>
        {{ __('site.settings') }} <small>configure SSHAM</small>
    </h1>
@endsection

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <li>
        <i class="clip-settings"></i>
        <a href="{!! route('settings.index') !!}">
            {{ __('site.settings') }}
        </a>
    </li>
    <li class="active">
        @lang('user/title.user_management')
    </li>
@endsection

{{-- Content --}}
@section('content')

    <!-- Notifications -->
    @include('partials.notifications')
    <!-- ./ notifications -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => ['settings.update'], 'method' => 'put']) !!}
            @include('settings._form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
