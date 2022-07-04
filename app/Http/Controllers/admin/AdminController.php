<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function login()
//    {
//        $url = url()->previous() ;
//        $uri_segments = explode('/', $url);
//
//        if ($uri_segments[count($uri_segments)-1] == 'admin') {
//            return view('admin.admin.login');
//        }
//
//            return view('frontsite.pre_index');
//
//    }
//
//    public function logout()
//    {
//        if (Auth::guard('webadmin')->check()) {
//            Auth::guard('webadmin')->logout();
//            return redirect()->route('login');
//        }
//
//    }
//
//    public function authenticate(Request $request)
//    {
//        $login_data = ['email' => $request->email, 'password' => $request->password];
//        if (Auth::guard('webadmin')->attempt($login_data)) {
//            return redirect()->route('dashboard');
//        }
//        return redirect()->back()->with('error', 'invalid username or password');
//    }

    public function index()
    {
        $admins = Admin::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'];
        $masseges = [
            'name.required' => 'Name must be Entered',
            'email.required' => 'Email must be Entered',
            'password.required' => 'Password must be Entered',
            'password.min' => 'Password must be more than 8 Digit',
            'email.email' => 'Please,Write Email Correctly (xxx@xxxx) ',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin Added Successfully');
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
    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $rules = ['name' => 'required',
            'email' => 'required|email',
            ];
        $masseges = [
            'name.required' => 'Name must be Entered',
            'email.required' => 'Email must be Entered',
            'email.email' => 'Please,Write Email Correctly (xxx@xxxx) ',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors())->withInput();
        }


        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Edit Successfully');
    }

    public function change($id)
    {

        return view('admin.admin.resetpassword', compact('id'));
    }

    public function do_change(Request $request, $id)
    {
        $admin = Admin::find($id);

        $rules = [
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ];
        $masseges = [
            'password.required' => 'New Password must be Entered',
            'old_password.required' => 'Old Password must be Entered',
            'password.min' => 'Password must be more than 8 Digit',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        if(Hash::check($request->old_password , $admin->password)) {
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()->route('admin.index')->with('success', 'Changed Successfully');

        }else{

            return redirect()->back()->withErrors('Please Cheak old password');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Deleted Successfully');
    }
}
