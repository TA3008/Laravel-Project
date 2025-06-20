@extends('layouts.app')

@section('content')
    @livewire('posts.edit', ['id' => $id ?? null])

@endsection




