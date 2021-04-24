<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


// Models
use App\Warehouse;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::latest()->get();
        return view('backend.pages.warehouse.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.warehouse.create');
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
                'name'      => 'required',
                'address'   => 'required',
                'status'    => 'required',
            ]);
            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }
           
            

            $warehouse = new Warehouse();
            $warehouse->name = $request->name;
            $warehouse->address = $request->address;
            $warehouse->status = $request->status;
      
            $warehouse->save();
            
            return Redirect()->route('admin.warehouse.index')->with([
                'message' => 'Successfully Warehouse Inserted',
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
        $warehouse = Warehouse::find($id);
        return view('backend.pages.warehouse.edit',compact('warehouse'));
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
                'name'      => 'required',
                'address'   => 'required',
                'status'    => 'required',
            ]);
            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }
           
            

            $warehouse = Warehouse::find($id);
            $warehouse->name = $request->name;
            $warehouse->address = $request->address;
            $warehouse->status = $request->status;
      
            $warehouse->save();
            
            return Redirect()->route('admin.warehouse.index')->with([
                'message' => 'Successfully Warehouse Inserted',
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
        Warehouse::find($id)->delete();
        return redirect()->back();
    }
}
