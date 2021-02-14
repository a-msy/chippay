<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Fav;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavController extends Controller
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

    public function menuLike(Request $request){
        $menu_id = $request['menuId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $menu = Menu::find($menu_id);

        if(!$menu){
            return null;
        }

        $user = Auth::user();
        $like = $user->likes()->where('menu_id',$menu_id)->first();

        if($like){
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                return null;
            }
        }else{
            $like = new Fav();
        }

        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->menu_id = $menu->id;
        $like->admin_id = $menu->admin_id;

        if($update){
            $like->update();
        }
        else{
            $like->save();
        }

        return null;
    }
}
