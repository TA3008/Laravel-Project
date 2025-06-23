@extends('layouts.app')

@section('content')
    @livewire('categories.edit', ['id' => $id ?? null])

@endsection