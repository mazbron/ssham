@extends('layouts.master')

{{-- Styles --}}
@section('styles')
    {!! HTML::style('//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css') !!}
@stop

{{-- Web site Title --}}
@section('title')
    {!! Lang::get('usergroup/title.usergroup_management') !!} :: @parent
@stop

{{-- Content Header --}}
@section('header')
    <h1> 
        {!! Lang::get('usergroup/title.usergroup_management') !!} <small>create and edit usergroups</small>
    </h1>
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs')
<li>
    <i class="clip-bubbles-3"></i>
    <a href="{!! route('usergroups.index') !!}">
        {!! Lang::get('site.usergroups') !!}
    </a>
</li>
<li class="active">
    {!! Lang::get('usergroup/title.usergroup_management') !!}
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
        <a class="btn btn-green add-row" href="{!! route('usergroups.create') !!}">
            <i class="fa fa-plus"></i> {!! Lang::get('usergroup/title.create_a_new_usergroup') !!}
        </a>
    </div>
</div>
<!-- /.actions -->

<div class="row">
    <div class="col-xs-12">
        <table id="usergroups" class="table table-striped table-bordered table-hover table-full-width">
        <thead>
            <tr>
                <th class="col-md-4">{!! Lang::get('usergroup/table.name') !!}</th>
                <th class="col-md-6">{!! Lang::get('usergroup/table.description') !!}</th>
                <th class="col-md-2">{!! Lang::get('usergroup/table.actions') !!}</th>
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
    oTable = $('#usergroups').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/{!! Lang::get('site.datatables_lang') !!}.json"
        },
        "processing": true,
        "serverSide": true,
        "ajax": "{!! route('usergroups.data') !!}",
        "columns": [
            {data: "name"},
            {data: "description"},
            {data: "actions", "orderable": false, "searchable": false}
        ]
    });
});
</script>
@stop