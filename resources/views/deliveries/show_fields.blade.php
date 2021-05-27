<!-- Ref No Field -->
<div class="form-group">
    {!! Form::label('ref_no', 'Ref No:') !!}
    <p>{{ $delivery->ref_no }}</p>
</div>

<!-- Transac Date Field -->
<div class="form-group">
    {!! Form::label('transac_date', 'Transac Date:') !!}
    <p>{{ $delivery->transac_date }}</p>
</div>

<!-- Supplier Id Field -->
<div class="form-group">
    {!! Form::label('supplier_id', 'Supplier Id:') !!}
    <p>{{ $delivery->supplier_id }}</p>
</div>

<div class="form-group">
    <table id="orderedProdList" class="table dataTable table-bordered table-hover">
        <thead>
        <tr>
            <th>SKU ID/Barcode ID</th>
            <th>Item</th>
            <th class="text-left">Unit</th>
            <th class="text-right">Price</th>
            <th class="text-right">Quantity</th>
            <th class="text-right">Total Cost</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->prod_barcode }}</td>
                    <td>{{ $product->prod_name }}</td>
                    <td>{{ $product->prod_unit }}</td>
                    <td class="text-right">{{ number_format($product->dlvrydtl_prodprc,2) }}</td>
                    <td class="text-right">{{ $product->dlvrydtl_prodqty }}</td>
                    <td class="text-right">{{ number_format($product->dlvrydtl_prdttl,2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>


<!-- Total Prod Costs Field -->
<div class="form-group">
    {!! Form::label('total_prod_costs', 'Total Prod Costs:') !!}
    <p>{{ $delivery->total_prod_costs }}</p>
</div>

<!-- Remarks Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{{ $delivery->remarks }}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>{{ $delivery->is_active }}</p>
</div>

