<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Chip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $getchipdata = Chip::where('user_id',Auth::guard('user')->id())->with('admin')->get();
        return view('user.home',['user'=>$user,'data'=>$getchipdata]);
    }

    public function update(Request $request, $id){
        if(Auth::guard('user')->id() != $id){
            return abort(401);
        }
        $a = new User();
        $a->updateUser($request,$id);
        $user = Auth::user();
        return redirect('user/home')->with('user',$user)->with('success','プロフィールを更新しました');
    }
}
