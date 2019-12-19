
<div class="row">
    <div class="col-xs-12">

        <h2>{{ $hostgroup->name }}</h2>

        <!-- description -->
        <strong>{{ __('hostgroup/model.description') }}</strong>
        <pre>{{ $hostgroup->description }}</pre>
        <!-- ./ description -->

        <!-- groups -->
        <strong>{{ __('hostgroup/model.hosts') }}</strong>
        <pre>
            @foreach($hostgroup->hosts as $host)
                {{ $host->getFullHostname() }}
            @endforeach
        </pre>
        <!-- ./ groups -->

    </div>
</div>

<div class="row">
    <div class="col-xs-12">

        <div class="form-group">
            <div class="controls">
                <a href="{!! route('hostgroups.index') !!}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('general.back') }}</a>
                @if ($action == 'show')
                <a href="{!! route('hostgroups.edit', $hostgroup->id) !!}" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ __('general.edit') }}</a>
                @else
                {!! Form::button('<i class="fa fa-trash-o"></i> ' . __('general.delete'), array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
                @endif
            </div>
        </div>

    </div>
</div>

