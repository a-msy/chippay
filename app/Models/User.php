<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    protected $with = ['admin'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function publicindex()
    {
        return DB::table('admins')->where('public', 1)->get();
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function likes(){
        return $this->hasMany('App\Models\Fav');
    }

    public function updateUser($data, $id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->update(
                [
                    'name' => $data->name,
                    'email' => $data->email,
                    'addr' => $data->addr,
                ]);
    }

    public function updatepoint($point, $id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->update(
                [
                    'point' => $point,
                    'updated_at' => now(),
                ]);
    }
}
