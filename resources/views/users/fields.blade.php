<div class="row">
  <div class="col-sm-6">
    <!-- Name Field -->
    <div class="form-group col-lg-12">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="col-sm-3">
    <!-- Designation Field -->
    <div class="form-group col-lg-12">
        {!! Form::label('designation', 'Designation') !!}
        {!! Form::text('designation', null, ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="col-sm-3">
      <!-- Department Field -->
      <div class="form-group col-lg-12">
          {!! Form::label('dept', 'Department') !!}
          {!! Form::select('dept', $departmentOptions, null, ['class' => 'form-control']) !!}
      </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-3">
    <!-- Email Field -->
    <div class="form-group col-lg-12">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="col-sm-3">
    <!-- Mobile Number Field -->
    <div class="form-group col-lg-12">
        {!! Form::label('mobilenum', 'Mobile Number') !!}
        {!! Form::text('mobilenum', null, ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="col-sm-6">
    <!-- User Role Field -->
    <div class="form-group col-lg-12">
        {!! Form::label('role', 'User Role') !!}
        {!! Form::select('role', $roleOptions, null, ['class' => 'form-control']) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <!-- Password Field -->
    <div class="form-group col-lg-12">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="col-sm-6">
    <!-- Confirmation Password Field -->
    <div class="form-group col-lg-12">
        {!! Form::label('password', 'Password Confirmation') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
  </div>
</div>
