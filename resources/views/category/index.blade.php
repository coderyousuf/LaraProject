@extends('master')

@section('title', 'Category-Index-Page')

@push('admin_style')

@endpush

@section('content')
<div class="row">
    <div class="d-flex justify-content-end my-4">
        <a href="{{ route('category.create') }}" class="btn btn-success">Create Category</a>
    </div>
    <div class="col-8 m-auto">
        <h4 class="">Normal data</h4>
        <table class="table tab-color">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col"># of SubCategory</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    {{-- <td>{{ $category->subcategories->count() }}</td> --}}
                    <td>{{ $category->subcategories_count}}</td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>

                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('category.show',['category' => $category->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('category.edit',['category' => $category->id]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Del</button>
                            </form>
                        </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row my-4">
    <div class="col-8 m-auto">
        <h4 class="">Soft Deleted Data</h4>
        <table class="table tab-color">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col"># of SubCategory</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    {{-- <td>{{ $category->subcategories->count() }}</td> --}}
                    <td>{{ $category->subcategories_count }}</td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>

                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('category.restore',['category_id' => $category->id]) }}" class="btn btn-info">Restore</a>
                            <form action="{{ route('category.forcedelete', ['category_id' => $category->id]) }}" method="post">
                                @method('GET')
                                @csrf
                                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Force Del</button>
                            </form>

                        </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


@push('admin_script')
<script>
    $('.show_confirm').click(function(event){
        let form = $(this).closest('form');
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
    });
</script>
@endpush
