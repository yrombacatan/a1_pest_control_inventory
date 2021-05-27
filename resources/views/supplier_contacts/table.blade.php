<div class="table-responsive">
    <table class="table" id="supplierContacts-table">
        <thead>
            <tr>
                <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Photo</th>
        <th>Is Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($supplierContacts as $supplierContact)
            <tr>
                <td>{{ $supplierContact->first_name }}</td>
            <td>{{ $supplierContact->last_name }}</td>
            <td>{{ $supplierContact->email }}</td>
            <td>{{ $supplierContact->phone }}</td>
            <td>{{ $supplierContact->photo }}</td>
            <td>{{ $supplierContact->is_active }}</td>
                <td>
                    {!! Form::open(['route' => ['supplierContacts.destroy', $supplierContact->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('supplierContacts.show', [$supplierContact->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('supplierContacts.edit', [$supplierContact->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
