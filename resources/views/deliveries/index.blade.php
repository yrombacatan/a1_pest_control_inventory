@extends('layouts.app')
@section('title', 'Deliveries')
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
                <h3 class="card-title p-3">List of deliveries in the system. </h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <!-- <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Add New</a></li> -->
                  @can('delivery-create')
                  <a class="btn btn-primary float-right" href="{{ route('deliveries.create') }}">Add New</a>
                  @endcan

                </ul>
              </div><!-- /.card-header -->

              <div class="card-body">

                    <div class="clearfix"></div>
                      @include('flash::message')
                    <div class="clearfix"></div>

                    <div class="row">

                    @include('deliveries.table')

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
    $('#deliveries-table').DataTable({
      "pageLength": 50,
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
