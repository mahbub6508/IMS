<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


// Models
use App\Model\Product;
use App\Category;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Purchase;
use App\Model\Invoice;
use App\Model\InvoiceDetail;
use App\Model\Payment;
use App\Model\PaymentDetail;
use App\Model\Customer;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::get();
        return view('backend.pages.invoice.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $products = Product::all();
        $categories = Category::all();
        $invoice_data = Invoice::orderBy('id','desc')->first();
        if($invoice_data == null){
            $firstReg = '0';
            $invoice_no = $firstReg+1;
        }
        else{
            $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
            $invoice_no = $invoice_data+1;
        }
        $customers = Customer::all();
        //$invoices = Invoice::get();
        $date = date('Y-m-d');
        return view('backend.pages.invoice.create',compact('categories','invoice_data','invoice_no','products','customers','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->category_id ==null){
            return redirect()->back()->with('error','Sorry you do not select any product');
        }
        else{
            if($request->paid_amount>$request->estimated_amount){
                return redirect()->back()->with('erroe','Sorry Paid amount is maximum value of total price');
            }
            else{
                $invoice = new Invoice();
                $invoice->invoice_no = $request->invoice_no;
                $invoice->date = $request->date;
                $invoice->description = $request->description;
                $invoice->status = '0';
                $invoice->save();
                DB::transaction(function() use($request,$invpoice){
                    if($invoice->save()){
                        $count_category = count($request->category_id);
                        for ($i=0; $i < $count_category; $i++){
                            $invoice_details = new InvoiceDetail();
                            $invoice_details->date = $request->date;
                            $invoice_details->invoice_id = $request->invoice->id;
                            $invoice_details->category_id = $request->category_id[$i];
                            $invoice_details->product_id = $request->product_id[$i];
                            $invoice_details->selling_qnty = $request->selling_qnty[$i];
                            $invoice_details->unit_price = $request->unit_price[$i];
                            $invoice_details->selling_price = $request->selling_price[$i];
                            $invoice_details->status = '1';
                            $invoice_details->save();
                        }
                        if($request->customer_id == '0'){
                            $customer = new Customer();
                            $customer->name = $request->name;
                            $customer->phone = $request->phone;
                            $customer->address = $request->address;
                            $customer->save();
                            $customer_id = $customer->id;
                        }else{
                            $customer_id = $request->customer_id;
                        }

                        $payment = new Payment();
                        $payment_details = new PaymentDetail();
                        $payment->invoice_id = $invoice->id;
                        $payment->customer_id = $customer_id;
                        $payment->paid_status = $request->paid_status;
                        $payment->discount_amount =$request->discount_amount;
                        $payment->total_amount = $request->estimated_amount;
                        if($request->paid_status == 'full_paid'){
                            $payment->paid_amount = $request->estimated_amount;
                            $payment->due_amount = '0';
                            $payment_details->current_paid_amount = $request->estimated_amount;
                        }
                        elseif($request->paid_status == 'full_due'){
                            $payment->paid_amount = '0';
                            $payment->due_amount = $request->estimated_amount;
                            $payment_due_log->current_due_amount = $request->estimated_amont;
                        }
                        elseif($request->paid_status == 'partial_paid'){
                            $payment->pai_amount = $request->paid_amount;
                            $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                            $payment_details->current_paid_amount = $request->paid_amount;
                            
                        }
                        $payment->save();
                        $payment_details->invoice_id = $invoice->id;
                        $payment_details->date = $request->date();
                        $payment_details->save();
                    }
                });
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pendingInvoice()
    {
        return view('backend.pages.invoice.invoicepending');
    }

    public function getStock(Request $request)
    {
        $product_id = $request->product_id;
        $stock = Product::where('id',$product_id)->first()->quantity;
        return respose()->json($stock);
    }
}
