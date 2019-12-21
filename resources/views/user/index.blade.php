@extends('layouts.master')

{{-- Web site Title --}}
@section('title',  __('user/title.user_management'))

{{-- Content Header --}}
@section('header')
    <h1>
        {{ __('user/title.user_management') }}
        <small>{{ __('user/title.user_management_subtitle') }}</small>
    </h1>
@endsection

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <li class="breadcrumb-item active">
        {{ __('user/title.user_management') }}
    </li>
@endsection

{{-- Content --}}
@section('content')
    <div class="container-fluid">

        <!-- Notifications -->
        @include('partials.notifications')
        <!-- ./ notifications -->

        <div class="card">
            <div class="card-header">
                <!-- actions -->
                <a class="btn btn-success" href="{{ route('users.create') }}" role="button">
                    <i class="fa fa-plus"></i> {{ __('user/title.create_a_new_user') }}
                </a>
                <a class="btn btn-primary" href="{{ route('usergroups.index') }}" role="button">
                    <i class="fa fa-users"></i> {{ __('usergroup/title.user_group_management') }}
                </a>
                <!-- /.actions -->
            </div>
            <div class="card-body">
                @include('user._table')
            </div>
        </div>
    </div>
@endsection
