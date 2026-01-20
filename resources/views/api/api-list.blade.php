<x-api-dashboard-layout>
<!-- Tab 1: Token List View -->
    @if (session('token'))
        <x-bladewind::alert
            type="success">
            Please copy your new token now. For security reasons, it won't be shown again.
            <div class="mt-2 p-4 bg-gray-100 rounded-md">
                <p class="font-mono text-sm text-gray-800">{{ session('token') }}</p>
            </div>
        </x-bladewind::alert>
    @endif
    <div id="view-list" class="space-y-6">
        <div class="md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Active Tokens</h2>
                <p class="mt-2 text-sm text-gray-500">Manage access and regenerate keys for your applications.</p>
            </div>
        </div>

        <!-- Token List -->
        @if ($tokens->count() > 0)
            @foreach ($tokens as $token)
                <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
                    <ul role="list" class="divide-y divide-gray-100">
                        
                        <!-- Token Item 1 -->
                        <li class="flex flex-col sm:flex-row sm:items-center justify-between gap-x-6 py-5 px-6 hover:bg-gray-50 transition-colors">
                            <div class="min-w-0 mb-4 sm:mb-0">
                                <div class="flex items-start gap-x-3">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $token->name }}</p>
                                    <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">Active</p>
                                </div>
                                <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                    <span class="font-mono bg-gray-100 px-2 py-0.5 rounded text-gray-600">tk_live_...8x92</span>
                                    <span>&bull;</span>
                                    <p class="truncate">Last used: 2 mins ago</p>
                                </div>
                            </div>
                            <div class="flex flex-none items-center gap-x-3">
                                <form method="POST" action="{{ route('token.revoke', $token->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="w-full flex justify-center">
                                    <button class="inline-flex items-center rounded-md bg-red-50 px-3 py-2 text-sm font-semibold text-red-600 shadow-sm ring-1 ring-inset ring-red-200 hover:bg-red-100 transition-all">
                                        Revoke
                                    </button>
                                </div>
                                </form>
                            </div>
                        </li>

                    </ul>
                </div>
            @endforeach
        @else
        <p class="text-sm text-gray-500">No active tokens found. <a href="{{ route('token.create') }}" class="text-[#F05340] font-medium hover:underline">Create a new token</a> to get started.</p>
        @endif
    </div>
</x-api-dashboard-layout>