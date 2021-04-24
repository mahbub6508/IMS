@extends('layouts.backend.app')
@push('css')
	@include('layouts.backend.partials.assets')
@endpush
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
                <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.unit.create') }}"><i
                        class="fa fa-plus-circle"></i> Create New</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Supplier</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23"
                            class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach( $units as  $key=>$unit )
                                <tr>
                                    <td>{{ $key + 1 }} </td>
                                    <td>{{ $unit->name }} </td>                 
                                    <td>{{ $unit->created_at }} </td>
                                    <td>{{ $unit->updated_at }} </td>
                                    <td class="text-center">
                                    @php
                                        $count_unit = App\Model\Product::where('unit_id',$unit->id)->count();
                                    @endphp
                                    
                                        <a href="{{ route('admin.unit.edit',$unit->id) }}"
                                        class ="btn btn-info waves-effect">
                                        <i class="material-icons">edit</i>
                                        </a>
                                        @if($count_unit < 1)
                                        <button class="btn btn-danger waves-effect" type="button" 
                                        onclick="deleteData({{ $unit->id }})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        @endif
                                        <form id="delete-form-{{ $unit->id }}" 
                                        action="{{ route('admin.unit.destroy',$unit->id) }}" 
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