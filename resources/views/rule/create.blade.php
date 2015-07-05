@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
	{!! Lang::get('rule/title.create_a_new_rule') !!}
@stop

{{-- Content Header --}}
@section('header')
<h1>
    {!! Lang::get('rule/title.create_a_new_rule') !!} <small>{!! Lang::get('rule/title.create_a_new_rule_subtitle') !!}</small>
</h1>
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs')
<li>
    <i class="clip-database"></i>
    <a href="{!! route('rules.index') !!}">
        {!! Lang::get('site.rules') !!}
    </a>
</li>
<li class="active">
    {!! Lang::get('rule/title.create_a_new_rule') !!}
</li>
@stop


{{-- Content --}}
@section('content')
<!-- Notifications -->
@include('partials.notifications')
<!-- ./ notifications -->

{!! Form::open(['route' => 'rules.store', 'method' => 'post']) !!}
@include('rule._form')
{!! Form::close() !!}
@stop
