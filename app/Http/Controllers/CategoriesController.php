<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  __construct(){
    return $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name' => 'required|min:5|max:20'
        ]);
        $category = new Category;
        $category->name = $request->name ;
        $category->save();
        Session::flash('success', 'Category added Successfully');
        return redirect('/admin/home');

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
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category', $category);
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
        $category = Category::find($id);

        $category->name = $request->name ;
        $category->save();
        Session::flash('success', 'Category Edited');
        return redirect('/admin/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);


        foreach($category->posts as $post){
            $post->delete();
        }
        
$category->delete();
Session::flash('success', 'Category removed');
return redirect('/admin/home');

    }
}
