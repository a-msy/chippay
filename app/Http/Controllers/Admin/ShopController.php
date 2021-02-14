<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $s = new Shop();
        $d = $s->menuindex(Auth::guard('admin')->id());

        return view('admin.menu')->with('menu', $d);
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
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //menuの追加
        if (Auth::guard('admin')->id() != $request->id) {
            return abort(401);
        } else {
            $request->validate([
                'avatar' => 'nullable|image|max:5000'
            ]);

            $s = new Shop();
            $a = Auth::guard('admin')->user();
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(null, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('menu/' . $filename));
            }
            else{
                $filename = "default.jpg";
            }
            $s->storemenu($request, $request->id, $filename);
            return redirect('admin/shopmenu')->with('success', 'メニューを追加しました');
        }
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
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->id() != $request->admin_id) {
            return abort(401);
        }

        //menuの編集
        $request->validate([
            'avatar' => 'nullable|image|max:5000'
        ]);

        $s = new Shop();
        $a = Auth::guard('admin')->user();
        $filename = $s->getmenuavatar($id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('menu/' . $filename));
        }

        $s->updatemenu($request, $id, $a->id, $filename);
        return redirect('admin/shopmenu')->with('success', 'メニューを更新しました');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if (Auth::guard('admin')->id() != $request->admin_id) {
            return abort(401);
        }
        $s = new Shop();
        $filename = $s->getmenuavatar($id);
        File::delete(public_path('menu/' . $filename));
        $s->destroymenu($id);
        return redirect('admin/shopmenu')->with('success', 'メニューを削除しました');
    }
}
