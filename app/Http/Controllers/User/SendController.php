<?php

namespace App\Http\Controllers\User;

use App\Mail\MailSendtoAdmin;
use App\Mail\MailSendtoUser;
use App\Models\Chip;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendController extends Controller
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

    public function chipsend(Request $request)
    {
        $to = Chip::getadmin($request->adminid)->email;
        $g = Chip::getuser($request->userid);
        $a = Chip::getadmin($request->adminid);

        if($request->value < 0 || $request->value > 9000000000000000000){
            return redirect(route('shop.detail', ['id' => $request->adminid]))->with('error', '不正な値です');
        }
        else if($request->userid != Auth::guard('user')->id()){
            return redirect(route('shop.detail', ['id' => $request->adminid]))->with('error', '不正な値です');
        }

        $d = $c->putsend($request->userid, $request->adminid, $request->comment, $a->back,  $request->kindofpay, $request->value,0);
        Mail::to($to)->send(new MailSendtoAdmin($request,$g,$c->getchip($d),'バック申請が届きました　｜　ちっぷぺい運営局'));
        Mail::to($g->email)->send(new MailSendtoUser($request,$a,$c->getchip($d),'バック申請を送信しました　｜　ちっぷぺい運営局'));
        return redirect(route('shop.detail', ['id' => $request->adminid]))->with('success', '提出しました');
    }
}
