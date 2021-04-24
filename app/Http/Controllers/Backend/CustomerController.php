<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('backend.pages.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.customer.create');
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
                'email'         => 'required|email|unique:customers',
                'phone'         => 'required',
                'address'       => 'required',
                'customer_image' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }
            // get form image
            $image = $request->file('customer_image');

            if ($request->hasFile('customer_image')) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = \Str::slug($request->name).'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('customer'))
                {
                    Storage::disk('public')->makeDirectory('customer');
                } 
    //          delete old image
                if (Storage::disk('public')->exists('customer/'.$customer->image))
                {
                    Storage::disk('public')->delete('customer/'.$customer->image);
                }
    //            resize image for customer and upload
                $customer = Image::make($image)->resize(800,800)->save('tmp');
                Storage::disk('public')->put('customer/'.$imageName,$customer);
            }else {
                $imagename = "default.png";
            }

            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->image = $imageName;
            $customer->save();
            
            return redirect()->route('admin.customer.index')->with([
                'message' => 'Successfully Customer Inserted',
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
        $customer = Customer::find($id);
        return view('backend.pages.customer.edit',compact('customer'));
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

            $imageNaame = null;
            // get form image
            $image = $request->file('customer_image');

            if ($request->hasFile('customer_image')) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = \Str::slug($request->customer_name).'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('customer'))
                {
                    Storage::disk('public')->makeDirectory('customer');
                } 
    //            resize image for brand and upload
                $customer = Image::make($image)->resize(800,800)->save('tmp');
                Storage::disk('public')->put('customer/'.$imageName,$customer);
            }else {
                $imagename = "default.png";
            }

            $customer = Customer::find($id);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            if($imageName){
                    $customer->image = $imageName;
                }
            $customer->save();
            
            return redirect()->route('admin.customer.index')->with([
                'message' => 'Successfully Customer Inserted',
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
        Customer::find($id)->delete();
        return redirect()->back();
    }
}
