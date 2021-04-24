@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Product</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Datatable</li>
                </ol>
                    <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.product.index') }}"><i
                        class="fa fa-plus-circle"></i>Product List</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Add Product</h4>
                <form action="{{ route('admin.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label >Supplier Name</label> 
                                <select name="supplier_id" id="supplier_id" class="form-control">
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{($product->supplier_id==$supplier->id)?"selected":''}} >{{ $supplier->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Category Name</label>
                                <select class="form-control" name="category_id" >
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{($product->category_id==$category->id)?"selected":''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <select name="unit_id" class="form-control">
                                <option value="">Select Unit</option>
                                @foreach($unit as $unit)
                                <option value="{{ $unit->id }}" {{($product->unit_id==$unit->id)?"selected":''}}>{{ $unit->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="product_name">Product Name</label> 
                                <input type="text" class="form-control" id="product_name" name="product_name"  value="{{ $product->product_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a type="button" class="btn btn-danger" href="{{ route('admin.product.index') }}">Back</a>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

