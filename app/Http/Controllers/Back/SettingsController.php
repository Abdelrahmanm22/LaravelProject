<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\image;

class SettingsController extends Controller
{
    use image;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user = Auth::user();
        $settings=Setting::first();
        return view('back.setting',compact('user','settings'))->with('title','setting');
    }

    public function update($id){
        $user = Auth::user();
        $settings= Setting::find($id);
        return view('back.updatesetting',compact('user','settings'))->with('title','setting');
    }

    public function postUpdate(Request $req,$id){

        $settings= Setting::find($id);
        $user = Auth::user();
        //get CV 
        if(!empty($req->cv)){
            
            $cv_file_name =$this->saveImage($req->cv,'images/setting');
            $settings->update([
                'CV'=>$cv_file_name,
            ]);
        }

        
        //get avatar
        if(!empty($req->avatar)){
            $avatar_file_name =$this->saveImage($req->avatar,'images/setting');
            $settings->update([
                'avatar'=>$avatar_file_name,
            ]);
        }
        $settings->update([
            'title'=>$req->title,
            'about'=>$req->About,
            'user_id'=>$user->user_id,
        ]);
        return redirect()->back()->with(['success'=>'updated Successfully']);
    }

}
