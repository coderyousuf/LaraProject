@extends('master')
@section('title', 'Product-Create-Page')
@section('content')

<div class="row">
    <div class="col-8 m-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product Add Form</h4>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Select Category Name</label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option selected>select a category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select SubCategory Name</label>
                        <select class="form-select" name="subcategory_id" aria-label="Default select example">
                            <option selected>select a subcategory</option>
                            @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Price</label>
                        <input type="number" name="price" id="" class="form-control" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Image</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info">Add New Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
