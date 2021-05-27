<div class="table-responsive">
    <table class="table table-striped table-bordered" id="departments-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{ $department->name }}</td>
                <td>{{ $department->slug }}</td>
                <td class="text-center"><span class="badge bg-{{ $department->is_active ? 'success' : 'danger' }} "> {{ $department->is_active ? 'Active' : 'Inactive' }} </span></td>
                <td class="text-center">
                    {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('department-list')
                        <a href="{{ route('departments.show', [$department->id]) }}" class='btn btn-info btn-sm' title="View"><i class="fas fa-eye"></i> View</a>
                        @endcan
                        @can('delivery-edit')
                        <a href="{{ route('departments.edit', [$department->id]) }}" class='btn btn-warning btn-sm' title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
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
