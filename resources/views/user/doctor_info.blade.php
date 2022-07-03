@extends('layouts.layout')
@include('layouts.user_header')
<main>
    <div class="container mt-5 mb-5">
        <div class="col-md-8 offset-md-2 border bg-light rounded-lg">
            <div class="p-5">
                <div class="row justify-content-around">
                    <div class="col-sm-3">
                    <img src="{{ '/storage/doctor/'.$doctor->image }}" class="rounded-circle" style="width: 100%;">
                    </div>
                    <div class="col-sm-6 p-4 text-center">
                        <h3 class="mt-3">{{ $doctor->nickname }}先生</h3>
                    </div>
                </div>
                    <div class="justify-content-end">
                        <div class="p-5">
                            <div class="pr-5 pl-5">
                                <p class="pr-5 pl-5" style="border-bottom: double 6px #353ba4;">誕生日</p>
                                <p class="text-right pr-5 pl-5">{{ $doctor->birthday }}</p>
                            </div>
                            <div class="pr-5 pl-5">
                                <p class="pr-5 pl-5" style="border-bottom: double 6px #353ba4;">性別</p>
                                <p class="text-right pr-5 pl-5">@if( $doctor->gender==1 )
                                    男性
                                @elseif( $doctor->gender==2 )
                                    女性
                                @else
                                    回答なし
                                @endif
                                </p>
                            </div>
                            <div class="pr-5 pl-5">
                                <p class="pr-5 pl-5" style="border-bottom: double 6px #353ba4;">居住地</p>
                                <p class="text-right pr-5 pl-5">{{ $doctor->place->place_name }}</p>
                            </div>
                            <div class="pr-5 pl-5">
                                <p class="pr-5 pl-5" style="border-bottom: double 6px #353ba4;">競技歴</p>
                                <p class="text-right pr-5 pl-5">{{ $doctor->sport->sport_name }}</p>
                            </div>
                            <div class="pr-5 pl-5">
                                <p class="pr-5 pl-5" style="border-bottom: double 6px #353ba4;">専門分野</p>
                                <p class="text-right pr-5 pl-5">{{ $doctor->specialty }}</p>
                            </div>
                            <div class="pr-5 pl-5">
                                <p class="pr-5 pl-5" style="border-bottom: double 6px #353ba4;">医師歴</p>
                                <p class="text-right pr-5 pl-5">{{ $doctor->doctors_history }}年</p>
                            </div>
                            <div class="pr-5 pl-5">
                                <p class="pr-5 pl-5" style="border-bottom: double 6px #353ba4;">自己紹介</p>
                                <p class="text-left pr-5 pl-5">{{ $doctor->self_introduction }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="javascript:history.back();" class="btn btn-outline-secondary col-3">戻る</a>
                        </div>      
                    </div>
            </div>
        </div>
    </div>
</main>