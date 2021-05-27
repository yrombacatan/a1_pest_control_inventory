
    @foreach($products as $product)

        <div class="m-2 shadow-lg card card-info" id="qrcodes">
            <div class="card-header bg-info">
                {{ $product->name }}
            </div>
            <div class="card-body">
                {!! QrCode::size(200)->generate($product->sku_barcode_id); !!}
            </div>
            <div class="card-footer bg-warning text-right">
                <strong>Price: {{ $product->price }}</strong>
            </div>
        </div>

    @endforeach
