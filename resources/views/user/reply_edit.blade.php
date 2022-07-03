@extends('layouts.layout')
@include('layouts.user_header')
<main>
    <div class="container">
        <div class="col-md-8 offset-md-2 border bg-light mt-5 mb-5">
            <div class="p-5"> 
                <form action="" method="POST">
                    @csrf
                    <div class="m-5">
                        <label for="reply_body" class="form-label">返信内容</label>
                        <textarea name="reply_body" class="form-control" id="exampleFormControlTextarea1" rows="8">{{ $reply->reply_body }}</textarea>
                    </div>
                    <input name="user_flg" type="hidden" value="2">
                    <input name="user_id" type="hidden" value="{{ $reply->id }}">
                    <input name="content_id" type="hidden" value="{{ $reply->content_id }}">
                    <div class="row justify-content-around">
                        <a href="javascript:history.back();" class="btn btn-outline-secondary col-5">戻る</a>
                        <button type="submit" class="btn btn-outline-primary col-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" style="color: #808080;">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                            編集する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>