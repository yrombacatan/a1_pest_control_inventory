<?php
use App\Http\Controllers\OrderController;
?>
<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Transaction No.</th>
                <th>Transaction Date</th>
                <th>Order By</th>
                <th class="text-right">Total Order Costs</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->transac_no }}</td>
                <td>{{ $order->transac_date }}</td>
                <td>
                    <?php
                        $userId = $order->order_by;
                        $UserName = OrderController::order_user($userId);
                    ?>
                    {{ @$UserName->name }}  
                </td>
                <td class="text-right">{{ number_format($order->total_order_cost,2) }}</td>
                <td class="text-center">
                <?php $order_stat = number_format($order->order_stat) ?>
                 @if ($order_stat == 0)
                    <span class="badge badge-secondary"> Pending </span>
                 @elseif($order_stat == 1) 
                    <span class="badge badge-primary"> Picked Up </span>
                 @elseif($order_stat == 2)
                    <span class="badge badge-success"> Invoiced </span>
                 @elseif($order_stat == 3)
                 <span class="badge badge-warning"> Cancelled </span>
                 @endif
                </td>
                <td class="text-center">
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('order-list')
                        <a href="{{ route('orders.show', [$order->id]) }}" class='btn btn-info btn-sm' title="View"><i class="fas fa-eye"></i> View</a>
                        @endcan
                        @can('order-edit')
                        <a href="{{ route('orders.edit', [$order->id]) }}" class='btn btn-warning btn-sm' title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                        @endcan
                        @can('order-delete')
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
