<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * プロフィール登録フォームの表示
     *
     * @return Response
     */
    
    public function index()
    {
        $is_image = false;
        
        if(Storage::disk('local')->exists('public/profile_images/' .\Auth::user()->id . '.jpeg')){
            $is_image = true;
        }
        
        return view('profile.index', ['is_image' => $is_image]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'photo' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $request->photo->storeAs('public/profile_images',\Auth::user()->id .'.jpeg');
        
        return redirect('profile')->with('success', '新しいプロフィールを登録しました');
    }
}
