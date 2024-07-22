<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    {{ $record }}
    <div class="mx-12 my-12">
        <form wire:submit="update">
            {{ $this->editNewsForm }}

            <button type="submit" class="mt-12 py-2 px-4 bg-amber-600 text-white rounded-md">
                Send
            </button>
        </form>

        <x-filament-actions::modals />
    </div>
</div>
