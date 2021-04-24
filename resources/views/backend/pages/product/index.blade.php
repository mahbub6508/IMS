@extends('layouts.backend.app')
@push('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endpush
@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Product</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
                <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.product.create') }}"><i
                        class="fa fa-plus-circle"></i> Create New</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Product</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23"
                            class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Supplier Name</th>
                                    <th>Category </th>
                                    <th>Product Name </th>
                                    <th>Unit</th>
                                    <th>Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Supplier Name</th>
                                    <th>Category </th>
                                    <th>Product Name </th>
                                    <th>Unit</th>
                                    <th>Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($products as  $key=>$product)
                                <tr>
                                    <td>{{ $key + 1 }} </td>
                                    <td>{{ $product['supplier']['name']}} </td>
                                    <td>{{ $product['category']['name']}} </td>
                                    <td>{{ $product->product_name }} </td>
                                    <td>{{ $product['unit'] ['name']}} </td>
                                    <td>{{ $product->created_at }} </td>                     
                                    <td class="text-center">
                                        <a href="{{ route('admin.product.edit',$product->id) }}"
                                        class ="btn btn-info waves-effect">
                                        <i class="material-icons">edit</i>
                                        </a>
                                        <button class="btn btn-danger waves-effect" type="button" 
                                        onclick="deleteData({{ $product->id }})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{ $product->id }}" 
                                        action="{{ route('admin.product.destroy',$product->id) }}" 
                                        method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection

@push('js')
    @include('layouts.backend.partials.assets')
@endpush