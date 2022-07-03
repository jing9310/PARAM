@extends('layouts.layout')
@include('layouts.header')
<main>
    <div class="container mt-5 mb-5">
        @if(session('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-8 offset-md-2 border bg-light rounded-lg">
            <div class="p-5">
                <div class="row justify-content-around mb-5">
                    <div class="col-sm-3">
                        <img src="{{ '/storage/user/'.$content->user->image }}" class="rounded-circle" style="width: 100%;">
                    </div>
                    <div class="col-sm-6 p-4 text-center">
                        <h3>ニックネーム:{{ $content->user->nickname }}</h3>
                        <p>誕生日 {{ $content->user->birthday }}</p>
                    </div>
                </div>
                <div>
                    <div class="row justify-content-around">
                        <p class="text-left label">性別:
                            @if($content->user->gender == 1)
                                男性
                            @elseif($content->user->gender == 2)
                                女性
                            @elseif($content->user->gender == 3)
                                回答しない
                            @endif
                        </p>
                        <p class="text-left label">居住地:{{ $content->user->place->place_name }}</p>
                    </div>
                    <div class="row justify-content-around">
                        <p class="text-left label">{{ $content->user->height }}ｃｍ</p>
                        <p class="text-left label">{{ $content->user->weight }}ｋｇ</p>
                    </div>
                    <div class="row justify-content-around">
                        <p class="text-left label">競技名:{{ $content->user->sport->sport_name }}</p>
                        <p class="text-left label">
                            @if($content->user->active == 1)
                                現役
                            @elseif($content->user->active == 2)
                                引退
                            @endif
                        </p>
                    </div>
                </div>
                <div class="pb-5"></div>
                <div class="border rounded-lg">
                    <div class="pl-5 pr-5 pt-3">
                        <div class="border-top border-bottom">
                            <p class="text-center pt-3">{{ $content->title }}</p>
                        </div>
                        <div class="text-center pt-5 pb-5">{{ $content->body }}</div>
                    </div>
                </div>
                <div class="pb-3"></div>
                <!-- すでに返信があったら表示する -->
                @if(!is_null($doctor_replys))
                @foreach( $doctor_replys as $doctor_reply )
                    <div class="w-75 rounded-lg" style="border: solid 2px #000044;">
                        <div class="text-center p-3">{{ $doctor_reply->comment }}</div>
                    </div>
                    <div class="pb-3"></div>
                    <div class="w-75 row justify-content-around">
                        <div>{{ $doctor_reply->created_at->format('Y年m月d日') }}</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" style="color: #808080;">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                            <a href="{{ route('reply.edit', ['id' => $doctor_reply->id]) }}">編集</a>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: #808080;">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            <a href="{{ route('reply.destroy', ['id' => $doctor_reply->id]) }}" onclick='return confirm("削除しますか？");'>削除</a>
                        </div>
                    </div>
                <div class="p-3"></div>
                @endforeach
                @endif
                <!-- 医師宛ての返信 -->
                @if(!is_null($player_replys))
                @foreach( $player_replys as $player_reply )
                    <div class="w-75 offset-md-3 rounded-lg" style="border: solid 2px #FF570D;">
                        <div class="text-center p-3">{{ $player_reply->reply_body }}</div>
                    </div>
                    <div class="w-75 offset-md-3">{{ $player_reply->created_at->format('Y年m月d日') }}</div>
                    <div class="pb-3"></div>
                @endforeach
                @endif
            </div>
            <!-- 返信 -->
            <div class="mb-3 ml-5 mr-5">
                <form action="{{ route('reply.create') }}" method="POST">
                @csrf
                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    <input name="content_id" type="hidden" value="{{ $content->id }}">
                    <input name="doctor_id" type="hidden" value="{{ Auth::user()->id }}">
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-secondary col-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                        </svg>
                        返信する
                        </button>
                    </div>
                </form>
            </div>      
            <div class="pb-3"></div>
            <div class="text-right m-5">
                <a href="javascript:history.back();" class="btn btn-outline-secondary col-3">戻る</a>
            </div>
        </div>
    </div>
</main>