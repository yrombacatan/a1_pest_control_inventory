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
                <h3 class="card-title p-3">Department details to the system. </h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <a class="btn btn-default float-right" href="{{ route('departments.index') }}">Back</a>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">

              @include('departments.show_fields')

              </div><!-- /.card-body -->

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
