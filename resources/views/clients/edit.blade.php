<x-app-layout>
    <x-slot name="header">
        {{ __('Edit client') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">

        <form action="{{ route('clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <x-input-label for="contact_name" :value="__('Name')"/>
                <x-text-input type="text"
                         id="contact_name"
                         name="contact_name"
                         class="block w-full"
                         value="{{ old('contact_name', $client->contact_name) }}"
                         />
                <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="contact_email" :value="__('Email')"/>
                <x-text-input name="contact_email"
                         id="contact_email"
                         type="email"
                         class="block w-full"
                         value="{{ old('contact_email', $client->contact_email) }}"
                         />
                <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="contact_phone_number" :value="__('Phone number')"/>
                <x-text-input name="contact_phone_number"
                         id="contact_phone_number"
                         type="number"
                         class="block w-full"
                         value="{{ old('contact_phone_number', $client->contact_phone_number) }}"
                         />
                <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="company_name" :value="__('Company name')"/>
                <x-text-input name="company_name"
                         id="company_name"
                         type="text"
                         class="block w-full"
                         value="{{ old('company_name', $client->company_name) }}"
                         />
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="company_vat" :value="__('Company VAT')"/>
                <x-text-input name="company_vat"
                         id="company_vat"
                         type="number"
                         class="block w-full"
                         value="{{ old('company_vat', $client->company_vat) }}"
                         />
                <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="company_address" :value="__('Company address')"/>
                <x-text-input name="company_address"
                         id="company_address"
                         type="text"
                         class="block w-full"
                         value="{{ old('company_address', $client->company_address) }}"
                         />
                <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="company_city" :value="__('Company city')"/>
                <x-text-input name="company_city"
                         id="company_city"
                         type="text"
                         class="block w-full"
                         value="{{ old('company_city', $client->company_city) }}"
                         />
                <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="company_zip" :value="__('Company ZIP')"/>
                <x-text-input name="company_zip"
                         id="company_zip"
                         type="number"
                         class="block w-full"
                         value="{{ old('company_zip', $client->company_zip) }}"
                         />
                <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
