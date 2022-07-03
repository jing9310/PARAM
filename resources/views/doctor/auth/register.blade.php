@extends('layouts.layout')
<header class="navbar navbar-expand-lg navbar-light pt-5">
    <div class="container-md">
        <a class="navbar-brand pl-5 font-weight-bold" href="{{ route('top') }}">PARAM</a>
    </div>
</header>
<main>
    <div class="m-5">
        <div class="border bg-light rounded-lg container-md w-50">
            <div class="text-right m-5" style="color: #e3342f;">
                <require style="color: #e3342f;">*</require>は必ず入力してください。
            </div>
            <div class="pl-5 pr-5">
                <div class="card-body">
                    <form action="{{ route('doctor.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- name -->
                        <div class="mb-4">
                            <label for="name" class="form-label">名前<require style="color: #e3342f;">*</require></label>
                            <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <!-- kana -->
                        <div class="mb-4">
                            <label for="kana" class="form-label">フリガナ</label>
                            <input name="kana" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <!-- nickname -->
                        <div class="mb-4">
                            <label for="nickname" class="form-label">ニックネーム</label>
                            <input name="nickname" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <!-- birthday -->
                        <div class="mb-4">
                            <label for="birthday" class="form-label">生年月日</label>
                            <input name="birthday" type="date" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <!-- gender -->
                        <div class="mb-4">
                            <label for="gender" class="form-label">性別</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="gender">男性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="gender">女性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="3">
                                <label class="form-check-label" for="gender">回答しない</label>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">メールアドレス<require style="color: #e3342f;">*</require></label>
                            <input name="email" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <!-- password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">パスワード<require style="color: #e3342f;">*</require></label>
                            <input name="password" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <!-- place -->
                        <div class="mb-4">
                            <label for="place_id" class="form-label">居住地<require style="color: #e3342f;">*</require></label>
                            <br>
                            <select name="place_id" class="form-control" aria-label="Default select example">
                                <option selected>-----</option>
                                @foreach($places as $place)
                                <option value="{{ $place->id }}">{{ $place->place_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- specialty -->
                        <div class="mb-4">
                            <label for="specialty" class="form-label">専門分野<require style="color: #e3342f;">*</require></label>
                            <input name="specialty" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <!-- doctors history -->
                        <div class="mb-4">
                            <label for="doctors_history" class="form-label">医師歴<require style="color: #e3342f;">*</require></label>
                            <input name="doctors_history" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <!-- sport -->
                        <div class="mb-4">
                            <label for="sport_id" class="form-label">競技名</label>
                            <br>
                            <select name="sport_id" class="form-control" aria-label="Default select example">
                                <option selected>------</option>
                                @foreach($sports as $sport)
                                <option value="{{ $sport->id }}">{{ $sport->sport_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- self introduction -->
                        <div class="mb-4">
                            <label for="self_introduction" class="form-label">自己紹介<require style="color: #e3342f;">*</require></label>
                            <textarea name="self_introduction" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                        <!-- image -->
                        <div class="mb-4">
                            <label for="image" class="form-label">プロフィール画像</label>
                            <input name="image" class="form-control" type="file" id="formFile" accept="">
                        </div>
                        <div class="text-right mb-5">
                            <button type="submit" class="btn btn-outline-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" style="color: #6574cd;">
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