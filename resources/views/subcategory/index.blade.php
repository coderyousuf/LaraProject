@extends('master')
@section('title', 'SubCategory-Index-Page')
@push('admin_style')
<style>
.tab-color{
    background-color: #add;
    font-size: 18px;
}
</style>
@endpush
@section('content')
<div class="row">
    <div class="d-flex justify-content-end my-4">
        <a href="{{ route('subcategory.create') }}" class="btn btn-success">Create Sub Category</a>
    </div>
    <div class="col-8 m-auto">
        <table class="table tab-color">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">SubCategory Name</th>
                <th scope="col">Create AT</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $subcategory)
                <tr>
                    <th scope="row">{{ $subcategory->id }}</th>
                    <td>{{ $subcategory->category_name_hobe }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('subcategory.show',['subcategory' => $subcategory->id]) }}" class="btn btn-success">Show</a>
                        <a href="{{ route('subcategory.edit', ['subcategory'=>$subcategory->id]) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('subcategory.destroy', ['subcategory'=>$subcategory->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button href="" type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title="Delete">Delete</button>
                        </form>
                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
    </div>
</div>
@endsection
{{--
@push('admin_script')
<script>
   $('.show_confirm').click(function(event){
    let form=$(this).closest('form');

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
 --}}
