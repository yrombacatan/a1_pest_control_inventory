<?php
use App\Http\Controllers\ProductController;
?>
<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>SKU ID / Barcode ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Unit</th>
                <th>Category</th>
                <th>Supplier</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->gen_id }}</td>
                <td>{{ $product->sku_barcode_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->unit_type }}</td>
                <td>
                    <?php
                        $categoryId = $product->category_id;
                        $categoryName = ProductController::prod_category($categoryId);
                    ?>
                    {{ @$categoryName->name }}
                </td>
                <td>
                    <?php
                        $supplierId = $product->supplier_id;
                        $supplierName = ProductController::prod_supplier($supplierId);
                    ?>
                    {{ @$supplierName->name }}
                </td>
                <td class="text-center"><span class="badge bg-{{ $product->is_active ? 'success' : 'danger' }} "> {{ $product->is_active ? 'Active' : 'Inactive' }} </span></td>
                <td class="text-center">
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('qrcode-print')
                        <a href="#" id="{{ $product->sku_barcode_id }}" class='btn btn-secondary btn-sm showQrcode' onclick="showModal(this)" role="button" title="QR Code"><i class="fas fa-qrcode"></i> QR Code</a>
                        @endcan
                        @can('product-list')
                        <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-info btn-sm' title="View"><i class="fas fa-eye"></i> View</a>
                        @endcan
                        @can('product-edit')
                        <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-warning btn-sm' title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                        @endcan
                        @can('product-delete')
                        {!! Form::button('<i class="fas fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            <div id="{{ $product->sku_barcode_id }}" class="d-none">
                <span> {{ $product->name }} </span>
                <span> {!! QrCode::size(200)->generate($product->sku_barcode_id); !!} </span>
            </div>

        @endforeach
        </tbody>
    </table>
</div>
