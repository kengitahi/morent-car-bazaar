<div>
    <x-morent.home-hero />
    <div class="date-picker my-4 mt-8">
        <h2 class="text-xl font-bold my-4 text-secondary-900">Search By Date</h2>
        <form action="" class="grid grid-cols-1 lg:grid-cols-[1fr_1fr_60px] gap-5 content-center">
            <div class="pickup w-100">
                <h2 class="text-lg font-bold mb-3">Pickup</h2>
                <div class=" flex gap-2 w-full justify-between items-center">
                    <x-select label="Location" placeholder="Select Pickup City" wire:model="pickup-location" :options="[
                            ['city' => 'London', 'id' => 1],
                            ['city' => 'Amsterdam', 'id' => 2],
                            ['city' => 'Nairobi', 'id' => 3],
                            ['city' => 'Mombasa', 'id' => 4],
                        ]" option-label="city" option-value="id" />
                    <x-datetime-picker id="pickup-date" wire:model="pickup-date" label="Date" placeholder="Select Pickup Date" :min="now()" :max="now()->addDays(21)" />
                    <x-time-picker id="pickup-time" wire:model.defer="pickup-time" label="Time" placeholder="12:00 AM" />
                </div>
            </div>
            <div class="dropoff">
                <h2 class="text-lg font-bold mb-3">Drop-off</h2>
                <div class="flex gap-2">
                    <x-select label="Location" placeholder="Select Dropoff City" wire:model="pickup-location" wire:model="dropoff-location" :options="[
                        ['city' => 'London', 'id' => 1],
                        ['city' => 'Amsterdam', 'id' => 2],
                        ['city' => 'Nairobi', 'id' => 3],
                        ['city' => 'Mombasa', 'id' => 4],
                    ]" option-label="city" option-value="id" />
                    <x-datetime-picker id="dropoff-date" label="Date" wire:model="dropoff-date" placeholder="Select Drop off Date" :min="now()->addDays(1)" :max="now()->addDays(21)" />
                    <x-time-picker id="dropoff-time" wire:model.defer="dropoff-time" label="Time" placeholder="12:00 AM" />
                </div>
            </div>
            <div class="flex items-center justify-center bg-blue-700 w-full max-w-xs mx-auto px-2 py-4">
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </div>
        </form>
    </div>
    <div>
        <div class="flex flex-cols justify-between items-center">
            <h2 class="text-xl font-bold my-4 text-secondary-900">Popular Cars</h2>
            <a href="#" class="text-primary-500 font-semibold text-base">View All</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($popularCars as $car)
            <x-morent.cards.singleCar :car='$car' />
            @endforeach
        </div>
    </div>
    <div>
        <h2 class="text-xl font-bold my-4 text-secondary-900">Reccommended Cars</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($allCars as $car)
            <x-morent.cards.singleCar :car='$car' />
            @endforeach
        </div>
    </div>
</div>