@extends('layouts.common')
@include('layouts.admin.header')
@section('content')
    <section>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>メニューの追加</h1>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('admin.shopmenu.store', ['id'=>Auth::guard('admin')->id()]) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{Auth::guard('admin')->id()}}" name="id">
                <div class="form-group">
                    <label for="name">商品名　※必須</label>
                    <input type="text" name="menu" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="value">価格　※必須</label>
                    <input type="text" name="value" class="form-control" placeholder="100(税抜）※先頭に￥がつきます" required>
                </div>
                <div class="form-group">
                    <label for="detail">商品詳細</label>
                    <input type="text" name="detail" class="form-control" placeholder="商品に関する説明">
                </div>
                <label for="avatar">商品画像　※必須</label>
                <div class="form-group">
                    <input type="file" name="avatar">
                </div>
                <div class="form-group text-center mb-5">
                    <button type="submit" class="btn btn-chip">登録する</button>
                </div>
            </form>
        </div>
    </section>
    <section>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>メニューの編集</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($menu as $m)
                    <div class="col-md-6 edit-menu-cell">
                        <form action="{{ route('admin.home.shopmenu.update',['id'=>$m->id]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$m->admin_id}}" name="admin_id">
                            <div class="edit-menu">
                                <img src="{{asset('menu/'.$m->avatar.'?'.now())}}">
                                <input type="file" name="avatar">
                                <div class="form-group">
                                    <label for="name">商品名</label>
                                    <input type="text" name="menu" class="form-control" required
                                           value="{{$m->menu}}">
                                </div>
                                <div class="form-group">
                                    <label for="value">価格</label>
                                    <input type="text" name="value" class="form-control"
                                           placeholder="100(税抜）※先頭に￥がつきます"
                                           required value="{{$m->value}}">
                                </div>
                                <div class="form-group">
                                    <label for="detail">商品詳細</label>
                                    <input type="text" name="detail" class="form-control" placeholder="商品に関する説明" value="{{$m->detail}}">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">更新する</button>
                            </div>
                        </form>
                        <form action="{{route('admin.home.shopmenu.destroy',['id'=>$m->id])}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$m->admin_id}}" name="admin_id">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-danger">削除する</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@include('layouts.footer')
