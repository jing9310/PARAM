@extends('layouts.layout')
@include('layouts.header')
<main class="m-5">
    <div class="mr-5">
        <form class="row g-3 justify-content-end" action="{{ route('doctor.search') }}" method="post">
        @csrf
            <div class="col-auto d-flex">
                <input name="keyword" type="text" class="form-control" id="keyword" placeholder="検索する" value="@if (isset( $keyword )) @endif">
                <button type="submit" class="btn btn-outline-primary mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: #6574cd;">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
    <div class="col-md-8 offset-md-2">
        @if(session('update'))
            <div class="alert alert-secondary text-center" role="alert">
                {{ session('update') }}
            </div>
        @elseif(session('complete'))
            <div class="alert alert-primary text-center" role="alert">
                {{ session('complete') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @isset($search_result)
            <h5 class="text-center mb-5">{{ $search_result }}</h5>
        @endisset
    </div>
    @foreach($contents as $content)
    <div class="infinite-scroll">
        <div class="container mb-5">
            <div class="col-md-8 offset-md-2 border bg-light rounded-lg" id="data">
                <div class="card-body">
                    <div class="p-5">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{{ '/storage/user/'.$content->user->image }}" class="rounded-circle" style="width: 100%;">
                            </div>
                            <div class="col-sm-9 p-4">
                                <div class="d-flex">
                                    <p class="mr-5">ニックネーム:{{ $content->user->nickname }}</p>
                                    <p>誕生日:{{ $content->user->birthday }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="mr-3">性別: 
                                        @if($content->user->gender == 1)
                                        男性
                                        @elseif($content->user->gender == 2)
                                        女性
                                        @elseif($content->user->gender == 3)
                                        回答しない
                                        @endif
                                    </p>
                                    <p class="mr-3">居住地:{{ $content->user->place->place_name }}</p>
                                    <p>競技名:{{ $content->user->sport->sport_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top border-bottom">
                        <p class="text-center my-sm-3">{{ $content->title }}</p>
                    </div>
                    <div class="d-flex flex-wrap justify-content-around py-3">
                        <p>{{ $content->created_at->format('Y年m月d日') }}</p>
                        <div class="d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-book mr-1" viewBox="0 0 16 16" style="color: #6574cd;">
                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                            </svg>
                            <a href="{{ route('content.detail', ['id' => $content->id ]) }}" style="color: #6574cd;">詳細</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        <div class="container">
            <div class="offset-md-5">
                {{ $contents->links() }}
            </div>
        </div>
    </div>
</main>