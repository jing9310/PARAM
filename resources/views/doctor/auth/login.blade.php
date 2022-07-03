@extends('layouts.layout')
<header class="navbar navbar-expand-lg navbar-light">
    <div class="container-md">
        <a class="navbar-brand pl-5 font-weight-bold" href="{{ route('top') }}">PARAM</a>
    </div>
</header>
@section('content')
<main>
<h1 class="card-body text-center">Doctor's LogIn</h1>
  <div class="container-md card-body">
    <div class="card-body pl-5 pr-5">
      <div class="card-body pl-5 pr-5">
          <div class="card-body pl-5 pr-5">
            <form action="{{ route('doctor.login') }}" method="POST">
              @csrf
              <div class="form-group pl-5 pr-5">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
              <div class="form-group pl-5 pr-5">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
            <div class="text-right pl-5 pr-5">
              <button type="submit" class="btn btn-dark-blue btn-rounded" style="color: #fff;">
                LogIn
              </button>
            </form>
          </div>
        </div>
          <div class="row justify-content-around">
            <div class="d-flex">
              <button class="btn-light-moon btn-rounded pt-1 pb-1 pl-5 pr-5">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="color: #6574cd;">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
              </svg>
              <a href="{{ route('doctor.register') }}" style="color: #fff;">新規登録</a>
              </button>
            </div>
            <div class="d-flex">
            <button class="btn-light-moon btn-rounded pt-1 pb-1 pl-5 pr-5">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16" style="color: #6574cd;">
                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
              </svg>
              <a href="{{ route('doctor.password.request') }}" style="color: #fff;">パスワードの変更はこちらから</a>
              </button>
            </div>
          </div>
      </div>
    </div>
  </div>
</main>
@endsection