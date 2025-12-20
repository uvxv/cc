<x-bladewind::dropmenu scrollable="true" header=true width="300px" >
    <h1 class="text-lg font-semibold p-4 border-b border-gray-200">Notifications</h1>

    <x-slot:trigger>
        <button type="button" class="relative p-2 text-gray-400 hover:text-gray-500 focus:outline-none">
            <span class="sr-only">View notifications</span>
            
            {{-- Heroicon Bell: The 'bell' name automatically pulls the heroicon svg --}}
            <x-bladewind::icon name="bell" class="!h-6 !w-6" />

            {{-- Unread Indicator (Red Dot) --}}
            <span class="absolute top-2 right-2 block h-2 w-2 rounded-full ring-2 ring-white bg-red-500"></span>
        </button>
    </x-slot:trigger>

    {{-- 
        MENU ITEMS
        BladeWind items can accept raw HTML for complex layouts (like notification text).
    --}}

    @if (!$notifications->isEmpty())
        @foreach ( $notifications as $notification )
            <x-bladewind::dropmenu.item divider="true">
                <div class="flex items-start justify-between min-w-[200px] gap-2">
                    <div class="flex flex-col gap-1">
                        <span class="font-semibold text-gray-800 text-sm"></span>
                        <span class="text-xs text-gray-500">{{ $notification->data['title'] }}</span>
                        <span class="text-sm text-gray-600">{{ $notification->data['message'] }}</span>
                        <span class="text-[10px] text-gray-400 mt-1">{{ $notification->created_at->diffForHumans() }}</span>
                    </div>
                    <button type="button" class="ml-3 inline-flex items-center px-2 py-1 bg-black text-white text-xs rounded hover:bg-gray-800 focus:outline-none" aria-label="Mark as read">
                        Mark as read
                    </button>
                </div>
            </x-bladewind::dropmenu.item>
        @endforeach 
    @endif
</x-bladewind::dropmenu>