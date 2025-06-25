@extends('layouts.app')

@section('content')
    <livewire:posts.edit :id="$editingPostId" :redirectToIndex="false" wire:key="edit-modal-{{ $editingPostId }}" />

@endsection


