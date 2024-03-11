<div class="grid grid-cols-[1fr_5fr] mt-8">
    <livewire:layout.sidebar />
    <div class="space-y-2">
        <h2 class="text-secondary-500 font-bold text-2xl capitalize">You Searched for {{$searchTerm}}</h2>
        @if (count($searchedCars)>0)
        <p class="text-secondary-400 text-base font-semibold"> Here are the results</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($searchedCars as $car)
            <x-morent.cards.singleCar :car='$car' />
            @endforeach
        </div>
        @else
        <p class="text-secondary-400 text-base font-semibold"> There were no results. Search again?</p>
        <livewire:cars.searchcomponent class="min-w-fit" />

        <hr>
        <div class="flex flex-col space-y-2">
            <p class="text-secondary-400 text-base font-semibold">
                Or, go back home?
            </p>

            <a href="{{route('home')}}" class="inline-flex items-center px-3 py-2 text-base font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 max-w-fit">
                Go Home Instead
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>

        @endif
    </div>

</div>