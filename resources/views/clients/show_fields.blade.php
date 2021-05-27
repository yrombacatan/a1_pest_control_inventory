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
            <p>{{ $client->customer }}</p>
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('abnnum', 'ABN Number:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <p>{{ $client->abnnum }}</p>
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('faxnum', 'Fax Number:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <p>{{ $client->faxnum }}</p>
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('address', 'Address:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <p>{{ $client->address }}</p>
        </div>
    </div>

    {{-- <div class="form-group row">
        {!! Form::label('profile_image', 'Profile Image:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('profile_image', null, ['class' => 'form-control']) !!}
        </div>
    </div> --}}

    </div>
    <div class="tab-pane fade" id="custom-content-below-billing" role="tabpanel" aria-labelledby="custom-content-below-billing-tab">
    <br>

    <div class="form-group row">
            <label class="col-sm-2 col-form-label">Billing Address</label>
            {!! Form::label('bill_attntion', 'Attention:', ['class' => 'col-sm-1 col-form-label']) !!}
            <div class="col-sm-9">
                <p>{{ $client->bill_attntion }}</p>
            </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        {!! Form::label('bill_address', 'Address:', ['class' => 'col-sm-1 col-form-label']) !!}
        <div class="col-sm-9">
            <p>{{ $client->bill_address }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        {!! Form::label('bill_city', 'City:', ['class' => 'col-sm-1 col-form-label']) !!}
        <div class="col-sm-9">
            <p>{{ $client->bill_city }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        {!! Form::label('bill_state', 'State:', ['class' => 'col-sm-1 col-form-label']) !!}
        <div class="col-sm-4">
            <p>{{ $client->bill_state }}</p>
        </div>
        {!! Form::label('bill_pcode', 'Postal Code:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-3">
            <p>{{ $client->bill_pcode }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        {!! Form::label('bill_cntry', 'Country:', ['class' => 'col-sm-1 col-form-label']) !!}
        <div class="col-sm-9">
            <p>{{ $client->bill_cntry }}</p>
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('bill_taxrate', 'Tax Rate:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <p>{{ $client->bill_taxrate }}</p>
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('bill_payment', 'Payment Terms:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <p>{{ $client->bill_payment }}</p>
        </div>
    </div>

    </div>
  </div>
