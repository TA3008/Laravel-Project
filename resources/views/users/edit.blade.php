@extends('layouts.app')

@section('content')
    @livewire('users.edit', ['id' => $id ?? null])
@endsection
