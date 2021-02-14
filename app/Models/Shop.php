<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    //

    public function publicindex()
    {
        return DB::table('admins')->where('public', 1)->get();
    }

    public function menuindex($admin_id)
    {
        return DB::table('menus')->where('admin_id', $admin_id)->get();
    }

    public function storemenu($data, $adminid, $filename)
    {
        return DB::table('menus')->insert([
            'menu' => $data->menu,
            'value' => $data->value,
            'avatar' => $filename,
            'admin_id' => $adminid,
            'detail' => $data->detail
        ]);
    }

    public function updatemenu($data, $id, $adminid, $filename)
    {
        return DB::table('menus')->where('id', $id)
            ->update([
                'menu' => $data->menu,
                'value' => $data->value,
                'avatar' => $filename,
                'admin_id' => $adminid,
                'detail' => $data->detail
            ]);
    }

    public function getmenuavatar($id)
    {
        return DB::table('menus')->where('id', $id)->value('avatar');
    }

    public function destroymenu($id)
    {
        return DB::table('menus')->where('id', $id)->delete();
    }

    public function getmenu($id)
    {
        return DB::table('menus')->where('id', $id)->get();
    }
}
