<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class photoController extends Controller
{
    //
    public function photo(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:5000'
            ]);

        if ($request->hasFile('avatar')) {
            $n = new Admin();
            $a = Auth::guard('admin')->user();
            $avatar = $request->file('avatar');
            $filename = $a->id . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('shop/' . $filename));

            $a->avatar = $filename;
            $n->updatephoto($a->id, $filename);
            return redirect('admin/home')->with('success', '写真を更新しました');
        }
        else{
            return redirect('admin/home')->with('error', '写真を更新できませんでした');
        }
    }
}
