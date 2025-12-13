<div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 border-b border-gray-50 flex justify-between items-center">
            <h3 class="font-semibold text-brand-dark text-sm flex items-center">
                <!-- Icon: Alert -->
                <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                Traffic Fines & Penalties
            </h3>
            <span class="bg-orange-100 text-orange-700 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ $penalties->total() }} Penalties  </span>
        </div>
        <div wire:poll.2s class="divide-y divide-gray-50">
            @foreach ( $penalties as $penalty )
                <div wire:key="{{$penalty->id}}" class="p-4 hover:bg-gray-50 transition">
                    <div class="flex justify-between items-start mb-1">
                        <span class="text-xs font-bold text-brand-dark">Speeding (60-80kmph)</span>
                        @if ($penalty->status == "unpaid")
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-yellow-100 text-yellow-700">unpaid</span>
                        @elseif ($penalty->status == "paid")
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-green-100 text-green-700">paid</span>
                        @elseif ($penalty->status == "processing")
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-blue-100 text-blue-700">processing</span>
                        @endif
                        
                    </div>
                    <div class="flex justify-between items-end">
                        <div>
                            <div class="text-[10px] text-brand-muted">{{ $penalty->location }}</div>
                            <div class="text-[10px] text-brand-muted">{{ $penalty->date_issued}}</div>
                        </div>
                        <button class="text-xs bg-brand-dark text-white px-3 py-1.5 rounded hover:bg-black transition">Pay 3,000 LKR</button>
                    </div>
                </div>
            @endforeach
            
        </div>
        
        <div class="p-3 bg-gray-50 text-center border-t border-gray-100">
            {{ $penalties->links() }}
        </div>
    </div>
</div>
