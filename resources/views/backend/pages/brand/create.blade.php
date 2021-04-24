@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Brand</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Datatable</li>
                </ol>
                <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.brand.index') }}"><i
                        class="fa fa-plus-circle"></i>Brand List</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Add New Brands</h4>

                <form class="mt-4" action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="brand-name">Brand Name</label>
                        <input type="text" class="form-control" id="brand-name" name="brand_name" placeholder="Enter Brand Name">
                    </div>

                    <div class="form-group">
                        <label class="form-control" for="brandImage">Choose file</label>
                        <input type="file" class="form-control" id="brandImage" name="brand_photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection

