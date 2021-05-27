<?php
use App\Http\Controllers\DeliveryController;
?>
<div class="table-responsive">
    <table class="table" id="deliveries-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Reference No.</th>
                <th>Supplier</th>
                <th class="text-right">Total Costs</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($deliveries as $delivery)
            <tr>
                <td>{{ $delivery->transac_date }}</td>
                <td>{{ $delivery->ref_no }}</td>
                <td>
                    {{-- {{ $delivery->supplier_id }} --}}
                    <?php
                        $supplierId = $delivery->supplier_id;
                        $supplierName = DeliveryController::delivery_supplier($supplierId);
                    ?>
                    {{ @$supplierName->name }}
                </td>
                <td class="text-right">{{ number_format($delivery->total_prod_costs,2) }}</td>
                <td class="text-center"><span class="badge bg-{{ $delivery->is_active ? 'success' : 'danger' }} "> {{ $delivery->is_active ? 'Completed' : 'Incomplete' }} </span></td>
                <td class="text-center">
                    {!! Form::open(['route' => ['deliveries.destroy', $delivery->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('delivery-list')
                        <a href="{{ route('deliveries.show', [$delivery->id]) }}" class='btn btn-info btn-sm' title="View"><i class="fas fa-eye"></i> View</a>
                        @endcan
                        @can('delivery-edit')
                        <a href="{{ route('deliveries.edit', [$delivery->id]) }}" class='btn btn-warning btn-sm' title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                        @endcan
                        @can('delivery-delete')
                        {!! Form::button('<i class="fas fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
