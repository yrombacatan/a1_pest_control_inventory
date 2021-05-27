<div class="table-responsive">

    <table id="users-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th class="text-center">Mobile Number</th>
                <th>Role</th>
                <!-- <th>Role</th> -->
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>

            <td>
                <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('adminlte/dist/img/avatar-default.jpg')}}" alt="User Image">
                    <span class="username">{!! $user->name !!}</span>
                    <span class="description">Email: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></span>
                    <span class="description">Added: {{ $user->created_at->format('M. d, Y') }}</span>
                </div>
            </td>
            <td>{!! $user->designation !!}</td>
            <td class="text-center">{!! $user->mobilenum !!}</td>
            <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
            <td class="text-center"><span class="badge bg-{{ $user->is_active ? 'success' : 'danger' }} "> {{ $user->is_active ? 'Active' : 'Inactive' }} </span></td>
            <td class="text-center">
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- @can('user-list') --}}
                    <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-info btn-sm' title="View"><i class="fas fa-eye"></i> View</a>
                    {{-- @endcan
                    @can('user-edit') --}}
                    <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-warning btn-sm' title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                    {{-- @endcan
                    @can('user-delete') --}}
                    {!! Form::button('<i class="fas fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {{-- @endcan --}}
                </div>
                {!! Form::close() !!}
            </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
