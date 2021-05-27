@extends('layouts.app')
@section('title', 'Users')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.content-header')
    <!-- /.content-header -->

    <!-- Content (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card card-primary card-outline">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">List of registered users in the system. </h3>
                <ul class="nav nav-pills ml-auto p-2">
                    @can('user-create')
                        <a class="btn btn-primary float-right" href="{{ route('users.create') }}">Add New</a>
                    @endcan
                </ul>
              </div><!-- /.card-header -->

              <div class="card-body">

                    <div class="clearfix"></div>
                      @include('flash::message')
                    <div class="clearfix"></div>

                    <div class="row">

                    @include('users.table')

                    </div>

              </div><!-- /.card-body -->

            </div>
            <!-- ./card -->

          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

    </section>
    <!-- /.content -->

</div>
@endsection

@push('scripts')
<script>
  $(function () {
    $('#users-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
