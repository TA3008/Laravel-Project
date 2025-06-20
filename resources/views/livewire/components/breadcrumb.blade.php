<div>
    <div class="text-sm breadcrumbs mb-4">
        <ul class="flex items-center space-x-2 text-gray-600" style="list-style: none; padding-left: 0; margin-left: 0;">
            <!-- Trang chủ -->
            <li class="flex items-center space-x-1" style="list-style: none;">
                <i class="fas fa-home text-xs"></i>
                <a href="/" class="hover:underline text-blue-500 ml-1">Trang chủ</a>
            </li>

            @foreach ($items as $item)
                <!-- Dấu phân cách -->
                <li class="text-xs text-gray-400" style="list-style: none;">
                    <i class="fas fa-chevron-right"></i>
                </li>

                <!-- Mục breadcrumb -->
                <li class="flex items-center space-x-1" style="list-style: none;">
                    @if ($loop->last)
                        <span class="text-gray-800 font-semibold">{{ $item['label'] }}</span>
                    @else
                        <a href="{{ $item['url'] }}" class="hover:underline text-blue-500">{{ $item['label'] }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
