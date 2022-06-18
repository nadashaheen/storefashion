<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['title' =>'required|max:5|min:3','image_name'=>'required'];
        $masseges=[
            'title.required' =>'title must be entered',
            'title.min' =>'title must  more than 3',
            'title.max' =>'title must less than 5',
            'image_name.required'=>'image must be entered',

        ];

        $validator=Validator::make($request->all(),$rules ,$masseges);
        if ($validator->fails()){

            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $category = new Category();
        $category->title = $request->title;

        $category_image = $request->file('image_name');
        $file_name=$category->title.time().'.'.$category_image->extension();
        $category_image->move('category_image',$file_name);
        $category->image_name=$file_name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category Added Successfully');

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
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {


        $category->title = $request->title;

        if($request->image_name != null) {
            $category_image = $request->file('image_name');
            $file_name=$category->title.time().'.'.$category_image->extension();
            $category_image->move('category_image',$file_name);
            $category->image_name=$file_name;
        }
        $category->save();


        return redirect()->route('category.index')->with('success','Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->clothes()->delete();
        $category->delete();
        return redirect()->route('category.index')->with('success','Category Deleted Successfully');
    }

}
