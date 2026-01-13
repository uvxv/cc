<x-api-dashboard-layout>
    <!-- Tab 2: Create Token View (Hidden by default) -->
    <div id="view-create" class="max-w-2xl mx-auto">
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900">Create New Token</h2>
                <p class="mt-2 text-sm text-gray-500">Generate a new access token for a specific purpose.</p>
            </div>
        </div>

        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
            <div class="px-4 py-6 sm:p-8">
                <form action="{{ route('token.store') }}" method="POST">
                    @csrf
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-4">
                            <label for="token_name" class="block text-sm font-medium leading-6 text-gray-900">Token
                                Name</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-[#F05340] sm:max-w-md">
                                    <input type="text" name="token_name" id="token_name"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="e.g. CI/CD Runner">
                                </div>
                                <p class="mt-2 text-sm text-gray-500">What is this token going to be used for?</p>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Capabilities</label>
                            <div class="mt-4 space-y-4">
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="comments" name="abilities[]" value="read:user" type="checkbox" checked
                                            class="h-4 w-4 rounded border-gray-300 text-[#F05340] focus:ring-[#F05340]">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="comments" class="font-medium text-gray-900">Read Access
                                            (read:user)</label>
                                        <p class="text-gray-500">Allow read access to user resources.</p>
                                    </div>
                                </div>
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="candidates" name="abilities[]" value="read:penalty" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-[#F05340] focus:ring-[#F05340]">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="candidates" class="font-medium text-gray-900">Read Access
                                            (read:penalty)</label>
                                        <p class="text-gray-500">Allows read access to payment resources.
                                        </p>
                                    </div>
                                </div>

                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="candidates" name="abilities[]" value="create:penalty" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-[#F05340] focus:ring-[#F05340]">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="candidates" class="font-medium text-gray-900">Create Access
                                            (create:penalty)</label>
                                        <p class="text-gray-500">Allows create access to penalty resources.
                                        </p>
                                    </div>
                                </div>

                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="candidates" name="abilities[]" value="delete:penalty" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-[#F05340] focus:ring-[#F05340]">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="candidates" class="font-medium text-gray-900">Delete Access
                                            (delete:penalty)</label>
                                        <p class="text-gray-500">Allows create access to penalty resources.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mt-8 flex items-center justify-end gap-x-6 border-t border-gray-900/10 pt-4">
                        <a href="{{ route('token.index') }}">
                        <button type="button"
                            class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        </a>
                        <button type="submit"
                            class="rounded-md bg-[#F05340] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#d94130] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                            Token</button>
                    </div>
                </form>
            </div>
            @error('abilities')
            <p class="text-sm text-bold text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
    </div>
</x-api-dashboard-layout>
