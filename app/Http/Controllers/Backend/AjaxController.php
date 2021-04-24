<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Model\Product;
use App\Category;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Purchase;

class AjaxController extends Controller
{
    public function getCategory(Request $request){
        $supplier_id = $request->supplier_id;
        $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        //dd($allCategory);
        return response()->jason($allCategory);
    }
    public function getProduct(Request $request){
        $supplier_id = $request->supplier_id;
        $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        //dd($allCategory);
        return response()->jason($allCategory);
    }

    //  public function pendingList(){
    //      $pendingPurchse = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
    //     return view('backend.pages.purchase.pending',compact('pendingPurchse'));
    // }
}
