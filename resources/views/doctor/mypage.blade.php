@extends('layouts.layout')
@include('layouts.header')
<main>
    <div class="m-5">
        <div class="border bg-light rounded-lg container-md w-50">
            <div class="p-3 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                </svg>
                <a href="{{ route('reply.list') }}">返信一覧</a>
            </div>
        </div>
        <div class="m-5"></div>
        <div class="border bg-light rounded-lg container-md w-50">
            <div class="pt-5 pb-3 pr-5">
                <div class="text-right" style="color: #e3342f;">
                    <require style="color: #e3342f;">*</require>は必ず入力してください。
                </div>
            </div>
            <div class="pl-5 pr-5">
                <form action="" method="POST" enctype='multipart/form-data'>
                @csrf
                    <!-- name -->
                    <div class="mb-4">
                        <label for="name" class="form-label">名前<require style="color: #e3342f;">*</require></label>
                        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $doctors->name }}">
                    </div>
                    <!-- kana -->
                    <div class="mb-4">
                        <label for="kana" class="form-label">フリガナ</label>
                        <input name="kana" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $doctors->kana }}">
                    </div>
                    <!-- nickname -->
                    <div class="mb-4">
                        <label for="nickname" class="form-label">ニックネーム</label>
                        <input name="nickname" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $doctors->nickname }}">
                    </div>
                    <!-- birthday -->
                    <div class="mb-4">
                        <label for="birthday" class="form-label">生年月日</label>
                        <input name="birthday" type="date" class="form-control" id="exampleFormControlInput1" value="{{ $doctors->birthday }}">
                    </div>
                    <!-- gender -->
                    <div class="mb-4">
                        <label for="gender" class="form-label">性別</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" {{ $doctors->gender == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="gender">男性</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2" {{ $doctors->gender == 2 ? 'checked' : ''}}>
                            <label class="form-check-label" for="gender">女性</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="3" {{ $doctors->gender == 3 ? 'checked' : ''}}>
                            <label class="form-check-label" for="gender">回答しない</label>
                        </div>
                    </div>
                    <!-- email -->
                    <div class="mb-4">
                        <label for="email" class="form-label">メールアドレス<require style="color: #e3342f;">*</require></label>
                        <input name="email" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $doctors->email }}">
                    </div>
                    <!-- password -->
                    <div class="mb-4">
                        <label for="password" class="form-label">パスワード<require style="color: #e3342f;">*</require></label>
                        <input name="password" type="password" class="form-control" id="exampleFormControlInput1" value="{{ $doctors->password }}">
                    </div>
                    <!-- place -->
                    <div class="mb-4">
                        <label for="place_id" class="form-label">居住地<require style="color: #e3342f;">*</require></label>
                        <br>
                        <select name="place_id" class="form-control" aria-label="Default select example">
                            @foreach($places as $place)
                                @if($place->id == $doctors->place_id)
                                <option value="{{ $place->id }}" selected>{{ $place->place_name }}</option>
                                @else
                                <option value="{{ $place->id }}">{{ $place->place_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <!-- specialty -->
                    <div class="mb-4">
                        <label for="specialty" class="form-label">専門分野<require style="color: #e3342f;">*</require></label>
                        <input name="specialty" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $doctors->specialty }}">
                    </div>
                    <!-- doctors history -->
                    <div class="mb-4">
                        <label for="doctors_history" class="form-label">医師歴<require style="color: #e3342f;">*</require></label>
                        <input name="doctors_history" type="text" class="form-control w-50" id="exampleFormControlInput1" value="{{ $doctors->doctors_history }}">
                    </div>
                    <!-- sports -->
                    <div class="mb-4">
                        <label for="sport_id" class="form-label">競技名</label>
                        <br>
                        <select name="sport_id" class="form-control" aria-label="Default select example">
                            @foreach($sports as $sport)
                                @if($sport->id == $doctors->sport_id)
                                <option value="{{ $sport->id }}" selected>{{ $sport->sport_name }}</option>
                                @else
                                <option value="{{ $sport->id }}">{{ $sport->sport_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <!-- self introduction -->
                    <div class="mb-4">
                        <label for="self_introduction" class="form-label">自己紹介<require style="color: #e3342f;">*</require></label>
                        <textarea name="self_introduction" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $doctors->self_introduction }}</textarea>
                    </div>
                    <!-- image -->
                    <div class="mt-5 mb-4 row">
                        <div class="col-8 col-sm-6">
                            <label for="image" class="form-label">プロフィール画像</label>
                            <input name="image" class="form-control-file" type="file" id="formFile">
                        </div>
                        <div class="col-8 col-sm-6">
                            <img src="{{ '/storage/doctor/'.$doctors->image }}" class="rounded-circle" style="width: 100%;">
                        </div>
                    </div>
                    <div class="row justify-content-around">
                        <a href="javascript:history.back();" class="btn btn-outline-secondary col-5">戻る</a>
                        <button type="submit" class="btn btn-outline-primary col-5">更新する</button>
                    </div>
                </form>
                </div>
                <div class="m-5"></div>
            <div class="text-right m-5">
                <a style="color: #6574cd;" href="{{ route('doctor.quit', ['id'=>$doctors->id]) }}" onclick='return confirm("退会しますか？");'>退会される方はこちら</a>
            </div>
        </div>
    </div>
</main>