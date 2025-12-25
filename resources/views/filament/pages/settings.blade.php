<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div class="mt-6 flex items-center justify-start gap-x-4">
            <x-filament::actions :actions="$this->getFormActions()" />
        </div>
    </form>

    <x-filament-actions::modals />
</x-filament-panels::page>