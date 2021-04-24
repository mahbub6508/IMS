@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Unit</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item active">Unit</li>
                </ol>
                    <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.unit.index') }}"><i
                        class="fa fa-plus-circle"></i>Unit List</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Add Unit</h4>
                <form action="{{ route('admin.unit.store') }}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="name">Unit Name</label> 
                                <input type="text" class="form-control" id="name" name="name"  required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a type="button" class="btn btn-danger" href="{{ route('admin.unit.index') }}">Back</a>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

