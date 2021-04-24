<?php

namespace App\Http\Controllers\Backend;

use DB;
use Validator;
use App\Warehouse;
use App\Model\Stock;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::latest()->get();
        return view('admin.stock.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $validate = Validator::make($request->all(),[
                'product_id'    => 'required|exists:products,id',
                'batch_code'    => 'required|unique:stocks',
                'cost_price'    => 'required|numeric',
                'retail_price'  => 'required|numeric',
                'quantity'      => 'required|integer',
                'note'          => 'required|max:255',
                'warehouse'     => 'required',
            ]);
            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }

            DB::beginTransaction();

            $stock = new Stock();
            $stock->product_id      = $request->product_id;
            $stock->batch_code      = $request->batch_code;
            $stock->cost_price      = $request->cost_price;
            $stock->retail_price    = $request->retail_price;
            $stock->quantity        = $request->quantity;
            $stock->in_stock        = 1;
            $stock->note            = $request->note;
            $stock->warehouse       = $request->warehouse  ;

            $stock->save();
            
            Product::where('id', $stock->product_id)->increment('quantity', $stock->quantity);

            DB::commit();

            return Redirect()->route('admin.product.index')->with([
                'message' => 'Successfully Stock Created',
                'alert-type' => 'success'
            ]);
        }catch (\Exception $e) {
            DB::rollBack();
            return $e;
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
        $stock = Stock::find($id);
        $product = Product::find($id);
        $warehouses = Warehouse::all();
        return view('admin.stock.edit',compact('stock','product','warehouses'));
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
         try {

            $validate = Validator::make($request->all(),[
                'product_id'    => 'required|exists:products,id',
                'batch_code'    => 'required|unique:stocks',
                'cost_price'    => 'required',
                'retail_price'  => 'required',
                'quantity'      => 'required',
                'in_stock'      => 'required',
                'note'          => 'required',
            ]);
            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }

            $stock = new Stock();
            $stock->product_id      = $request->product_id;
            $stock->batch_code      = $request->batch_code;
            $stock->cost_price      = $request->cost_price;
            $stock->retail_price    = $request->retail_price;
            $stock->quantity        = $request->quantity;
            $stock->in_stock        = $request->in_stock;
            $stock->note            = $request->note;

            $stock->save();
            
            return Redirect()->route('admin.stock.index')->with([
                'message' => 'Successfully Inserted',
                'alert-type' => 'success'
            ]);
        }catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock::find($id)->delete();
        return redirect()->back();
    }
}
