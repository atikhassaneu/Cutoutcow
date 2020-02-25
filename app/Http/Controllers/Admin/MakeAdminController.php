<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MakeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('user_role','admin')->get();
        return view('admin.make_admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:128', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'full_name'             => $request->name,
            'email'                 => $request->email,
            'password'              => Hash::make($request->password),
            'user_role'             => 'admin',
            'is_confirmed'          => '1',
            'email_verify_token'    => Hash::make(date('dmYHis'))

        ]);

        if ($user){
            $request->session()->flash('status', 'New Admin created successfully!');
            return redirect()->route('admin.make-admin.index');
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
        $admin =User::find($id);
        return view('admin.make_admin.edit',compact('admin'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:128'],
        ]);

        $admin = User::find($id);
        $admin->full_name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        $request->session()->flash('adminStatus', 'Admin Updated successfully');
        return redirect()->route('admin.make-admin.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $admin  = User::find($id);
        $admin->delete();
        session()->flash('adminStatus','Admin account deleted successfully');
        return redirect()->route('admin.make-admin.index');
    }
}
