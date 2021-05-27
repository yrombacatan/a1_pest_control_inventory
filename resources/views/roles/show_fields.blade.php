<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    <p>{{ $role->guard_name }}</p>
</div>


<div class="form-group">
    <p>Permissions: </p>
    <ul>
        @if(!empty($rolePermissions))
            @foreach($rolePermissions as $v)
            <li class="fal fa-user-check"><code>{{ $v->name }}</code></li>
            @endforeach
        @endif
    </ul>
</div>
