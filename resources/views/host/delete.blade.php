@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
	{{ trans('host/title.host_delete') }}
@stop

{{-- Content Header --}}
@section('header')
<h1>
    {{ trans('host/title.host_delete') }} <small>{{ $host->getFullHostname() }}</small>
</h1>
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs')
<li>
    <i class="clip-screen"></i>
    <a href="{!! route('hosts.index') !!}">
        {{ trans('site.hosts') }}
    </a>
</li>
<li class="active">
    {{ trans('host/title.host_delete') }}
</li>
@stop

{{-- Content --}}
@section('content')

<!-- Notifications -->
@include('partials.notifications')
<!-- ./ notifications -->
        
{{-- Delete User Form --}}
{!! Form::open(array('route' => array('hosts.destroy', $host->id), 'method' => 'delete', )) !!}
@include('host._details', ['action' => 'delete'])
{!! Form::close() !!}

@stop