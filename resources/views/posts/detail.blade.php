@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">
            Bởi {{ $post->user->name ?? 'Không xác định' }} | {{ $post->created_at->format('d/m/Y') }}
        </p>

        @if($post->image)
            <img src="{{ asset($post->image) }}" alt="Ảnh bài viết" style="max-width: 100%; height: auto;">
        @endif

        <div class="mt-4">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
@endsection
