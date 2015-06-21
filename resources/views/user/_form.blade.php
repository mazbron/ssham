{{-- Create / Edit User Form --}}

<div class="row">
    <div class="col-xs-6">

        <!-- username -->
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name', Lang::get('user/model.name'), array('class' => 'control-label')) !!}
            <div class="controls">
                {{-- TODO: If $user->username == 'admin' this input text must be disabled --}}
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('name', ':message') }}</span>
            </div>
        </div>
        <!-- ./ username -->
       
        <!-- public key -->
        <div class="form-group {{ $errors->has('publickey') ? 'has-error' : '' }}">
            {!! Form::label('publickey', Lang::get('user/model.publickey'), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::textarea('publickey', null, array('class' => 'form-control')) !!}
                <span class="help-block"><i class="fa fa-info-circle"></i> If you leave blank a new SSH key will be created.</span>
                <span class="help-block">{{ $errors->first('publickey', ':message') }}</span>
            </div>
        </div>
        <!-- ./ public key -->

    </div>
    <div class="col-xs-6">

        <!-- Activation Status -->
        <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
            {!! Form::label('active', Lang::get('user/model.active'), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::select('active', array('1' => Lang::get('general.yes'), '0' => Lang::get('general.no')), null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('active', ':message') }}</span>
            </div>
        </div>
        <!-- ./ activation status -->
    </div>
</div>

<div class="row">
    <div class="col-xs-12">

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                {!! Form::button(Lang::get('button.save'), array('type' => 'submit', 'class' => 'btn btn-success')) !!}
            </div>
        </div>
        <!-- ./ form actions -->

    </div>
</div>

