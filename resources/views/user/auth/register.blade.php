@extends('layouts.layout')
<header class="navbar navbar-expand-lg navbar-light">
    <div class="container-md pl-5 font-weight-bold">
        <a class="navbar-brand" href="{{ route('top') }}">PARAM</a>
    </div>
</header>
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
                    <form action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- name -->
                        <div class="mb-4">
                            <label for="name" class="form-label">名前<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control" placeholder="" name="name" value="{{ old('name') }}">
                        </div>
                        <!-- kana -->
                        <div class="mb-4">
                            <label for="kana" class="form-label">フリガナ<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control" placeholder="" name="kana" value="{{ old('kana') }}">
                        </div>
                        <!-- nickname -->
                        <div class="mb-4">
                            <label for="nickname" class="form-label">ニックネーム<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control" placeholder="" name="nickname" value="{{ old('kana') }}">
                        </div>
                        <!-- birthday -->
                        <div class="mb-4">
                            <label for="birthday" class="form-label">生年月日<require style="color: #e3342f;">*</require></label>
                            <input type="date" class="form-control" placeholder="" name="birthday" value="{{ old('kana') }}">
                        </div>
                        <!-- gender -->
                        <div class="mb-4">
                            <label for="gender" class="form-label">性別<require style="color: #e3342f;">*</require></label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="1">
                                <label class="form-check-label" for="gender">男性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="2">
                                <label class="form-check-label" for="gender">女性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="3">
                                <label class="form-check-label" for="gender">回答しない</label>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">メールアドレス<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control" placeholder="" name="email" value="{{ old('email') }}">
                        </div>
                        <!-- password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">パスワード<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control" placeholder="" name="password" value="{{ old('password') }}">
                        </div>
                        <!-- place -->
                        <div class="mb-4">
                            <label for="place_id" class="form-label">居住地<require style="color: #e3342f;">*</require></label>
                            <br>
                            <select class="form-control" aria-label="Default select example" name="place_id">
                                <option selected value="{{ old('place_id') }}">---</option>
                                @foreach($places as $place)
                                <option value="{{ $place->id }}">{{ $place->place_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- height -->
                        <div class="mb-4">
                            <label for="height" class="form-label">身長<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control w-25" placeholder="cm" name="height" value="{{ old('height') }}">
                        </div>
                        <!-- weight -->
                        <div class="mb-4">
                            <label for="weight" class="form-label">体重<require style="color: #e3342f;">*</require></label>
                            <input type="text" class="form-control w-25" placeholder="kg" name="weight" value="{{ old('weight') }}">
                        </div>
                        <!-- sport -->
                        <div class="mb-4">
                            <label for="sport_id" class="form-label">競技名<require style="color: #e3342f;">*</require></label>
                            <br>
                            <select class="form-control" aria-label="Default select example" name="sport_id">
                                <option selected value="{{ old('sport_id') }}">スポーツ一覧</option>
                                @foreach($sports as $sport)
                                <option value="{{ $sport->id }}">{{ $sport->sport_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- active -->
                        <div class="mb-4">
                            <label for="active" class="form-label">活動<require style="color: #e3342f;">*</require></label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active" value="1">
                                <label class="form-check-label" for="active">現役</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active" value="2">
                                <label class="form-check-label" for="active">引退</label>
                            </div>
                        </div>
                        <!-- image -->
                        <div class="mb-4">
                            <label for="image" class="form-label">プロフィール画像</label>
                            <input name="image" class="form-control" type="file" id="formFile" accept="">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn" style="color: #ea7a41;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" style="color: #ea7a41;">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                </svg>
                                SignUp
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>