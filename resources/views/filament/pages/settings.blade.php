<x-filament-panels::page>
    <form wire:submit="save" class="space-y-6">
        {{ $this->form }}

        <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
            
            <x-filament::actions 
                :actions="$this->getFormActions()" 
            />
        </div>
    </form>
</x-filament-panels::page>