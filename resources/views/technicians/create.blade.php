@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.content-header')
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card card-primary card-outline">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Add new technician to the system. </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

                @include('adminlte-templates::common.errors')
                    <div class="clearfix"></div>

                    {!! Form::open(['route' => 'technicians.store', 'class' => '']) !!}

                        @include('technicians.fields')

              </div><!-- /.card-body -->
              <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('technicians.index') !!}" class="btn btn-default">Cancel</a>
              </div>
              {!! Form::close() !!}
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->
    </div>
    </div>

</div>
@endsection

