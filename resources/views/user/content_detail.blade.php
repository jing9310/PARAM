@extends('layouts.layout')
@include('layouts.user_header')
<main>
    <div class="container mb-5">
        @if(session('success'))
            <div class="alert alert-success text-center col-md-8 offset-md-2 mt-5" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-8 offset-md-2 border bg-light rounded-lg">
            <div class="p-5">
                <div class="p-3 border rounded-lg">
                    <div class="border-top border-bottom">
                        <p class="text-center my-sm-3">{{ $content->title }}</p>
                    </div>
                    <div class="d-flex flex-wrap justify-content-around p-3">
                        <p>{{ $content->body }}</p>
                    </div>
                </div>
                <ul class="nav justify-content-around">
                    <li class="nav-item d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="35" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16" style="color: #ea7a41;">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                        <p class="mt-2 mr-5">更新日時:{{ $content->created_at->format('Y年m月d日') }}</p>
                    </li>
                    <li class="nav-item d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="35" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" style="color: #ea7a41;">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                        <a class="nav-link" href="{{ route('content.edit', ['id' => $content->id]) }}" style="color: #ea7a41;">編集</a>
                    </li>
                    <li class="nav-item d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="35" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: #ea7a41;">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        <a class="nav-link" href="{{ route('content.destroy', ['id' => $content->id]) }}" style="color: #ea7a41;" onclick='return confirm("削除しますか？");'>削除</a>
                    </li>
                </ul>
                <div class="mt-5"></div>
                <div class="border rounded-lg">
                    <div class="p-3 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16" style="color: #ea7a41;">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                        </svg>
                        <a href="{{ route('reply.user.list', ['id' => $content->id]) }}" style="color: #ea7a41;">返信一覧</a>
                    </div>
                </div>
                <div class="mt-3"></div>
                <div class="text-right">
                @if($content->del_flg === 1)
                    <form action="{{ route('content.delflg', ['id' => $content->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name='del_flg' value=2>
                        <button type="submit" class='btn' style="color: #ea7a41;">返信を締め切る</button>
                    </form>
                @elseif($content->del_flg === 2)
                    <form action="{{ route('content.delflg', ['id' => $content->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name='del_flg' value=1>
                        <button type="submit" class='btn' style="color: #ea7a41;">再開する</button>
                    </form>
                @endif
                </div>
                </form>
                <div class="mt-5"></div>
                <div class="text-right">
                    <a href="{{ route('user.home.index') }}" class="btn btn-outline-secondary col-3">戻る</a>
                </div>
            </div>
        </div>
    </div>
</main>