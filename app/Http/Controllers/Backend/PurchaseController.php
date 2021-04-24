<?php

namespace App\Http\Controllers\Backend;


use DB;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


// Models
use App\Model\Product;
use App\Category;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Purchase;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.pages.purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['suppliers'] = Supplier::all();
        $data['categories'] = Category::all();
        $data['unit'] = Unit::all();
        $data['products'] = Product::all();
        $data['date'] = date('Y-m-d');
        return view('backend.pages.purchase.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->categiry_id == null){
            return redirect()->back()->with('error','Sorry you do not select items');

        }
        else{
            $count_category = count($request->category_id);
            for ($i=0; $i<$count_category; $i++){
                $purchase =new Purchase();
                $purchase->date = date('m-d-y',strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qnty =$request->buying_qnty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->status = '0';
                
                $purchase->save();
            }
        }
        return redirect()->route('admin.purchase.index')->with('success','Data saved successfully');
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

   

     public function getCategory(Request $request){
        $supplier_id =  $request->supplier_id;
        $categories = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        response()->json($categories);
        return view('backend.pages.purchase.ajax');
    }
    // public function getProduct(Request $request){
    //     $supplier_id = $request->category_id;
    //     $allProduct = Product::where('category_id',$category_id)->get();
    //     return response()->jason($allProduct);
    // }


    public function pendingList()
    {
         $purchasepending = Purchase::where('status','0')->get();
        return view('backend.pages.purchase.pending',compact('purchasepending'));
    }
}
