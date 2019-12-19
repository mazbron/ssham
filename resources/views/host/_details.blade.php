
<div class="row">
    <div class="col-xs-12">

        <h2>{{ $host->getFullHostname() }}</h2>

        <!-- groups -->
        <strong>{{ __('host/model.groups') }}</strong>
        <pre>
            @foreach($host->hostgroups as $group)
                {{ $group->name }}
            @endforeach
        </pre>
        <!-- ./ groups -->

        <!-- enabled -->
        <strong>{{ __('host/model.enabled') }}</strong>
        <pre>{{ ($host->enabled) ? __('general.yes') : __('general.no') }}</pre>
        <!-- ./ enabled -->

    </div>
</div>

<div class="row">
    <div class="col-xs-12">

        <div class="form-group">
            <div class="controls">
                <a href="{!! route('hosts.index') !!}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('general.back') }}</a>
                @if ($action == 'show')
                <a href="{!! route('hosts.edit', $host->id) !!}" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ __('general.edit') }}</a>
                @else
                {!! Form::button('<i class="fa fa-trash-o"></i> ' . __('general.delete'), array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
                @endif
            </div>
        </div>

    </div>
</div>
