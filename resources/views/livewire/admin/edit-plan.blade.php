<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar plan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form wire:submit.prevent="update" class="grid grid-cols-4 gap-5 p-4">
                    <div class="mb-4 col-span-4">
                        <x-jet-label value="Nombre del plan" />
                        <x-jet-input wire:model="plan.name" type="text" placeholder="Nombre del plan"
                            class="w-full" />
                        <x-jet-input-error for="plan.name" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label value="MXN manga corta" />
                        <x-jet-input wire:model="plan.MXN" type="text" class="w-full" />
                        <x-jet-input-error for="plan.MXN" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label value="MXN manga larga" />
                        <x-jet-input wire:model="plan.MXN_L" type="text" class="w-full" />
                        <x-jet-input-error for="plan.MXN_L" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label value="USD manga corta" />
                        <x-jet-input wire:model="plan.USD" type="text" class="w-full" />
                        <x-jet-input-error for="plan.USD" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label value="USD manga larga" />
                        <x-jet-input wire:model="plan.USD_L" type="text" class="w-full" />
                        <x-jet-input-error for="plan.USD_L" />
                    </div>
                    <div class="col-span-4 flex justify-end items-center">
                        <x-jet-action-message class="mr-3" on="saved">
                            Actualizado
                        </x-jet-action-message>
                        <x-jet-button type="submit">Actualizar</x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
