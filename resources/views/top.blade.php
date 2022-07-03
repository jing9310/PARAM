@extends('layouts.layout')
@section('top')
<main>
    <div class="container">
        <div class="m-5"></div>
        <div class="col-md-8 offset-md-2">
            <div class="p-5">
                <div class="p-3">
                    <h1 class="text-center">PARAM</h1>
                </div>
                    <div class="mt-5 p-3">
                    <div class="card-body">
                        @if(session('logout'))
                            <div class="alert alert-primary text-center" role="alert">
                                {{ session('logout') }}
                            </div>
                        @elseif(session('success'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-around">
                            <div class="pl-4">
                            <button class="btn-dark-blue btn-rounded pt-1 pb-1 pl-5 pr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #ffffff;">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                <a href="{{ route('doctor.login') }}" style="color: #fff;">医師の方はこちら</a>
                            </button>
                            </div>
                            <div class="">
                            <button class="btn-orange-moon btn-rounded pt-1 pb-1 pl-5 pr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #ffffff;">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                <a href="{{ route('user.login') }}" style="color: #fff;">アスリート方はこちら</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection