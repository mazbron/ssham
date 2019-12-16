@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
	@lang('host/title.create_a_new_host')
@endsection

{{-- Content Header --}}
@section('header')
<h1>
    @lang('host/title.create_a_new_host') <small>@lang('host/title.create_a_new_host_subtitle')</small>
</h1>
@endsection

{{-- Breadcrumbs --}}
@section('breadcrumbs')
<li>
    <i class="clip-bubbles-3"></i>
    <a href="{!! route('hosts.index') !!}">
        @lang('site.hosts')
    </a>
</li>
<li class="active">
    @lang('host/title.create_a_new_host')
</li>
@endsection


{{-- Content --}}
@section('content')

<!-- Notifications -->
@include('partials.notifications')
<!-- ./ notifications -->

{!! Form::open(['route' => 'hosts.store', 'method' => 'post']) !!}
@include('host._form')
{!! Form::close() !!}

@endsection
