<div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
></div>
<aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.outside="closeSideMenu"
        @keydown.escape="closeSideMenu"
>
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800" href="{{ route('dashboard') }}">
            Windmill
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </x-slot>
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </x-slot>
                    {{ __('Users') }}
                </x-responsive-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('clients.index') }}" :active="request()->routeIs('clients.index')">
                    <x-slot name="icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM8.715 8c1.151 0 2 .849 2 2s-.849 2-2 2-2-.849-2-2 .848-2 2-2zm3.715 8H5v-.465c0-1.373 1.676-2.785 3.715-2.785s3.715 1.412 3.715 2.785V16zM19 15h-4v-2h4v2zm0-4h-5V9h5v2z"/></svg>
                    </x-slot>
                    {{ __('Clients') }}
                </x-responsive-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('teams.index') }}" :active="request()->routeIs('teams.index')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    </x-slot>
                    {{ __('Teams') }}
                </x-responsive-nav-link>
            </li>
            
            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('projects.index') }}" :active="request()->routeIs('projects.index')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.1679 7H21.6679C22.7724 7 23.6679 7.8954 23.6679 9C23.6679 9.2641 23.6156 9.5255 23.514 9.7692L20.1807 17.7692C19.8702 18.5145 19.1419 19 18.3345 19H4.36866C2.83339 19 1.54587 17.8409 1.38515 16.3141L0.0167269 3.31405C-0.156721 1.6663 1.03844 0.18993 2.68619 0.01648C2.79051 0.0055 2.89534 0 3.00024 0H8.94712C9.37755 0 9.75969 0.27543 9.8958 0.68377L10.6679 3H19.4023C20.5069 3 21.4023 3.89543 21.4023 5C21.4023 5.08293 21.3972 5.16578 21.3869 5.24807L21.1679 7zM19.1523 7L19.4023 5H9.22636L8.22636 2H3.00024C2.96528 2 2.93033 2.00183 2.89556 2.00549C2.34631 2.06331 1.94792 2.55543 2.00574 3.10468L3.27334 15.1469L6.15506 8.2308C6.4656 7.4855 7.19381 7 8.00121 7H19.1523zM8.00121 9L4.66788 17H18.3345L21.6679 9H8.00121z" fill="#758CA3"/>
                        </svg>
                    </x-slot>
                    {{ __('Projects') }}
                </x-responsive-nav-link>
            </li>
            
            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('tasks.index') }}" :active="request()->routeIs('tasks.index')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4,23.4l-3.7-3.7l1.4-1.4L4,20.6l4.3-4.3l1.4,1.4L4,23.4z M24,21H12v-2h12V21z M4,15.4l-3.7-3.7l1.4-1.4L4,12.6l4.3-4.3   l1.4,1.4L4,15.4z M24,13H12v-2h12V13z M4,7.4L0.3,3.7l1.4-1.4L4,4.6l4.3-4.3l1.4,1.4L4,7.4z M24,5H12V3h12V5z"/>
                        </svg>
                    </x-slot>
                    {{ __('Tasks') }}
                </x-responsive-nav-link>
            </li>
        </ul>
    </div>
</aside>
