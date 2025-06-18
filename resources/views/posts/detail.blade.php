@extends('layouts.app')

@section('content')
    @livewire('posts.detail', ['slug' => $slug])
@endsection
