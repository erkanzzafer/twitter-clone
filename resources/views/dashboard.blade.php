@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @if (session()->has('success'))
                @include('shared.success-message')
            @elseif (session()->has('error'))
                @include('shared.error-message')
            @endif

            @include('shared.submit-idea')

            <hr>
            <div class="mt-3">
                @forelse ($ideas as $idea)
                    <div class="mt-5">
                        @include('shared.idea-card')
                    </div>
                @empty
                    <h4>Henüz Paylaşım Yapılmamış</h4>
                @endforelse
                <div class="mt-4">
                    {{ $ideas->withQueryString()->links() }}
                </div>
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
            deneme123
        </div>
    </div>
@endsection
