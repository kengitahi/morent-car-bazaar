<div>
    <x-morent.home-hero />
    <div class="my-4 mt-8 date-picker">
        <h2 class="my-4 text-2xl font-bold text-secondary-900">Search By Date</h2>
        <form action="" class="grid grid-cols-1 content-center gap-5 lg:grid-cols-[1fr_1fr_60px]">
            <div class="pickup w-100">
                <h2 class="mb-3 text-lg font-bold">Pickup</h2>
                <div class="flex items-center justify-between w-full gap-2">
                    <x-select :options="[
                        ['city' => 'London', 'id' => 1],
                        ['city' => 'Amsterdam', 'id' => 2],
                        ['city' => 'Nairobi', 'id' => 3],
                        ['city' => 'Mombasa', 'id' => 4],
                    ]" label="Location" option-label="city" option-value="id"
                        placeholder="Select Pickup City" wire:model="pickup-location" />
                    <x-datetime-picker :max="now()->addDays(21)" :min="now()" id="pickup-date" label="Date"
                        placeholder="Select Pickup Date" wire:model="pickup-date" />
                    <x-time-picker id="pickup-time" label="Time" placeholder="12:00 AM"
                        wire:model.defer="pickup-time" />
                </div>
            </div>
            <div class="dropoff">
                <h2 class="mb-3 text-lg font-bold">Drop-off</h2>
                <div class="flex gap-2">
                    <x-select :options="[
                        ['city' => 'London', 'id' => 1],
                        ['city' => 'Amsterdam', 'id' => 2],
                        ['city' => 'Nairobi', 'id' => 3],
                        ['city' => 'Mombasa', 'id' => 4],
                    ]" label="Location" option-label="city" option-value="id"
                        placeholder="Select Dropoff City" wire:model="pickup-location" wire:model="dropoff-location" />
                    <x-datetime-picker :max="now()->addDays(21)" :min="now()->addDays(1)" id="dropoff-date" label="Date"
                        placeholder="Select Drop off Date" wire:model="dropoff-date" />
                    <x-time-picker id="dropoff-time" label="Time" placeholder="12:00 AM"
                        wire:model.defer="dropoff-time" />
                </div>
            </div>
            <div class="flex items-center justify-center w-full max-w-xs px-2 py-4 mx-auto bg-blue-700">
                <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-white" fill="none" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" stroke-linecap="round"
                        stroke-width="2" stroke="currentColor" />
                </svg>
            </div>
        </form>
    </div>
    <div>
        <div class="flex items-center justify-between flex-cols">
            <h2 class="my-4 text-xl font-bold text-secondary-900">Popular Cars</h2>
            <a class="text-base font-semibold text-primary-500" href="#">View All</a>
        </div>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($popularCars as $car)
                <x-morent.cards.singleCar :car='$car' />
            @endforeach
        </div>
    </div>
    <div>
        <h2 class="my-4 text-xl font-bold text-secondary-900">Recommended Cars</h2>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($allCars as $car)
                <x-morent.cards.singleCar :car='$car' />
            @endforeach
        </div>
    </div>
</div>
