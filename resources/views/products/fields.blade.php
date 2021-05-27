<!-- Gen Id Field -->
{{-- <div class="form-group col-sm-6 col-md-12">
    {!! Form::label('gen_id', 'Gen ID:') !!}
    {!! Form::text('gen_id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Sku Barcode Id Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('sku_barcode_id', 'SKU ID / Barcode ID:') !!}
    {!! Form::text('sku_barcode_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Type Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('unit_type', 'Unit Type:') !!}
    {!! Form::text('unit_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $prodCatOptions, null, ['class' => 'form-control']) !!}
</div>

<!-- Supplier Id Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('supplier_id', 'Supplier:') !!}
    {!! Form::select('supplier_id', $supplierOptions, null, ['class' => 'form-control']) !!}
</div>

<!-- Buying Date Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('buying_date', 'Buying Date:') !!}
    {!! Form::text('buying_date', null, ['class' => 'form-control','id'=>'buying_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#buying_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Expire Date Field -->
<div class="form-group col-sm-6 col-md-12">
    {!! Form::label('expire_date', 'Expire Date:') !!}
    {!! Form::text('expire_date', null, ['class' => 'form-control','id'=>'expire_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#expire_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Is Active Field -->
{{-- <div class="form-group col-sm-6 col-md-12">
    {!! Form::label('is_active', 'Is Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_active', 0) !!}
        {!! Form::checkbox('is_active', '1', null) !!}
    </label>
</div> --}}
