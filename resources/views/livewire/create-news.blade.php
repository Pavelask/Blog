<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="mx-12 my-12">
                    <form wire:submit="create">
                        {{ $this->form }}

                        <button type="submit" class="mt-12 py-2 px-4 bg-amber-600 text-white rounded-md">
                            Send
                        </button>
                    </form>

                    <x-filament-actions::modals />
                </div>

            </div>
        </div>
    </div>
</div>

