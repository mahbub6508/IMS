@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Customer</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Datatable</li>
                </ol>
                    <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.customer.index') }}"><i
                        class="fa fa-plus-circle"></i>Customer List</a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h4 class="card-title">Edit Customer</h4>

            <form action="{{ route('admin.customer.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="name">Customer Name</label> 
                            <input type="text" class="form-control" id="name" name="name"  value="{{ $customer->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }} ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <img src="{{asset('storage/customer/'.$customer->image)}}" width="100px"/>
                            <input type="file" class="form-control" id="Image" name="customer_image" value="{{ $customer->image }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a type="button" class="btn btn-danger" href="{{ route('admin.customer.index') }}">Back</a>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

