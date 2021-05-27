<div class="table-responsive">
    <table class="table" id="productCategories-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productCategories as $productCategory)
            <tr>
                <td>{{ $productCategory->name }}</td>
                <td>{{ $productCategory->slug }}</td>
                <td class="text-center"><span class="badge bg-{{ $productCategory->is_active ? 'success' : 'danger' }} "> {{ $productCategory->is_active ? 'Active' : 'Inactive' }} </span></td>
                <td class="text-center">
                    {!! Form::open(['route' => ['productCategories.destroy', $productCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('product-cat-list')
                        <a href="{{ route('productCategories.show', [$productCategory->id]) }}" class='btn btn-info btn-sm' title="View"><i class="fas fa-eye"></i> View</a>
                        @endcan
                        @can('product-cat-edit')
                        <a href="{{ route('productCategories.edit', [$productCategory->id]) }}" class='btn btn-warning btn-sm' title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                        @endcan
                        @can('product-cat-delete')
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
