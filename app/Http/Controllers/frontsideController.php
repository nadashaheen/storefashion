<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clothes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontsideController extends Controller
{
    public function showhome()
    {
        $last_clothes = DB::table('clothes')->orderByDesc('created_at')->limit(4)->get();
        $last_categories = DB::table('categories')->orderByDesc('created_at')->limit(3)->get();

        $categories = Category::all();
        $clothes = Clothes::all();
        $user = User::all();

        return view('frontsite.index', compact('categories', 'user', 'clothes', 'last_categories', 'last_clothes'));


    }

    public function showclothes()
    {
        $clothes = Clothes::all();
        return view('frontsite.clothes', compact('clothes'));

    }

    public function showcatedory()
    {
        $categories = Category::all();
        return view('frontsite.categories', compact('categories'));

    }

    public function showcatclothes($id)
    {
        $cat = Category::find($id);
        $clothes = $cat->clothes;
        return view('frontsite.category_clothes', compact('clothes', 'cat'));

    }

    public function showdetail($id)
    {
        $clothes = Clothes::find($id);
        return view('frontsite.product_detail', compact('clothes'));

    }

    public function showabout()
    {
        return view('frontsite.about');

    }

    public function showcontact()
    {

        return view('frontsite.contact');

    }

    public function search(Request $request)
    {
        $clothes = DB::table('clothes')->where('title','like','%'.$request->search.'%')->orWhere('description','like','%'. $request->search.'%')->get();
        return view('frontsite.search_product',compact('request','clothes'));

    }



    public function pre_index()
    {

        return view('frontsite.pre_index');

    }


}
