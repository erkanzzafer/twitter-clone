@extends('layouts.layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('authenticate') }}" method="post">
                @csrf
                <h3 class="text-center text-dark">Giriş Yap</h3>
                @if (session()->has('error'))
                    <span class="text-danger">{{ session('error') }}</span>
                @endif
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="Giriş Yap">
                </div>
                <div class="text-right mt-2">
                    <a href="/login" class="text-dark">Kayıt Ol</a>
                </div>
            </form>
        </div>
    </div>
@endsection
