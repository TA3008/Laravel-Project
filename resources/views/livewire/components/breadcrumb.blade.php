<div class="tw-breadcrumb">
    <nav class="text-sm mb-4">
        <ul class="flex items-center text-gray-600 list-none p-0 m-0">
            <li class="flex items-center space-x-1">
                <i class="fas fa-home text-[12px] text-gray-500"></i>
                <a href="/" class="hover:underline text-blue-500 text-sm">Trang chủ</a>
            </li>
            @foreach ($items as $item)
                <li class="flex items-center space-x-1">
                    <span class="text-gray-400 text-xs"><i class="fas fa-chevron-right text-[10px]"></i></span>
                    @if ($loop->last)
                        <span class="text-gray-800 font-semibold text-sm">{{ $item['label'] }}</span>
                    @else
                        <a href="{{ $item['url'] }}" class="hover:underline text-blue-500 text-sm">{{ $item['label'] }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</div>
