<div class="table-responsive">
    <table class="table table-striped table-bordered" id="clients-table">
        <thead>
            <tr>
                <th>Customer</th>
                <th>ABN Number</th>
                <th>Fax</th>
                <th>Address</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('adminlte/dist/img/user7-128x128.jpg')}}" alt="User Image">
                        <span class="username">{!! $client->customer !!}</span>
                        <span class="description">Added: {{ $client->created_at->format('M. d, Y') }}</span>
                    </div>
                </td>
                <td>{{ $client->abnnum }}</td>
                <td>{{ $client->faxnum }}</td>
                <td>{{ $client->address }}</td>
                <td class="text-center"><span class="badge bg-{{ $client->is_active ? 'success' : 'danger' }} "> {{ $client->is_active ? 'Active' : 'Inactive' }} </span></td>
                <td class="text-center">
                    {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clients.show', [$client->id]) }}" class='btn btn-info btn-sm' title="View"><i class="fas fa-eye"></i> View</a>
                        <a href="{{ route('clients.edit', [$client->id]) }}" class='btn btn-warning btn-sm' title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                        {!! Form::button('<i class="fas fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
