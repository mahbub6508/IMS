@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Invoice</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
                    <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('admin.invoice.index') }}"><i
                        class="fa fa-plus-circle"></i>Invoice List</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Add Invoice</h4>
                <!-- <form action="{{ route('admin.purchase.store') }}" method="post" enctype="multipart/form-data">
                    @csrf -->
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Invoice No</label>
                                <input type="text" value="{{$invoice_no}}" class="form-control form-control-sm" name="invoice_no" id="invoice_no" readonly style="background-color: #D8FDBA">
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="form-group">
                                <label >Date</label>
                                <input type="date" value="{{$date}}" class="form-control form-control-sm" name="date" id="date" placeholder="YYYY-MM-DD" id="date">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Category Name</label>
                                <select class="form-control select2" name="category_id" id="category_id"  >
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="$category->id">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label >Product Name</label>
                                <select class="form-control select2" name="product_id" id="product_id" >
                                   <option value="">Select Product</option>
                                   @foreach($products as $product)
                                        <option value="$product->id">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Stock </label>
                                <input type="text" name="current_stock_qnty" id="current_stock_qnty" class="form-control form-control-sm" readonly style="background-color:#D8FDBA">
                            </div>
                        </div>
                        <div class="form-group col-md-1" style="padding-top:30px;">
                            <a class="btn btn-success addeventmore btn-sm"> <i class="fa fa-check"></i>Add</a>
                        </div>
                    </div>
                    
                <!-- </form> -->
            </div>
            <div class="card card-body">
                <form method="POST" action="{{ route('admin.purchase.store') }}" id="myForm">
                    @csrf
                    <table class="table-sm table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>KG/BOX/Pcs</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="addRow" class="addRow">

                        </tbody>
                        <tbody>
                            <tr>
                            <td colspan="4">Discount</td>
                            <td><input type="text" name="discount_amount" id="discont_amount" class="form-control form-control-sm discont_amount text-right" placeholder="Discount Amount"></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>
                                    <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
                                </td>
                                <td></td>
                            </tr>
                        </tbody>    
                    </table>
                    <br>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea name="description" class="form-control" id="description" placeholder="Write Your Comments Here"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label><strong>Paid Status</strong></label>
                            <select name="paid_status" id="paid_status" class="form-control from-control-sm">
                                <option value="">Select Status</option>
                                <option value="full_paid">Full Paid</option>
                                <option value="full_due">Full Due</option>
                                <option value="partial_paid">Partial Paid</option>
                            </select>
                            <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display:none;">
                        </div>
                        <div class="form-group col-md-5">
                            <label>Customer Name</label>
                            <select name="customer_id" id="customer_id" class="form-control from-control-sm select2">
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}} , ({{$customer->phone}}) , ({{$customer->address}})</option>
                                @endforeach
                                <option value="0"> New Customer</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row new_customer" style="display:none;">
                        <div class="form-group col-md-4">
                            <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Write customer name">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="Write customer Phone Number">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Write customer Address">
                        </div>
                    </div>
                    
                    <div class="form_group">
                        <button type="submit" class="btn btn-primary btn-sm" id="storeButton">Invoice Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script id="document-template" type="text/x-handlerbars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{category_name}}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{product_name}}
        </td>
        <td>
            <input type="number" min="1" class="form-control form-control-sm text-right selling_qnty" name="selling_qnty[]" value="1">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
        </td>
        <td>
            <input class="form-control form-control-sm text-right selling_price" name="selling_price[]" value="0" readonly>
        </td>
        <td>
            <i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i>
        </td>
    </tr>
</script>
<script type="text/javascript">
    $(document).ready(function (){
        $(document).on("click","addeventmore", function () {
            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var supplier_id = $('#supplier_id').val();
            var supplier_name = $('#supplier_id').find('option:selected').text();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            
            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var data = {
                date:date,
                invoice_no:invoice_no,
                category_id:category_id,
                category_name:category_name,
                product_id:product_id,
                product_name:product_name
            };

            var html = template(data);
            $("#addRow").append(html);
            });
            
            $(document).on("click",".removeeventmore", function(event){
                $(this).closest(".delete_add_more_item").remove();
            });
            $(document).on('keyup click",".unit_price,.selling_qnty',function(){
                var unit_price = $(this).closest("tr").find("input.unit_price").val();
                var qnty = $(this).closest("tr").find("input.selling_qnty").val();
                var total = unit_price * qnty;

                $(this).closest("tr").find("input.selling_price").val(total);
                $('#discount_amount').tigger('keyup');
            });

            $(document).on('keyup','#discount_amount',function(){
                totalAmountPrice();
            });

        function totalAmountPrice(){
            var sum = 0;
            $(".selling_price").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length !=0){
                    sum += parseFloat(value);
                }
            });
            var discount_amount = parseFloat($('#discount_amount').val());
            if(!isNaN(discount_amount) && discount_amount.length !=0){
                sum -= parseFloat(discount_amount);
            }
            $('#estimated_amount').val(sum);
        }
    });

</script>
<script type="text/javascript">
    $(function(){
        $(document).on('change','#supplier_id', function(){
            var supplier_id = $(this).val();
            $.ajax({
                url:"{{ route('get-category') }}",
                type:"GET",
                data:{supplier_id:supplier_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html +='<option value="'+v.category_id+'">'+v.category.name+'</option>';
                    });
                    $('#category_id').html(html);
                },
                // error: function (error) {
                // alert('error; ' + eval(error));
                // }
                
            });
        });
    });
</script>

<script type="text/javascript">
    $(function(){
        $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{ route('get-product') }}",
                type:"GET",
                data:{category_id:category_id},
                success:function(data){
                    var html = '<option value="">Select Product</option>';
                    $.each(data,function(key,v){
                        html +='<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $('#product_id').html(html);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{route('check-product-stock')}}",
                type:"GET",
                data:{product_id},
                success:function(data){
                    $('#current_stock_qnty').val(data);
                }
            });
        });
    });
</script>
<script type="text/javascript">
//paid
$(document).on('change','#paid_status',function(){
    var paid_status = $(this).val();
    if(paid_status == 'partial_paid'){
        $('.paid_amount').show();
    }
    else{
        $('.paid_amount').hide();
        }
    });
    //customer
    $(document).on('change','#customer_id',function(){
    var customer_id = $(this).val();
    if(customer_id == '0'){
        $('.customer_id').show();
    }
    else{
        $('.customer_id').hide();
    }
});
</script>
<script>
    $(function () {
        // For select 2
        $(".select2").select2();
    });
</script>
@endsection
