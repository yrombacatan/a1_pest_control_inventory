<div class="table-responsive">
    <table class="table" id="suppliers-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Type</th>
                <th>Account Holder</th>
                <th>Account Number</th>
                <th>Bank Name</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->address }}</td>
                <td>{{ $supplier->type }}</td>
                <td>{{ $supplier->account_holder }}</td>
                <td>{{ $supplier->account_number }}</td>
                <td>{{ $supplier->bank_name }}</td>
                <td class="text-center"><span class="badge bg-{{ $supplier->is_active ? 'success' : 'danger' }} "> {{ $supplier->is_active ? 'Active' : 'Inactive' }} </span></td>
                <td class="text-center">
                    {!! Form::open(['route' => ['suppliers.destroy', $supplier->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('supplier-list')
                        <a href="{{ route('suppliers.show', [$supplier->id]) }}" class='btn btn-info btn-sm' title="View"><i class="fas fa-eye"></i> View</a>
                        @endcan
                        @can('supplier-edit')
                        <a href="{{ route('suppliers.edit', [$supplier->id]) }}" class='btn btn-warning btn-sm' title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                        @endcan
                        @can('supplier-delete')
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
