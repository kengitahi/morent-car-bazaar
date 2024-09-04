<nav class="mt-10 bg-white border-b border-gray-100 dark:border-gray-700 dark:bg-gray-800" x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="flex flex-col">
        <div class="flex justify-between">
            <!-- Logo -->
            <div class="flex items-center shrink-0">
                <a href="/">
                    <x-application-logo class="block w-auto h-6 text-gray-800 fill-current dark:text-gray-200" />
                </a>
            </div>
            <!-- Search input -->
            <div class="hidden w-full px-8 sm:block">
                <livewire:cars.searchcomponent />
            </div>
            <!-- Navigation buttons -->
            <div class="items-center hidden space-x-8 sm:-my-px sm:flex">
                <x-nav-link class="no-underline" href='#'>
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-600 no-underline dark:text-white"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m12.7 20.7 6.2-7.1c2.7-3 2.6-6.5.8-8.7A5 5 0 0 0 16 3c-1.3 0-2.7.4-4 1.4A6.3 6.3 0 0 0 8 3a5 5 0 0 0-3.7 1.9c-1.8 2.2-2 5.8.8 8.7l6.2 7a1 1 0 0 0 1.4 0Z" />
                    </svg>
                </x-nav-link>
                <x-nav-link class="no-underline" href='#'>
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-600 no-underline dark:text-white"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.1 12.6v-1.8A5.4 5.4 0 0 0 13 5.6V3a1 1 0 0 0-2 0v2.4a5.4 5.4 0 0 0-4 5.5v1.8c0 2.4-1.9 3-1.9 4.2 0 .6 0 1.2.5 1.2h13c.5 0 .5-.6.5-1.2 0-1.2-1.9-1.8-1.9-4.2ZM8.8 19a3.5 3.5 0 0 0 6.4 0H8.8Z" />
                    </svg>
                </x-nav-link>
                <x-nav-link class="no-underline" href='#'>
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-600 no-underline dark:text-white"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd"
                            d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                            fill-rule="evenodd" />
                    </svg>
                </x-nav-link>
                <x-morent.user-avatar-dropdown />
            </div>

            <!-- Hamburger -->
            <div class="flex items-center gap-2 -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" d="M6 18L18 6M6 6l12 12"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>
                <x-morent.user-avatar-dropdown />
            </div>
        </div>

        <div class="mt-4 sm:hidden">
            <x-morent.search />
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <hr>
            <!-- <x-responsive-nav-link :active="request()->routeIs('dashboard')" :href="route('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link> -->
            <x-responsive-nav-link class="flex items-center gap-2 no-underline" href='#'>
                <svg aria-hidden="true" class="w-6 h-6 text-gray-600 no-underline dark:text-white" fill="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m12.7 20.7 6.2-7.1c2.7-3 2.6-6.5.8-8.7A5 5 0 0 0 16 3c-1.3 0-2.7.4-4 1.4A6.3 6.3 0 0 0 8 3a5 5 0 0 0-3.7 1.9c-1.8 2.2-2 5.8.8 8.7l6.2 7a1 1 0 0 0 1.4 0Z" />
                </svg>
                Wishlist
            </x-responsive-nav-link>
            <x-responsive-nav-link class="flex items-center gap-2 no-underline" href='#'>
                <svg aria-hidden="true" class="w-6 h-6 text-gray-600 no-underline dark:text-white" fill="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.1 12.6v-1.8A5.4 5.4 0 0 0 13 5.6V3a1 1 0 0 0-2 0v2.4a5.4 5.4 0 0 0-4 5.5v1.8c0 2.4-1.9 3-1.9 4.2 0 .6 0 1.2.5 1.2h13c.5 0 .5-.6.5-1.2 0-1.2-1.9-1.8-1.9-4.2ZM8.8 19a3.5 3.5 0 0 0 6.4 0H8.8Z" />
                </svg>
                Notifications
            </x-responsive-nav-link>
            <x-responsive-nav-link class="flex items-center gap-2 no-underline" href='#'>
                <svg aria-hidden="true" class="w-6 h-6 text-gray-600 no-underline dark:text-white" fill="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                        d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                        fill-rule="evenodd" />
                </svg>
                Settings
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
