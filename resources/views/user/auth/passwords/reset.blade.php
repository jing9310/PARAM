@extends('layouts.layout')
<header class="navbar navbar-expand-lg navbar-light pt-5">
    <div class="container-md">
        <a class="navbar-brand pl-5 font-weight-bold" href="{{ route('top') }}">PARAM</a>
    </div>
</header>
<main>
    <div class="container mb-5">
        <div class="col-md-8 offset-md-2 border p-5 bg-light rounded-lg">
            <form action="{{ route('user.password.update') }}" method="POST">
            @csrf
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input name="email" type="text" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input name="password" type="text" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn btn-outline-primary col-6">送信する</button>
                </div>
            </form>
        </div>
    </div>
</main>