@extends('layouts.layout')
@include('layouts.user_header')
<main>
    <div class="m-5">
        <div class="border bg-light rounded-lg container-md w-50">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="text-right m-5" style="color: #e3342f;">
                <require style="color: #e3342f;">*</require>は必ず入力してください。
            </div>
            <div class="pl-5 pr-5">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- name -->
                        <div class="mb-4">
                            <label for="name" class="form-label">名前<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control" value="{{ $users->name }}" name="name">
                        </div>
                        <!-- kana -->
                        <div class="mb-4">
                            <label for="kana" class="form-label">フリガナ<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control" value="{{ $users->kana }}" name="kana">
                        </div>
                        <!-- nickname -->
                        <div class="mb-4">
                            <label for="nickname" class="form-label">ニックネーム<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control" value="{{ $users->nickname }}" name="nickname">
                        </div>
                        <!-- birthday -->
                        <div class="mb-4">
                            <label for="birthday" class="form-label">生年月日<require style="color: #e3342f;">*</require></label>
                            <input type="date" class="form-control" value="{{ $users->birthday }}" name="birthday">
                        </div>
                        <!-- gender -->
                        <div class="mb-4">
                            <label for="gender" class="form-label">性別<require style="color: #e3342f;">*</require></label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="1" {{ $users->gender == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="gender">男性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="2" {{ $users->gender == 2 ? 'checked' : ''}}>
                                <label class="form-check-label" for="gender">女性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="3" {{ $users->gender == 3 ? 'checked' : ''}}>
                                <label class="form-check-label" for="gender">回答しない</label>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">メールアドレス<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control" value="{{ $users->email }}" name="email">
                        </div>
                        <!-- password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">パスワード<require style="color: #e3342f;">*</require></label>
                            <input type="password" class="form-control" value="{{ $users->password }}" name="password">
                        </div>
                        <!-- place -->
                        <div class="mb-4">
                            <label for="place_id" class="form-label">居住地<require style="color: #e3342f;">*</require></label>
                            <br>
                            <select class="form-control" aria-label="Default select example" name="place_id">
                                @foreach($places as $place)
                                    @if($place->id == $users->place_id)
                                    <option value="{{ $place->id }}" selected>{{ $place->place_name }}</option>
                                    @else
                                    <option value="{{ $place->id }}">{{ $place->place_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <!-- height -->
                        <div class="mb-4">
                            <label for="height" class="form-label">身長<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control w-25" placeholder="cm" name="height" value="{{ $users->height }}">
                        </div>
                        <!-- weight -->
                        <div class="mb-4">
                            <label for="weight" class="form-label">体重<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control w-25" placeholder="kg" name="weight" value="{{ $users->weight }}">
                        </div>
                        <!-- sport -->
                        <div class="mb-4">
                            <label for="sport_id" class="form-label">競技名<require style="color: #e3342f;">*</require></label>
                            <br>
                            <select class="form-control" aria-label="Default select example" name="sport_id">
                                @foreach($sports as $sport)
                                    @if($sport->id == $users->sport_id)
                                    <option value="{{ $sport->id }}" selected>{{ $sport->sport_name }}</option>
                                    @else
                                    <option value="{{ $sport->id }}">{{ $sport->sport_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <!-- active -->
                        <div class="mb-4">
                            <label for="active" class="form-label">現在<require style="color: #e3342f;">*</require></label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active" value="1" {{ $users->active == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="active">現役</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active" value="2" {{ $users->active == 2 ? 'checked' : ''}}>
                                <label class="form-check-label" for="active">引退</label>
                            </div>
                        </div>
                        <!-- image -->
                        <div class="mb-4 row mt-5">
                            <div class="col-8 col-sm-6">
                                <label for="image" class="form-label">プロフィール画像</label>
                                <input name="image" class="form-control" type="file" id="formFile">
                            </div>
                            <div class="col-8 col-sm-6">
                                <img src="{{ '/storage/user/'.$users->image }}" class="rounded-circle" style="width: 100%;">
                            </div>
                        </div>
                        <div class="row justify-content-around">
                            <a href="{{ route('user.home.index') }}" class="btn btn-outline-secondary col-5">戻る</a>
                            <button type="submit" class="btn btn-outline-primary col-5">更新する</button>
                        </div>
                    </form>
                </div>
                <div class="text-right mb-5">
                    <a style="color: #ea7a41;" href="{{ route('user.quit', ['id'=>$users->id]) }}" onclick='return confirm("退会しますか？");'>退会される方はこちら</a>
                </div>
            </div>
        </div>
    </div>
</main>