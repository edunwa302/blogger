@extends('layouts.app')

@section('content')
  <div class="">
      @isset($article)
        <div class="container">
            <div class="mb-3">
            {{-- @foreach ($comments as $comment)
                <p>This is : {{ $comment->comment }}</p>
            @endforeach --}}
            {{-- SIngle view component --}}
             <single-article-component :article-data="{{ json_encode($article) }}" :comments-data="{{ json_encode($comments) }}" :user-info="{{ json_encode($poster) }}" :user="{{ Auth::user() }}"></single-article-component>

             {{-- comments view component --}}
             {{-- <comments-component :comments-data="{{ json_encode($comments) }}" :user-info="{{ json_encode($poster) }}"/> --}}

            </div>

        </div>
      @endisset
  </div>

@endsection
