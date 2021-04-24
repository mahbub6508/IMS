@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Stock</h4>
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
                <h4 class="card-title">Add Stocks</h4>
                <form action="{{ route('product.update-stock',$product->id) }}" method="post" >
                    @csrf
                    <div class="row">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch_code">Batch Code</label>
                                <input type="text" class="form-control" id="batch_code" name="batch_code" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cost_price">Cost Price</label>
                                <input type="number" class="form-control" id="cost_price" name="cost_price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="retail_price">Retail Price</label>
                                <input type="number" class="form-control" id="retail_price" name="retail_price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="in_stock">In Stock</label>
                                <input type="number" class="form-control" id="in_stock" name="in_stock" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="note">Note</label>
                                <input type="text" class="form-control" id="note" name="note" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Warehouse</label>
                                <select class="form-control" name="warehouse" >
                                    @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            <div>
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

