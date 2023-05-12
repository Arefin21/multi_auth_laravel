<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class AdminController extends Controller
{
    public function adminloginForm(){
        return view('backend.admin.admin_login');
    }

    public function adminlogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/admin/dashboard');
        }else{
            Session::flash('error-msg','Invalide Email or Password');
            return redirect()->back();
        }
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect('login/admin');
    }
}
