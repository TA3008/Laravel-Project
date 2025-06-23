<div class="tw-breadcrumb">
    <nav class="text-sm mb-4">
        <ul class="flex items-center text-gray-600 list-none p-0 m-0">
            <li class="flex items-center">
                <i class="fas fa-home text-xs"></i>
                <a href="/" class="hover:underline text-blue-500 ml-1">Trang chủ</a>
            </li>
            @foreach ($items as $item)
                <li class="flex items-center">
                    <span class="mx-2 text-gray-400"><i class="fas fa-chevron-right"></i></span>
                    @if ($loop->last)
                        <span class="text-gray-800 font-semibold">{{ $item['label'] }}</span>
                    @else
                        <a href="{{ $item['url'] }}" class="hover:underline text-blue-500">{{ $item['label'] }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</div>