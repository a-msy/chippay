<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Chip extends Model
{
    //
    public $timestamps = true;
    protected $table = 'chips';

    protected $fillable = [
        'user_id', 'updated_at', 'created_at', 'admin_id', 'comment', 'value', 'kind_of_pay', 'kind_of_back', 'done','kansya'
    ];

    public function chipuser()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id', 'chips')->first();
    }

    public function chipshop($id)
    {
        return Chip::where('admin_id',$id)->with('admin')->get();
    }
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function putsend($userid, $adminid, $comment, $kind_of_back, $kind_of_pay, $value, $done)
    {
        if ($done == NULL) {
            $done = 0;
        }
        DB::table('chips')
            ->insert([
                'user_id' => $userid, 'admin_id' => $adminid, 'comment' => $comment, 'value' => $value,
                'done' => $done, 'created_at' => now(), 'kind_of_back' => $kind_of_back, 'kind_of_pay' => $kind_of_pay,
                'updated_at' => now()
            ]);
        return $id = DB::getPdo()->lastInsertId();
    }

    public function done($id,$kansya)
    {
        return DB::table('chips')
            ->where('id', $id)
            ->update(['done' => 1, 'updated_at' => now(),'kansya'=>$kansya]);
    }

    public function getadmin($id)
    {
        return DB::table('admins')->where(['id' => $id])->first();
    }

    public function getuser($id)
    {
        return DB::table('users')->where(['id' => $id])->first();
    }

    public function getchip($id)
    {
        return DB::table('chips')->where(['id' => $id])->first();
    }

    public function updatepointad($point, $id)
    {
        return DB::table('admins')
            ->where('id', $id)
            ->update(
                [
                    'point' => $point,
                    'updated_at' => now(),
                ]);
    }
}
