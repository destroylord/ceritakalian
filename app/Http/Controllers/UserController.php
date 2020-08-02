<?php

namespace App\Http\Controllers;


use App\User;
use Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        //
        return view('auth.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        //
        $user = User::find(Auth::user()->id);

        // dd($user);
        if ($user) {
            $user->name = $request->name;
            $user->save();

            return back()->with('success','Profil Berhasil diubah');
        }
    }
    public function changePasswordForm()
    {
        return view('auth.passwords.change-password');
    }
    public function changePassword(Request $request)
    {

        $this->validate($request,[
            'current_password' => 'required',
            'new_password'   => 'required|min:6|confirmated'
        ]);

        $old_password_from_db = Auth::user()->password;
        $user_id = Auth::user()->id;
        
        if (Hash::check($request->input('old_password'), $old_password_from_db)) {
            
            $user = User::find($user_id);

            $user->password = Hash::make($request->input('new_password'));

            if ($user->save()) {
                return back()->with('success', 'Password berhasil di ganti');    
            }else{
                return back()->with('danger', 'Password lama invalid');
            }

        }else{
            return back()->with('danger', 'Password lama invalid');
        }
    }

}
