@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Supplier</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Datatable</li>
                </ol>
                    <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.supplier.index') }}"><i
                        class="fa fa-plus-circle"></i>Supplier List</a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h4 class="card-title">Add Supplier</h4>

            <form action="{{ route('admin.supplier.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="name">Supplier Name</label> 
                            <input type="text" class="form-control" id="name" name="name"  required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" id="company" name="company" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control" for="Image">Choose file</label>
                            <input type="file" class="form-control" id="Image" name="supplier_image" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a type="button" class="btn btn-danger" href="{{ route('admin.supplier.index') }}">Back</a>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

