<div class="container">
    <!-- breadcrumb -->
 <livewire:components.breadcrumb :items="$breadcrumbItems" />
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">
            Bởi {{ $post->user->name ?? 'Không xác định' }} | {{ $post->created_at->format('d/m/Y') }}
        </p>

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Ảnh bài viết" style="max-width: 100%; height: auto;">
        @endif

        <div class="mt-4">
            {!! $post->content !!}

        </div>
    </div>