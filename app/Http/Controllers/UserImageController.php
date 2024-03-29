<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;

class UserImageController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view('users.image');
    }
    
    public function store(Request $request)
    {   
        
        
        
        
        $user = \Auth::user();
        $this->validate($request,[
            'user_image' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        
        $originalImg = $request->user_image;
        
        if($originalImg->isValid()){
            
            $path = Storage::disk('s3')->putFile('myprefix',$originalImg,'public');
            
            $user->image = Storage::disk('s3')->url($path);
            
            $user->save();
            
            return redirect("/profile-image")->with('success', '新しいプロフィールを登録しました');
        }
    }
}
