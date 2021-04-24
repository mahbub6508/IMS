<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Supplier;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('backend.pages.supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.supplier.create');
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
                'name'          => 'required',
                'email'         => 'required|email',
                'company'       => 'required',
                'phone'         => 'required',
                'address'       => 'required',
                'supplier_image' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }
            // get form image
            $image = $request->file('supplier_image');

            if ($request->hasFile('supplier_image')) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = \Str::slug($request->supplier_name).'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('supplier'))
                {
                    Storage::disk('public')->makeDirectory('supplier');
                } 
    //            resize image for brand and upload
                $supplier = Image::make($image)->resize(800,800)->save('tmp');
                Storage::disk('public')->put('supplier/'.$imageName,$supplier);
            }else {
                $imagename = "default.png";
            }

            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->company = $request->company;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            //$supplier->created_by = Auth::user()->id;
            $supplier->image = $imageName;
            $supplier->save();
            
            return redirect()->route('admin.supplier.index')->with([
                'message' => 'Successfully Supplier Inserted',
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
        $supplier = Supplier::find($id);
        return view('backend.pages.supplier.edit',compact('supplier'));
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

            $imageName = null;
            // get form image
            $image = $request->file('supplier_image');

            if ($request->hasFile('supplier_image')) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = \Str::slug($request->supplier_name).'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('supplier'))
                {
                    Storage::disk('public')->makeDirectory('supplier');
                } 
    //            resize image for brand and upload
                $supplier = Image::make($image)->resize(800,800)->save('tmp');
                Storage::disk('public')->put('supplier/'.$imageName,$supplier);
            }else {
                $imagename = "default.png";
            }

            $supplier = Supplier::find($id);
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->company = $request->company;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            //$supplier->updated_by = Auth::user()->id;
           if($imageName){
                    $supplier->image = $imageName;
                }
            $supplier->save();
            
            return redirect()->route('admin.supplier.index')->with([
                'message' => 'Successfully Supplier Inserted',
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
        Supplier::find($id)->delete();
        return redirect()->back();
    }
}
