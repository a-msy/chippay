<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Chip;
use App\Models\Menu;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ChipController extends Controller
{
    //
    public function index(){
        $all = Admin::where('public',1)->take(10)->get();
        $new = Admin::where('public',1)->orderBy('created_at','desc')->take(10)->get();

        $marker = Admin::where('public',1)->get();
        return view('page.index')->with('all',$all)->with('new',$new)->with('marker',$marker);
    }
    public function shopindex()
    {
        $d = Admin::where('public', 1)->get();
        return view('page.shopindex')->with('shops', $d);
    }
    public function shopdetail($id)
    {
        $d = Admin::where('id', $id)->first();
        $m = Menu::where('admin_id', $id)->get();
        return view('page.shop')->with('s', $d)->with('menu',$m);
    }
    //TODO::チップを送って，承認を得たい場合のボタン。お店側で送られたリクエスト一覧を見る機能。バック申請許可を出す機能

    public function chinese(){
        $a = Admin::where('genre',1)->where('public', 1)->get();
        return view('page.shopindex')->with('shops', $a)->with('various','中華の');
    }
    public function japanese(){
        $a = Admin::where('genre',2)->where('public', 1)->get();
        return view('page.shopindex')->with('shops', $a)->with('various','和食の');
    }
    public function italian(){
        $a = Admin::where('genre',3)->where('public', 1)->get();
        return view('page.shopindex')->with('shops', $a)->with('various','イタリアンの');
    }
    public function french(){
        $a = Admin::where('genre',4)->where('public', 1)->get();
        return view('page.shopindex')->with('shops', $a)->with('various','フレンチの');
    }
    public function etc(){
        $a = Admin::where('genre',0)->where('public', 1)->get();
        return view('page.shopindex')->with('shops', $a)->with('various','その他の');
    }
    public function menudetail($id){
        $a = Menu::where('id',$id)->first();
        return view('page.menudetail')->with('menu', $a);
    }
}
