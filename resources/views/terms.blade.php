<x-app-layout>
    <x-slot name="header">
        {{ __('Accept terms') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus lacus a sollicitudin egestas. Nullam imperdiet quis neque a mollis. Nulla ut ultricies purus, egestas molestie nisi. Morbi ac felis vitae leo accumsan condimentum non eget erat. Cras in faucibus tortor. Mauris vitae dui odio. Suspendisse potenti.

        Nulla vitae ante quis massa dapibus commodo ut a purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam dapibus nulla a urna vulputate, sed consequat ipsum finibus. Nulla tempor lacus enim, vel pretium est dignissim et. Quisque vitae fringilla sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec tristique enim at urna ornare semper. Aenean eu sapien et ipsum fermentum fermentum. Praesent tempus fermentum felis, fringilla tincidunt arcu elementum quis. Pellentesque malesuada eu mauris eget laoreet. Aenean sed lectus mollis, bibendum enim sit amet, sollicitudin nibh. Praesent ac tortor sit amet lacus feugiat commodo.

        Phasellus eget ante a ligula mollis semper. Integer aliquet mattis semper. Donec imperdiet sit amet nibh eget ultrices. In laoreet, ligula quis eleifend condimentum, sem ipsum facilisis velit, pellentesque auctor ex nisi sed purus. Cras sit amet sagittis dui. Maecenas tempus iaculis augue, nec blandit odio varius et. Etiam leo dui, scelerisque sed est quis, ultricies ultrices nunc

        <form action="{{ route('terms.store') }}" method="POST">
            @csrf

            <div class="mt-4">
                <div class="mt-1 inline-flex space-x-1">
                    <input type="checkbox" name="accept_terms" id="accept_terms" value="1">
                    <x-input-label for="accept_terms">Accept terms</x-input-label>
                </div>
                <div>
                    <x-input-error :messages="$errors->get('accept_terms')" class="mt-2" />
                </div>
            </div>

            <div class="mt-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
