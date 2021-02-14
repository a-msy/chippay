<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'public', 'paypay', 'kyash', 'paypal', 'about', 'updated_at', 'created_at'
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

    public function geo($addr)
    {
        mb_language("Japanese");//文字コードの設定
        mb_internal_encoding("UTF-8");

        $address = $addr;

        if (config('app.debug')) {
            //テスト環境, ローカル環境用の記述
            $myKey = "AIzaSyDQ0dB4UfOFFYkGunwbhhd6osFBe4KGLfQ";
        } else {
            $myKey = "AIzaSyDowEqD0rg7pVi8r4TafZcZ9w7pzbT-MFk";
        }

        $address = urlencode($address);

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "+CA&key=" . $myKey;

        $contents = file_get_contents($url);
        $jsonData = json_decode($contents, true);

        $lat = $jsonData["results"][0]["geometry"]["location"]["lat"];
        $lng = $jsonData["results"][0]["geometry"]["location"]["lng"];

        return array($lat, $lng);
    }

    public function updateUser($data, $id)
    {
//        if($data->pay != NULL){
//            $pay = implode(",",$data->pay);
//        }
//        else{
//            $pay = $data->pay;
//        }
        if($data->addr){
            $g = $this->geo($data->addr);
            $data->lat = $g[0];
            $data->lng = $g[1];
        }
        return DB::table('admins')
            ->where('id', $id)
            ->update(
                [
                    'name' => $data->name,
                    'email' => $data->email,
                    'about' => $data->about,
                    'addr' => $data->addr,
                    'shopname' => $data->shopname,
                    'yasumi' => $data->yasumi,
                    'time' => $data->time,
                    'genre' => $data->genre,
                    'maindish' => $data->maindish,
                    'lat' => $data->lat,
                    'lng' => $data->lng,
                ]);
    }

    public function updatephoto($id, $name)
    {
        return DB::table('admins')
            ->where('id', $id)
            ->update([
                'avatar' => $name,
            ]);
    }

    public function publicUser($id)
    {
        return DB::table('admins')
            ->where('id', $id)
            ->update([
                'public' => 1,
            ]);
    }

    public function depublicUser($id)
    {
        return DB::table('admins')
            ->where('id', $id)
            ->update([
                'public' => 0,
            ]);
    }

    public function getpay($id)
    {
        return DB::table('admins')
            ->where('id', $id)
            ->select('pay')
            ->first();
    }


    //ここらへん，突貫で作ってMVC無視してるので改善の必要ある
}
