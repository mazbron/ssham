@extends('layouts.master')

{{-- Styles --}}
@section('styles')
    {!! HTML::style('//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css') !!}
@stop

{{-- Web site Title --}}
@section('title')
    {!! trans('host/title.host_management') !!}
@stop

{{-- Content Header --}}
@section('header')
    <h1> 
        {!! trans('host/title.host_management') !!} <small>{!! trans('host/title.host_management_subtitle') !!}</small>
    </h1>
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs')
<li>
    <i class="clip-screen"></i>
    <a href="{!! route('hosts.index') !!}">
        {!! trans('site.hosts') !!}
    </a>
</li>
<li class="active">
    {!! trans('host/title.host_management') !!}
</li>
@stop

{{-- Content --}}
@section('content')

<!-- Notifications -->
@include('partials.notifications')
<!-- ./ notifications -->

<!-- actions -->
<div class="row">
    <div class="col-md-12 space20">
        <a class="btn btn-green add-row" href="{!! route('hosts.create') !!}">
            <i class="fa fa-plus"></i> {!! trans('host/title.create_a_new_host') !!}
        </a>
        <a class="btn btn-blue add-row" href="{!! route('hostgroups.index') !!}">
            <i class="fa fa-tasks"></i> {!! trans('hostgroup/title.host_group_management') !!}
        </a>
    </div>
</div>
<!-- /.actions -->

<div class="row">
    <div class="col-xs-12">
        <table id="hosts" class="table table-striped table-bordered table-hover table-full-width">
        <thead>
            <tr>
                <th class="col-md-4">{!! trans('host/table.hostname') !!}</th>
                <th class="col-md-3">{!! trans('host/table.username') !!}</th>
                <th class="col-md-1">{!! trans('host/table.type') !!}</th>
                <th class="col-md-1">{!! trans('host/table.groups') !!}</th>
                <th class="col-md-1">{!! trans('host/table.enabled') !!}</th>
                <th class="col-md-2">{!! trans('host/table.actions') !!}</th>
            </tr>
        </thead>
        </table>
    </div>
</div>

@stop

{{-- Scripts --}}
@section('scripts')
{!! HTML::script('//cdn.datatables.net/1.10.7/js/jquery.dataTables.js') !!}
{!! HTML::script('//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js') !!}
<script>
$(document).ready(function() {
    oTable = $('#hosts').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/{!! trans('site.datatables_lang') !!}.json"
        },
        "ajax": "{!! route('hosts.data') !!}",
        "columns": [
            {data: "hostname"},
            {data: "username"},
            {data: "type"},
            {data: "groups", "orderable": false, "searchable": false},
            {data: "enabled"},
            {data: "actions", "orderable": false, "searchable": false}
        ]
    });
});
</script>
@stop