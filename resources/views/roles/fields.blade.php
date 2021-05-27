<!-- Name Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    {!! Form::text('guard_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-md-12">
    {{ Form::label(null, 'Permissions', ['class' => 'col-form-label col-12 col-lg-1 form-label text-lg-left']) }}
    <div class="form-group row">
        <div class="col-sm-6 col-md-12">

            @foreach($permission as $value)
                <label>
                    @if (!empty($rolePermissions))
                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }} {{ $value->name }}
                    @else
                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} {{ $value->name }}
                    @endif
                </label>
                <br/>
            @endforeach

        </div>
    </div>
</div>

<!-- Submit Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
</div> --}}
