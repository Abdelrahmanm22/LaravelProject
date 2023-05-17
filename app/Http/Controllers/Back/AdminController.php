<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function index(){
        // echo "dd";die;
        $user = Auth::user();
        // dd($user);die;
        return view('back.index',compact('user'))->with('title','home');
    }
    public function register(){
        return view('back.register');
    }



    public function postRegister(Request $req){
        //validate Request

        // echo "hh";die;
        $validator = Validator::make($req->all(),[
            'username'=>'required|max:100',
            'email'=>'required|unique:users,email',
            'password'=> 'required|min:4',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }


        $password = Hash::make($req['password']);
        // $user = new User();
        User::create([
            'user_name'=>$req->username,
            'email'=>$req->email,
            'password'=>$password,
        ]);
        
        return redirect()->back()->with(['success'=>'registration successfully']);
    }


    public function login(){
        return view('back.login');
    }

    public function postLogin(Request $req){
        $validator = Validator::make($req->all(),[
            'email'=>'required',
            'password'=> 'required',
        ]);
        
        if($validator->fails()){
            
            return redirect()->back()->withErrors($validator);
        }

        $email = $req ->email;
        $pass = $req ->password;

        // echo $email." ".$pass;die;
        
        if(Auth::attempt(['email'=>$email,'password'=>$pass])) {
            // return "yes";
            $req->session()->regenerate();

            return redirect('/admin/home');
        }else{
            // return "ww";
            return redirect()->back()->with(['error'=>'email or password may be not correct']);
        }
    
    }
    public function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }

}
