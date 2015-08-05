
<div class="row">
    <div class="col-xs-12">

        <h2>{{ $usergroup->name }}</h2>

        <!-- description -->
        <strong>{!! Lang::get('usergroup/model.description') !!}</strong>
        <pre>{{ $usergroup->description }}</pre>
        <!-- ./ description -->

        <!-- groups -->
        <strong>{!! Lang::get('usergroup/model.users') !!}</strong>
        <pre>
            @foreach($usergroup->users as $user)
                {{ $user->username }}
            @endforeach
        </pre>
        <!-- ./ groups -->
        
    </div>
</div>

<div class="row">
    <div class="col-xs-12">

        <div class="form-group">
            <div class="controls">
                <a href="{!! route('usergroups.index') !!}" class="btn btn-primary">{!! Lang::get('button.back') !!}</a>
                @if ($action == 'show')
                <a href="{!! route('usergroups.edit', $usergroup->id) !!}" class="btn btn-primary">{!! Lang::get('button.edit') !!}</a>
                @else
                {!! Form::button(Lang::get('button.delete'), array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
                @endif
            </div>
        </div>

    </div>
</div>
