@extends('layouts.app')

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
                <h3 class="card-title p-3">List of registered clients in the system. </h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <!-- <a class="btn btn-primary float-right" href="{{ route('clients.create') }}">Add New</a> -->
                  <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-add-new">Add New</button>
                </ul>
              </div><!-- /.card-header -->

              <div class="card-body">

                    <div class="clearfix"></div>
                      @include('flash::message')
                      @include('adminlte-templates::common.errors')
                    <div class="clearfix"></div>

                    <div class="row">

                    @include('clients.table')

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

<div class="modal fade" id="modal-add-new">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Client</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          {!! Form::open(['route' => 'clients.store', 'class' => '']) !!}

 <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Client Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="custom-content-below-billing-tab" data-toggle="pill" href="#custom-content-below-billing" role="tab" aria-controls="custom-content-below-billing" aria-selected="false">Billing Details</a>
    </li>
  </ul>
  <div class="tab-content" id="custom-content-below-tabContent">
    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
    <br>

    <div class="form-group row">
        {!! Form::label('customer', 'Customer:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('customer', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('abnnum', 'ABN Number:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('abnnum', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('faxnum', 'Fax Number:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('faxnum', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('address', 'Address:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('profile_image', 'Profile Image:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('profile_image', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    </div>
    <div class="tab-pane fade" id="custom-content-below-billing" role="tabpanel" aria-labelledby="custom-content-below-billing-tab">
    <br>

    <div class="form-group row">
            <label class="col-sm-2 col-form-label">Billing Address</label>
            {!! Form::label('bill_attntion', 'Attn.:', ['class' => 'col-sm-1 col-form-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('bill_attntion', null, ['class' => 'form-control']) !!}
            </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        {!! Form::label('bill_address', 'Address:', ['class' => 'col-sm-1 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::textarea('bill_address', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        {!! Form::label('bill_city', 'City:', ['class' => 'col-sm-1 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('bill_city', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        {!! Form::label('bill_state', 'State:', ['class' => 'col-sm-1 col-form-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('bill_state', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::label('bill_pcode', 'Postal Code:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('bill_pcode', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        {!! Form::label('bill_cntry', 'Country:', ['class' => 'col-sm-1 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('bill_cntry', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('bill_taxrate', 'Tax Rate:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('bill_taxrate', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('bill_payment', 'Payment Terms:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('bill_payment', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    </div>
  </div>


            <!-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a data-dismiss="modal" href="{!! route('clients.index') !!}" class="btn btn-default">Cancel</a>

          {!! Form::close() !!} -->

      </div>
      <div class="modal-footer justify-content-between">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a data-dismiss="modal" href="{!! route('clients.index') !!}" class="btn btn-default">Cancel</a>

          {!! Form::close() !!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('scripts')
<script>
  $(function () {
    $('#clients-table').DataTable({
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