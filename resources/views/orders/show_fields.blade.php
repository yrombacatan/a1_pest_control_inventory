<!-- Transac No Field -->
<div class="form-group">
    {!! Form::label('transac_no', 'Transac No:') !!}
    <p>{{ $order->transac_no }}</p>
</div>

<!-- Transac Date Field -->
<div class="form-group">
    {!! Form::label('transac_date', 'Transac Date:') !!}
    <p>{{ $order->transac_date }}</p>
</div>

<!-- Order By Field -->
<div class="form-group">
    {!! Form::label('order_by', 'Order By:') !!}
    <p>{{ $order->order_by }}</p>
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
                <td class="text-right">{{ number_format($product->prod_prc,2) }}</td>
                <td class="text-right">{{ $product->orderdtl_prodqty }}</td>
                <td class="text-right">{{ number_format($product->orderdtl_prdttl,2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<!-- Total Order Cost Field -->
<div class="form-group">
    {!! Form::label('total_order_cost', 'Total Order Cost:') !!}
    <p>{{ $order->total_order_cost }}</p>
</div>

<!-- Remarks Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{{ $order->remarks }}</p>
</div>

<!-- Order Stat Field -->
<div class="form-group">
    {!! Form::label('order_stat', 'Order Stat:') !!}
    <p>{{ $order->order_stat }}</p>
</div>

