<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Clothes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clothes = Clothes::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.clothes.index', compact('clothes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.clothes.add', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['title' => 'required',
            'image_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'size' => 'required',
            'active' => 'required',
            'featured' => 'required',
            'category_id' => 'required',
        ];
        $masseges = [
            'title.required' => 'Title must be Entered',
            'image_name.required' => 'Image must be Entered',
            'description.required' => 'Description must be Entered',
            'price.required' => 'Price must be Entered',
            'size.required' => 'Size must be Entered',
            'active.required' => 'Active must be Entered',
            'featured.required' => 'Featured must be Entered',
            'category_id.required' => 'Category Title must be Entered',

        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $clothes = new Clothes();
        $clothes->title = $request->title;
        $clothes->description = $request->description;
        $clothes->price = $request->price;
        $clothes->size = $request->size;
        $clothes->active = $request->active;
        $clothes->featured = $request->featured;
        $clothes->category_id = $request->category_id;

        if ($request->image_name != null) {
            $clothes_image = $request->file('image_name');
            $file_name = $clothes->id . time() . '.' . $clothes_image->extension();
            $clothes_image->move('clothes_image', $file_name);
            $clothes->image_name = $file_name;
        }
        $clothes->save();


        return redirect()->route('clothes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clothes $clothes)
    {
        $categories = Category::all();
        return view('admin.clothes.edit', compact('categories', 'clothes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clothes $clothes)
    {

        $clothes->title = $request->title;
        $clothes->description = $request->description;
        $clothes->price = $request->price;
        $clothes->size = $request->size;
        $clothes->active = $request->active;
        $clothes->featured = $request->featured;
        $clothes->category_id = $request->category_id;

        if ($request->image_name != null) {
            $clothes_image = $request->file('image_name');
            $file_name = $clothes->id . time() . '.' . $clothes_image->extension();
            $clothes_image->move('clothes_image', $file_name);
            $clothes->image_name = $file_name;
        }
        $clothes->save();


        return redirect()->route('clothes.index')->with('success', 'Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clothes $clothes)
    {
        $clothes->delete();
        return redirect()->route('clothes.index')->with('success', 'Clothes Deleted Successfully');
    }
}
