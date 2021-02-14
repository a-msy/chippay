<?php

namespace App\Http\Controllers\Admin;

use App\Mail\MailSendDoneUser;
use App\Models\Chip;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use League\CommonMark\Inline\Element\Image;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $a = new Admin();
        $admin = Auth::guard('admin')->user();
        $pay = $a->getpay($admin->id)->pay;
        if ($pay != NULL) {
            $p = explode(",", $pay);
        } else {
            $p = [];
        }

        $list = ['現金', 'VISA', 'MASTER', 'JCB', 'PayPay', 'd払い', 'メルペイ', 'au PAY', '楽天PAY', 'ゆうちょPay'];

        foreach ($list as $key => $value) {
            if (in_array($value, $p)) {
                $checked[$key] = "checked";
            } else {
                $checked[$key] = "";
            }
        }
        $getchipdata = Chip::where('admin_id', Auth::guard('admin')->id())->with('user')->get();
        return view('admin.home', ['admin' => $admin, 'getchipdata' => $getchipdata, 'list' => $list, 'checked' => $checked]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        if ($id != Auth::id()) {
            return abort('401');
        }
        //
        $a = new Admin();
        $a->updateUser($request, $id);
        $admin = Auth::user();
        return redirect('admin/home')->with('admin', $admin)->with('success', 'プロフィールを更新しました');
    }

    public function change($id)
    {
        if ($id != Auth::id()) {
            return abort('401');
        }
        $a = new Admin();
        $a->publicUser($id);
        $admin = Auth::user();
        return redirect('admin/home')->with('admin', $admin)->with('success', '公開状態にしました');
    }

    public function dechange($id)
    {
        if ($id != Auth::id()) {
            return abort('401');
        }
        $a = new Admin();

        $a->depublicUser($id);
        $admin = Auth::user();
        return redirect('admin/home')->with('admin', $admin)->with('success', '非公開にしました');
    }

    public function done(Request $request, $id)
    {
        $c = new Chip();
        $d = $c->getchip($id);
        $u = $c->getuser($d->user_id);
        $a = $c->getadmin($d->admin_id);

        if (Auth::guard('admin')->id() != $d->admin_id) {
            return redirect('admin/home')->with('error', '不正な値です．');
        }
        if ($d->done != 0) {
            return redirect('admin/home')->with('error', '送信済みです．');
        }
        Mail::to($u->email)->send(new MailSendDoneUser($request, $a, $d, 'バック申請が受諾されました　｜　ちっぷぺい運営局'));
        $c->done($id, $request->kansya);
        return redirect('admin/home')->with('success', '通知しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
