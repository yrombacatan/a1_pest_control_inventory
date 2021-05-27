<div class="form-group row">

<!-- Ref No Field -->
<div class="form-group col-sm-12 col-md-4">
    {!! Form::label('ref_no', 'Reference No.:') !!}
    {!! Form::text('ref_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Transac Date Field -->
<div class="form-group col-sm-12 col-md-4">
    {!! Form::label('transac_date', 'Transaction Date:') !!}
    {{-- {!! Form::text('transac_date', null, ['class' => 'form-control']) !!} --}}
    <div class="input-group date" id="transac_date" data-target-input="nearest">
        <input type="text" name="transac_date" class="form-control datetimepicker-input" data-target="#transac_date"/>
        <div class="input-group-append" data-target="#transac_date" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>

@push('scripts')
{{-- format: 'YYYY-MM-DD HH:mm:ss', --}}
    <script type="text/javascript">
        $('#transac_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Supplier Id Field -->
<div class="form-group col-sm-12 col-md-4">
    {!! Form::label('supplier_id', 'Supplier:') !!}
    {{-- {!! Form::number('supplier_id', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('supplier_id', $supplierOptions, null, ['class' => 'form-control']) !!}
</div>

</div>

<div class="tab-custom-content">
    <p class="lead mb-0">Items</p>
</div>

<div class="form-group row">
    {!! Form::label('', '', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-3">
        Item:
        <select name="product_id" id="product_id" class="form-control selectItems">
            <option value="" selected>Select Item</option>
            @foreach($productOptions as $item)
                <option value="{{ $item->id }}" data-id="{{ $item->id }}" data-sku="{{ $item->sku_barcode_id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-unit_type="{{ $item->unit_type }}">{{ $item->name }}</option>
            @endforeach
        </select>
        {!! Form::hidden('prod_id', null, ['id'=> 'itemid', 'class' => 'hidden form-control']) !!}
        <span id="err_ItemNo" class="error invalid-feedback">Please select an item</span>
    </div>

    <div class="col-sm-2">
        Unit:
        {!! Form::text('unit_type', null, ['id'=> 'itemunit', 'class' => 'form-control']) !!}
        <span id="err_ItemUnit" class="error invalid-feedback">Please enter unit</span>
    </div>

    <div class="col-sm-1">
        Quantity:
        {!! Form::number('quantity', null, ['id'=> 'itemqty', 'min' => 1, 'class' => 'form-control']) !!}
        <span id="err_ItemQty" class="error invalid-feedback">Please enter quantity</span>
    </div>

    <div class="col-sm-2">
        Buying Price:
        {!! Form::number('buying_price', null, ['id'=> 'itemprice', 'min' => 1, 'class' => 'form-control']) !!}
        <span id="err_ItemPrice" class="error invalid-feedback">Please enter price</span>
    </div>

    <div class="col-sm-1">
        {!! Form::label('', ' ', ['class' => 'col-form-label']) !!}
        <input type="button" id="btnAddItem" class="btn btn-block btn-info btn-md add-row" value="Add">
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped" id="incomingDelivery-table">
        <thead>
            <tr>
                <th style="width: 1%"></th>
                <th style="width: 20%">SKU ID/Barcode ID</th>
                <th>Item</th>
                <th class="text-right" style="width: 15%">Unit</th>
                <th class="text-right" style="width: 10%">Quantity</th>
                <th class="text-right" style="width: 10%">Buying Price</th>
                <th class="text-right" style="width: 15%">Total Cost</th>
            </tr>
            <tbody>
            </tbody>
        </thead>
    </table>
    <span id="lbltotal"></span>
</div>

<div class="form-group row">
    <div class="col-sm-6"></div>
    <div class="col-sm-2">
    </div>
    {{-- {!! Form::number('total_prod_quantity', null, ['class' => 'text-right float-right form-control itmstot', 'readonly']) !!} --}}
    {!! Form::label('total_prod_costs', 'Total Items Cost:', ['id'=>'', 'class' => 'text-right col-sm-2 col-form-label']) !!}
    <div class="col-sm-2">
        {!! Form::number('total_prod_costs', null, ['class' => 'text-right float-right form-control grdtot', 'readonly']) !!}
    </div>
</div>

<!-- Total Prod Costs Field -->
{{-- <div class="form-group col-sm-6 col-md-12">
    {!! Form::label('total_prod_costs', 'Total Prod Costs:') !!}
    {!! Form::number('total_prod_costs', null, ['class' => 'form-control']) !!}
</div> --}}

<div class="tab-custom-content"></div>

<div class="form-group row">
<!-- Remarks Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '2']) !!}
</div>
</div>

<!-- Is Active Field -->
{{-- <div class="form-group col-sm-6 col-md-12">
    {!! Form::label('is_active', 'Is Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_active', 0) !!}
        {!! Form::checkbox('is_active', '1', null) !!}
    </label>
</div> --}}
