<?php

namespace App\Http\Controllers\Backend;

use DB;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

// Models
use App\Model\Product;
use App\Model\Stock;
use App\Warehouse;
use App\Category;
use App\Model\Supplier;
use App\Model\Unit;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.pages.product.index',compact('products'));
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
        return view('backend.pages.product.create',$data);
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
                'product_name'    => 'required',
                'supplier_id'    => 'required',
                'unit_id'    => 'required',
                'category_id'  => 'required',
            ]);
            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }
            
            $product = new Product();
            $product->supplier_id = $request->supplier_id;
            $product->category_id = $request->category_id;
            $product->unit_id = $request->unit_id;
            $product->product_name = $request->product_name;
            $product->save();
            
            return Redirect()->route('admin.product.index')->with([
                'message' => 'Successfully product Inserted',
                'alert-type' => 'success'
            ]);
        }catch (\Exception $e) {
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
        //$showproduct = Product::find($id);
        //$stocks = Stock::where('product_id',$id)->get();
        $data['suppliers'] = Supplier::all();
        $data['unit'] = Unit::all();
        $data['categories'] = Category::all();
        return view('backend.pages.product.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['suppliers'] = Supplier::all();
        $data['unit'] = Unit::all();
        $data['categories'] = Category::all();
        $data['product'] = Product::find($id);
        return view('backend.pages.product.edit',$data);
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
                'product_name'    => 'required',
                'supplier_id'    => 'required',
                'unit_id'    => 'required',
                'category_id'  => 'required',
            ]);
            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }
            
            $product = Product::find($id);
            $product->supplier_id = $request->supplier_id;
            $product->category_id = $request->category_id;
            $product->unit_id = $request->unit_id;
            $product->product_name = $request->product_name;
            $product->save();
            
            return Redirect()->route('admin.product.index')->with([
                'message' => 'Successfully product Inserted',
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
        Product::find($id)->delete();
        return redirect()->back();
    }
   
}

