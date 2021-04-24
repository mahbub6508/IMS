<?php

namespace App\Http\Controllers\Backend;

use Validator;
use Carbon\Carbon;
use App\Model\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
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
                'brand_photo'   => 'required|image|mimes:jpeg,png,jpg',

            ]);
            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }
            // get form image
            $image = $request->file('brand_photo');
            if ($request->hasFile('brand_photo')) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = \Str::slug($request->brand_name).'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('brand'))
                {
                    Storage::disk('public')->makeDirectory('brand');
                } 
                $brand = Image::make($image)->resize(800,800)->save('tmp');
                Storage::disk('public')->put('brand/'.$imageName,$brand);
            }else {
                $imagename = "default.png";
            }

            $brand = new Brand();
            $brand->name = $request->brand_name;
            $brand->brand_code = $this->generateBrandCode();
            $brand->image = $imageName;
            $brand->save();
            
            return Redirect()->route('admin.brand.index')->with([
                'message' => 'Successfully brand Inserted',
                'alert-type' => 'success'
            ]);
        }catch (\Exception $e) {
            return $e;
        }
          
       // return redirect()->route('admin.brand.index');

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
        $brand = Brand::find($id);
        return view('backend.pages.brand.edit',compact('brand'));
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
            $image = $request->file('brand_photo');
            if ($request->hasFile('brand_photo')) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = \Str::slug($request->brand_name).'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('brand'))
                {
                    Storage::disk('public')->makeDirectory('brand');
                } 
    //            resize image for brand and upload
                $image_insert = Image::make($image)->resize(800,800)->save('tmp');
                Storage::disk('public')->put('brand/'.$imageName,$image_insert);
            }else {
                $imagename = "default.png";
            }

            $brand = Brand::find($id);
           
            if( $brand ){
                $brand->name = $request->name;
                $brand->brand_code = $request->brand_code;
                if($imageName){
                    $brand->image = $imageName;
                }
                $brand->save();
            }
            
            
            return redirect()->back()->with([
                'message' => 'Successfully brand Inserted',
                'alert-type' => 'success'
            ]);

        }catch (\Exception $e) {
            return $e->getMessage();
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
        Brand::find($id)->delete();
        return back();
    }

    // public function generateBrandCode():string
    // {
    //     // try {
    //     //     $latest_brand = Brand::latest()->first();
    //     //     if ($latest_brand) {
    //     //         $currentBrandCode = $latest_brand->brand_code;

    //     //         $number = preg_replace('/[^0-9]/', '', $currentBrandCode);
    //     //     }else{
    //     //         $number = 100;
    //     //     }

    //     //     return 'BR' . $number++ ;
    //     // } catch (\Exception $e) {
    //     //     throw $e->getMessege();
    //     // }
        
    // }

    public  function generateBrandCode($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
