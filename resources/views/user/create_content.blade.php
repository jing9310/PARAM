@extends('layouts.layout')
@include('layouts.user_header')
<main>
    <div class="container mb-5">
        <div class="col-md-8 offset-md-2">
            <div class="p-5">
                <form action="" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">件名</label>
                        @if($errors->has('title'))
                            <div class="row ml-3" style="color: red;" role="alert">
			                    {{ $errors->first('title') }}<br>
                            </div>
		                @endif        
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="件名の入力欄" value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">本文</label>
                        @if($errors->has('body'))
                            <div class="row ml-3" style="color: red;" role="alert">
			                    {{ $errors->first('body') }}<br>
                            </div>
		                @endif
                        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="内容の入力" value="{{ old('body') }}"></textarea>
                    </div>
                    <input name="del_flg" type="hidden" value=1>
                    <div class="mb-5"></div>
                    <div class="row justify-content-around">
                        <a href="{{ route('user.home.index') }}" class="btn btn-outline-secondary col-5">戻る</a>
                        <button type="submit" class="btn btn-outline-primary col-5">投稿する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>