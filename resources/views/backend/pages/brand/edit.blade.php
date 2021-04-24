@extends('layouts.backend.app')


@section('content')
<div class="container-fluid">
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
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
            <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.brand.create') }}"><i
                    class="fa fa-plus-circle"></i> Create New</a>
        </div>
    </div>
 </div>
    <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                            <h4 class="card-title">Edit Brands</h4>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="{{ route('admin.brand.update',[$brand->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $brand->name }}">
                                    <label class="form-label">Brand Name</label>
                                </div>
                                </div>
                                <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="brand_code" class="form-control" name="brand_code" value="{{ $brand->brand_code }}">
                                    <label class="form-label">Brand Code</label>
                                </div>
                                </div>
                                <div class="form-group">

                                <img src="{{asset('storage/brand/'.$brand->image)}}" width="100px"/>
                                <input type="file" name="brand_photo" id="brandImage" >
                                </div>
                                    <a type="submit" class="btn btn-dark waves-effect" href="{{ route('admin.brand.index') }}">Back</a>
                                    <button type="submit" class="btn btn-success mr-2 waves-effect">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection
