@extends('layouts.app')

@section('content')
  <articles-component :user-id="{{ Auth::user()->id }}" :article-route="'{{ route('home') }}'"/>
@endsection
