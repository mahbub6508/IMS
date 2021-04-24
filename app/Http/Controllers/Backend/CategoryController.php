<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Auth;

class CategoryController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('category.edit')) {
        abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }
        $categories = Category::latest()->get();
        return view('backend.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('category.create')) {
        abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('category.create')) {
        abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }
        try {
            $this->validate($request,[
                'name' => 'required|unique:categories',
            ]);

            $category = new Category();
            $category->name = $request->name;
            $category->save();

            return redirect()->route('admin.category.index');

        } catch (\Throwable $th) {
           return abort(404);
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
        if (is_null($this->user) || !$this->user->can('category.edit')) {
        abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }
        $category = Category::find($id);
        return view('backend.pages.category.edit',compact('category'));
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
        if (is_null($this->user) || !$this->user->can('category.edit')) {
        abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }
        try {
            $this->validate($request,[
                'name' => 'required|unique:categories',
            ]);

            $category = Category::find($id);
            $category->name = $request->name;
            $category->save();
            //dd($category);
            return redirect()->route('admin.category.index');
        } catch (\Throwable $th) {
           return abort(404,'Sorry !! Page not Found!');
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
        if (is_null($this->user) || !$this->user->can('category.delete')) {
        abort(403, 'Sorry !! You are Unauthorized to delete any category !');
        }
        Category::find($id)->delete();
        return back();
    }
}
