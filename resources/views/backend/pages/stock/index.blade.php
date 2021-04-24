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
            <h4 class="text-themecolor">Stocks</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item active">Stock</li>
                </ol>
                <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.stock.create') }}"><i
                        class="fa fa-plus-circle"></i> Create New</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Stocks</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23"
                            class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Id</th>
                                    <th>Batch Code</th>
                                    <th>Cost Price</th>
                                    <th>Retail Price</th>
                                    <th>Quantity</th>
                                    <th>In Stock</th>
                                    <th>Note</th>
                                    {{--<th>Created At</th>
                                    <th>Updated At</th>--}}
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Id</th>
                                    <th>Batch Code</th>
                                    <th>Cost Price</th>
                                    <th>Retail Price</th>
                                    <th>Quantity</th>
                                    <th>In Stock</th>
                                    <th>Status</th>
                                    {{--<th>Created At</th>
                                    <th>Updated At</th>--}}
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($stocks as  $key=>$stock)
                                <tr>
                                    <td>{{ $key + 1 }} </td>
                                    <td>{{ $stock->product_id }} </td>
                                    <td>{{ $stock->batch_code }} </td>
                                    <td>{{ $stock->cost_price }} </td>                     
                                    <td>{{ $stock->retail_price }} </td>
                                    <td>{{ $stock->quantity }} </td>                     
                                    <td>{{ $stock->in_stock }} </td>
                                    <td>{{ $stock->note }} </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.stock.edit',$stock->id) }}"
                                        class ="btn btn-info waves-effect">
                                        <i class="material-icons">edit</i>
                                        </a>
                                        <button class="btn btn-danger waves-effect" type="button" 
                                        onclick="deleteStock({{ $stock->id }})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{ $stock->id }}" 
                                        action="{{ route('admin.stock.destroy',$stock->id) }}" 
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
    <script src="{{ asset('backend/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!-- This is data table -->
    <script src="{{ asset('backend/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>  
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">


        function deleteStock(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe !!!',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush 