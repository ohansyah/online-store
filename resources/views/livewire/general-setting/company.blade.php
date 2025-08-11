<x-form-section submit="submit">
    <x-slot name="title">
        {{ __('general_setting_company_title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('general_setting_company_description') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-label for="company_name" value="{{ __('company_name') }}" />
            <x-input id="company_name" type="text" class="mt-1 block w-full" wire:model.defer="company_name" autocomplete="company_name" />
            <x-input-error for="company_name" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-label for="company_address_line_1" value="{{ __('company_address_line_1') }}" />
            <x-input id="company_address_line_1" type="text" class="mt-1 block w-full" wire:model.defer="company_address_line_1" autocomplete="company_address_line_1" />
            <x-input-error for="company_address_line_1" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-label for="company_address_line_2" value="{{ __('company_address_line_2') }}" />
            <x-input id="company_address_line_2" type="text" class="mt-1 block w-full" wire:model.defer="company_address_line_2" autocomplete="company_address_line_2" />
            <x-input-error for="company_address_line_2" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ session('message') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
