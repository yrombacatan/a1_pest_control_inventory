<div class="form-group row">

<!-- Transac No Field -->
<div class="form-group col-sm-12 {{ isset($order) ? 'col-md-6' : 'col-md-4'}}">
    {!! Form::label('transac_no', 'Transaction No.:') !!}
    {!! Form::text('transac_no', null, ['class' => 'form-control','readonly' => 'true']) !!}
</div>

<!-- Transac Date Field -->
<div class="form-group col-sm-12 {{ isset($order) ? 'col-md-6' : 'col-md-4'}}">
    {!! Form::label('transac_date', 'Transaction Date:') !!}
    {{-- {!! Form::text('transac_date', null, ['class' => 'form-control']) !!} --}}
    <div class="input-group date" id="transac_date" data-target-input="nearest">
        <input type="text" name="transac_date" value="{{ isset($order) ? $order->transac_date : '' }}" class="form-control datetimepicker-inputs" data-target="#transac_date"/>
        <div class="input-group-append" data-target="#transac_date" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>

<!-- Order By Field  -->
<div class="form-group col-sm-12 {{ isset($order) ? 'col-md-6' : 'col-md-4'}}">
    {!! Form::label('order_by', 'Order By:') !!}
    {!! Form::select('order_by', $userOptions, null, ['class' => 'form-control']) !!}
</div>

@isset($order)
    <div class="form-group col-sm-12 col-md-6">
        {!! Form::label('status', 'Status:') !!}
        {!! Form::select('order_stat', ['0' => 'Pending', '1' => 'Picked Up', '2' => 'Invoiced', '3' => 'Cancelled'], number_format($order->order_stat), ['class' => 'form-control', 'id' => 'orderStatus']) !!}
    </div>
@endisset

@if ( auth::user()->role == 5)
    <span id="userIsTechnician"> </span>
@endif

@push('scripts')
{{-- format: 'YYYY-MM-DD HH:mm:ss', --}}
    <script type="text/javascript">
        $('#transac_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })

        if ($('#userIsTechnician').length > 0) {
            $('#orderStatus option:eq(0)').attr('disabled', true) // disable pending option 
            $('#orderStatus option:eq(2)').attr('disabled', true) // disable invoice option
        }
    </script>
@endpush
    
</div>

<div class="tab-custom-content">
    <p class="lead mb-0">Items</p>
</div>


<div id="app">
    <qrcode-button></qrcode-button>
</div>


<div class="table-responsive">
    <table class="table table-bordered dataTable dtr-inline" id="outgoingOrders-table">
        <thead>
            <tr>
                <th style="width: 1%"></th>
                <th style="width: 20%">SKU ID/Barcode ID</th>
                <th>Item</th>
                <th class="text-right" style="width: 15%">Unit</th>
                <th class="text-right" style="width: 10%">Price</th>
                <th class="text-right" style="width: 10%">Quantity</th>
                <th class="text-right" style="width: 15%">Total Cost</th>
            </tr>
            <tbody>
                @if(Route::current()->getName() == 'orders.edit')
                    @foreach($products as $product)
                        <tr>
                            <td class='text-center'><a href='' class='delete-row btn btn-danger btn-block btn-xs' title='Remove'><i class='fas fa-times'></i></a>
                                <input type='hidden' readonly id="item_id" name='item_id[]' value='{{ $product->prod_id }}'>
                            </td>
                            <td><input type='text' class='form-control input-borderless' readonly name='item_code[]' value='{{ $product->prod_barcode }}'></td>
                            <td><input type='text' class='form-control input-borderless' readonly name='item_name[]' value='{{ $product->prod_name }}'></td>
                            <td class="text-right" style="width: 15%"><input type='text' class='colUnit text-right form-control input-borderless' readonly name='item_unit[]' value='{{ $product->prod_unit }}'></td>
                            <td class="text-right" style="width: 15%"><input type='text' class='colPrc text-right form-control input-borderless' readonly name='item_prc[]' value='{{ $product->prod_prc }}'></td>
                            <td class="text-right" style="width: 10%"><input type='number' class='colQty text-right form-control input-borderless' readonly name='item_qty[]' value='{{ $product->orderdtl_prodqty }}'></td>
                            <td class="text-right" style="width: 15%"><input type='number' class='colTtl text-right form-control input-borderless' readonly name='item_ttl_prc[]' value='{{ $product->orderdtl_prdttl }}'></td>
                        </tr>
                    @endforeach
                @endif
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
    {!! Form::label('total_order_cost', 'Total Items Cost:', ['id'=>'', 'class' => 'text-right col-sm-2 col-form-label']) !!}
    <div class="col-sm-2">
        {!! Form::number('total_order_cost', null, ['class' => 'text-right float-right form-control grdtot', 'readonly']) !!}
    </div>
</div>

<div class="tab-custom-content"></div>

<div class="form-group row">
    <!-- Remarks Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('remarks', 'Remarks:') !!}
        {!! Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '2']) !!}
    </div>
</div>


