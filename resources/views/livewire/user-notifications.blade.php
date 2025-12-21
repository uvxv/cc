
<div wire:poll.5s x-data="{ open:false }" class="relative">

    
    <button @click="open = !open"
        class="relative text-gray-500 hover:text-gray-700 focus:outline-none">

        {{-- Bell Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="none" class="size-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
        </svg>

        
        @if($notifications->count())
            <span class="absolute -top-1 -right-1 bg-red-600 text-white
                         text-xs w-5 h-5 flex items-center justify-center rounded-full">
                {{ $notifications->count() }}
            </span>
        @endif
    </button>


    <div x-show="open"
         @click.outside="open=false"
         x-transition
         class="absolute right-0 mt-3 w-96 bg-white shadow-xl rounded-xl border z-50 outline-none border-gray-200 ">

        <h1 class="text-lg font-semibold p-4 border-b">
            Notifications
        </h1>

        @if($notifications->isEmpty())
            <p class="p-4 text-gray-500 text-sm">No new notifications</p>
        @else
            <div class="max-h-80 overflow-y-auto divide-y">
                @foreach($notifications as $notification)
                    <div wire:key="notification-{{ $notification->id }}"
                         class="p-4 flex justify-between gap-3">

                        <div class="flex-1">
                            <p class="font-semibold text-sm">
                                {{ $notification->data['title'] ?? 'Notification' }}
                            </p>

                            <p class="text-xs text-gray-500">
                                {{ $notification->data['message'] ?? '' }}
                            </p>

                            <p class="text-[10px] text-gray-400 mt-1">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </div>

                        <button
                            wire:click="markAsRead('{{ $notification->id }}')"
                            class="text-xs bg-black text-white px-2 py-1 rounded hover:bg-gray-800">
                            Mark read
                        </button>

                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

