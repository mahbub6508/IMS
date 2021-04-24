<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Purchase;

class PurchaseController extends Controller
{
    // public function pendingList(){
    //     $pendings = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get(); 
    //     return view('backend.pages.purchase.pending',compact('pendings'));
    // }
}
