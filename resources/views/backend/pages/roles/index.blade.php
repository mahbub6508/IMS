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
            <h4 class="text-themecolor">Roles</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item active">Role</li>
                </ol>
                @if (Auth::guard('admin')->user()->can('role.create'))
                <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.roles.create') }}"><i
                        class="fa fa-plus-circle"></i>Create Role</a>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Roles Table</h4>
                    <div class="table-responsive m-t-40">
                         @include('layouts.backend.partials.aleart')
                        <table id="example23"
                            class="display nowrap table table-hover table-striped table-bordered"
                            >
                            <thead>
                                <tr>
                                	<th>ID</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                	<th>ID</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	@foreach($roles as $key=>$role)
                            	<tr>
                            		<td>{{ $key + 1 }}</td>
                            		<td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $perm)
                                            <span class="badge badge-info mr-1">
                                                {!! str_limit($perm->name,'20') !!}
                                            </span>
                                        @endforeach
                                    </td>
                            		<td>{{ $role->created_at }}</td>
                            		<td>{{ $role->updated_at }}</td>
                            		<td class="text-center">
                                        @if (Auth::guard('admin')->user()->can('role.edit'))
                                        <a href="{{ route('admin.roles.edit',$role->id) }}"
                                            class ="btn btn-info waves-effect">
                                        <i class="material-icons">edit</i>
                                        </a>
                                        @endif
                                        @if (Auth::guard('admin')->user()->can('role.delete'))
                                        <button class="btn btn-danger waves-effect" type="button" 
                                            onclick="deleteRole({{ $role->id }})">
                                                <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{ $role->id }}" 
                                            action="{{ route('admin.roles.destroy',$role->id) }}" 
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @endif
                                        </td>
                            	</tr>
                            	@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')

<script src="{{ asset('backend/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
        <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
        <script type="text/javascript">


        function deleteRole(id) {
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
    <script>
        $(function () {
            
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        });

    </script>
@endpush