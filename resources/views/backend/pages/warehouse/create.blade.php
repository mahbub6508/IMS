@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Warehouse</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Datatable</li>
                </ol>
                    <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.warehouse.index') }}"><i
                        class="fa fa-plus-circle"></i>Warehouse List</a>
            </div>
        </div>
    </div>
    <div class="row">
	    <div class="col-12">
	        <div class="card card-body">
	            <h4 class="card-title">Add Warehouse</h4>

	            <form action="{{ route('admin.warehouse.store') }}" method="post" >
	                @csrf
	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label for="name">Warehouse Name</label>
	                            <input type="text" class="form-control" id="name" name="name" required>
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
		                        <label for="status">Status</label>
		                        <select class="form-control custom-select" name="status" required>
		                            <option>Select Status</option>
		                            <option>Active</option>
		                            <option>Deactive</option>
		                        </select>
		                    </div>
		                </div>
		            </div>
	                <div class="row">
	                    <div class="col-md-12">
	                        <a type="button" class="btn btn-danger" href="{{ route('admin.warehouse.index') }}">Back</a>
	                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</div>
@endsection

