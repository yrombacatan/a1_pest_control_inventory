<div class="table-responsive">
    <table class="table" id="technicians-table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($technicians as $technician)
            <tr>
                <td>{{ $technician->first_name }}</td>
                <td>{{ $technician->last_name }}</td>
                <td>{{ $technician->email }}</td>
                <td>{{ $technician->phone }}</td>
                <td class="text-center"><span class="badge bg-{{ $technician->is_active ? 'success' : 'danger' }} "> {{ $technician->is_active ? 'Active' : 'Inactive' }} </span></td>
                <td class="text-center">
                        {!! Form::open(['route' => ['technicians.destroy', $technician->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('technicians.show', [$technician->id]) }}" class='btn btn-info btn-sm' title="View"><i class="fas fa-eye"></i> View</a>
                            <a href="{{ route('technicians.edit', [$technician->id]) }}" class='btn btn-warning btn-sm' title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                            {!! Form::button('<i class="fas fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
