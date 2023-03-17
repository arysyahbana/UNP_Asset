@extends('admin.layouts.main')

@section('title', 'Add Category')

@section('main_content')
    <div class="container-fluid">
        <div class="card">
            <form action="{{ route('admin_subCategory_store') }}" method="post">
                @csrf
                <div class="card-body">
                    <h5 class="card-title">Add Category</h5>
                    <div class="mb-3">
                        <label class="form-label text-dark ">Sub Category Name</label>
                        <input type="text" class="form-control" id="subCategory_name" placeholder="Sub Category Name"
                            name="subCategory_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark ">Sub Category Order</label>
                        <input type="text" class="form-control" id="subCategory_order" placeholder="Sub Category Order"
                            name="subCategory_order">
                    </div>
                    <div class="form-group mb-3">
                        <label>Category Menu?</label>
                        <select name="category_menu" class="form-control">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Show On Menu?</label>
                        <select name="show_on_menu" class="form-control">
                            <option value="Show">Show</option>
                            <option value="Hide">Hide</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="" style="height: 35.5rem"></div>
@endsection
