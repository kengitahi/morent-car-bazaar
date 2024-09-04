<?php

use Livewire\Volt\Component;

new class extends Component {
    public $search_term;

    public function searchCars()
    {
        redirect(route('cars.searchresults', $searchTerm = $this->search_term));
    }
}; ?>

<div>
    <form class="mx-auto" wire:submit="searchCars">
        <label class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white" for="default-search">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" />
                </svg>
            </div>
            <input
                class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 ps-10 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="search_term" name="search_term" placeholder="Search cars by name or description..." required
                wire:model="search_term" />
            <button
                class="group absolute bottom-2.5 end-2.5 rounded-lg px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="submit" wire:click="searchCars">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-800 group-hover:text-white dark:text-white"
                    fill="none" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" stroke="currentColor" />
                </svg>
            </button>
        </div>
    </form>
</div>
