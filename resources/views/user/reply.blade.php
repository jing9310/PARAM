@extends('layouts.layout')
@include('layouts.user_header')
<main>
    <div class="container mb-5">
        <div class="col-md-8 offset-md-2 border p-5 bg-light rounded-lg">
            <div class="border">
                <div class="pl-5 pr-5 pt-3">
                    <p class="d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                        作成日時:{{ $content->created_at->format('Y年m月d日') }}
                    </p>
                    <div class="border-top border-bottom">
                        <p class="text-center pt-3">{{ $content->title }}</p>
                    </div>
                    <div class="text-center pt-5 pb-5">{{ $content->body }}</div>
                </div>
            </div>
            <ul class="nav justify-content-end">
                <li class="nav-item d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="35" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" style="color: #808080;">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                    <a class="nav-link" href="{{ route('content.edit', ['id' => $content->id]) }}" style="color: #ea7a41;">編集</a>
                </li>
                <li class="nav-item d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="35" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: #808080;">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    <a class="nav-link" href="{{ route('content.destroy', ['id' => $content->id]) }}" style="color: #ea7a41;" onclick='return confirm("削除しますか？");'>削除</a>
                </li>
            </ul>
            <div class="m-5"></div>
            @if(!is_null($reply_doctors))
            @foreach( $reply_doctors as $reply_doctor )
            <p class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle mr-1" viewBox="0 0 16 16" style="color: #6574cd;">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                From<a href="{{ route('user.doctor_info', ['id' => $reply_doctor->doctor->id]) }}">{{ $reply_doctor->doctor->nickname }}</a>先生
            </p>
            <div class="w-75" style="border: solid 2px #000044;">
                <div class="text-center p-3">{{ $reply_doctor->comment }}</div>
            </div>
            <div class="mb-2"></div>
            <div class="w-75 row justify-content-around">
                <p class="mt-2">作成日時:{{ $reply_doctor->created_at->format('Y年m月d日') }}</p>
                <a class="btn col-3" data-bs-toggle="collapse" href="#reply" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    返信する
                </a>
            </div>
            <!-- 返信 -->
            <div class="collapse" id="reply">
                <div class="mb-3 ml-5 mr-5">
                    <label for="exampleFormControlTextarea1" class="form-label ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle mr-1" viewBox="0 0 16 16" style="color: #6574cd;">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        To{{ $reply_doctor->doctor->nickname }}先生
                    </label>
                    <form action="{{ route('reply.user.post', ['id' =>$reply_doctor->id]) }}" method="POST">
                    @csrf
                    <textarea name="reply_body" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                    <input name="comment_id" type="hidden" value="{{ $reply_doctor->id }}">
                    <input name="content_id" type="hidden" value="{{ $content->id }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary col-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                        </svg>
                        送信する
                    </button>
                </div>
                </form>
            </div>   
            <div class="m-5"></div>
            @endforeach
            @endif
            <div class="m-5"></div>
            <!-- 送信するを押したら追加表示をする -->
            @if(!is_null($reply_users))
            @foreach($reply_users as $reply_user)
            <p class="offset-md-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle mr-1" viewBox="0 0 16 16" style="color: #ea7a41;">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            To{{ $reply_doctor->doctor->nickname }}先生</p>
                <div class="w-75 offset-md-3" style="border: solid 2px #FF570D;">
                    <div class="text-center p-3">{{ $reply_user->reply_body }}</div>
                </div>
                <div class="pb-3"></div>
                <ul class="nav justify-content-around w-75 offset-md-3">
                    <li class="nav-item">作成日時:{{ $reply_user->created_at->format('Y年m月d日') }}</li>
                    <li class="nav-item d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="35" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" style="color: #808080;">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                        <a class="nav-link" href="{{ route('reply.user.edit', ['id' => $reply_user->id]) }}" style="color: #ea7a41;">編集</a>
                    </li>
                    <li class="nav-item d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="35" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: #808080;">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        <a class="nav-link" href="{{ route('reply.user.destroy', ['id' => $reply_user->id]) }}" onclick='return confirm("削除しますか？");' style="color: #ea7a41;">削除</a>
                    </li>
                </ul>
            @endforeach
            @endif
            <div class="mb-3"></div>
            <div class="text-right">
                <a href="{{ route('content.userdetail', ['id' => $content->id]) }}" class="btn btn-outline-secondary col-3">戻る</a>
            </div>
        </div>
    </div>
</main>