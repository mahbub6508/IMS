@extends('layouts.backend.app')

@section('content')


<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Purchase</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item active">Purchase</li>
                </ol>
                    <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.purchase.index') }}"><i
                        class="fa fa-plus-circle"></i>Purchase List</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Add Purchase</h4>
                
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label >Date</label>
                                <input type="date" value="{{$date}}" class="form-control form-control-sm" name="date" id="date" placeholder="YYYY-MM-DD" id="date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Purchase No</label>
                                <input type="text" class="form-control form-control-sm" name="purchase_no" id="purchase_no" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Supplier Name</label>
                                <select class="form-control select2" onchange="getCategory(this.value)" name="supplier_id" id="supplier_id" class="form-control" >
                                    <option value="">Select Supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Category Name</label>
                                <select class="form-control select2" name="category_id" id="category_id" >
                                   <option value="">Select Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Product Name</label>
                                <select class="form-control select2" name="product_id" id="product_id" >
                                   <option value="">Select Product</option>
                                    <!-- @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 30px;">
                            <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-check"></i> Add Items</button>
                        </div>
                    </div>
                    
                
            </div>
            <div class="card card-body">
                <form method="POST" action="{{ route('admin.purchase.store') }}" id="myForm">
                    
                    <table class="table-sm table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>KG/BOX/Pcs</th>
                                <th>Unit Price</th>
                                <th>Description</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="addRow" class="addRow">

                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="5"></td>
                                <td>
                                    <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
                                </td>
                                <td></td>
                            </tr>
                        </tbody>    
                    </table>
                    <br>
                    <div class="form_group">
                        <button type="submit" class="btn btn-primary btn-sm" id="storeButton">Purchase Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
 <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script>
$(document).ready(function(){
 
    $('#supplier_id').on('change',function(e){
        var category_id = e.target.value;
        console.log(category_id);
        $.ajax({
            type: "get",
            url: '<?php echo url('get-category');?>/'+category_id,
            dataType: 'html',
            data: JSON.stringify,
            success: function(data) {
                console.log(data);
                $('#category_id').html(data);
                $('select').select2();
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });
});
 
</script>

@endpush