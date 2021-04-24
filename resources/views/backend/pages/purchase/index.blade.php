@extends('layouts.backend.app')
@push('css')
   @include('layouts.backend.partials.assets')
@endpush
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
                <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.purchase.create') }}"><i
                        class="fa fa-plus-circle"></i> Create New</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Purchase</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23"
                            class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Purchase No</th>
                                    <th>Date </th>
                                    <th>Product Name </th>
                                    <th>Unit</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Purchase No</th>
                                    <th>Date </th>
                                    <th>Product Name </th>
                                    <th>Unit</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($purchases as  $key=>$purchase)
                                <tr>
                                    <td>{{ $key + 1 }} </td>
                                    <td>{{ $purchase->purchase_no}} </td>
                                    <td>{{ $purchase->date}} </td>
                                    <td>{{ $purchase['product']['name'] }} </td>
                                    <td>{{ $purchase['unit']['name']}} </td>            
                                    <td class="text-center">
                                        <a href="{{ route('admin.purchase.edit',$purchase->id) }}"
                                        class ="btn btn-info waves-effect">
                                        <i class="material-icons">edit</i>
                                        </a>
                                        <button class="btn btn-danger waves-effect" type="button" 
                                        onclick="deleteData({{ $purchase->id }})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{ $purchase->id }}" 
                                        action="{{ route('admin.purchase.destroy',$purchase->id) }}" 
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