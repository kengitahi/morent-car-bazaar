{{-- @php
dd($searchedCars);
@endphp --}}

<div>
    <div class="grid grid-cols-[1fr_3fr] mt-8">
        <div>
            <h2 class="text-xl font-bold my-4 text-secondary-900">Search again?</h2>
            <livewire:cars.sidebar />
        </div>

        <div>
            <h2 class="text-xl font-bold my-4 text-secondary-900">Here are the cars you searched for:</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($searchedCars as $car)
                <x-morent.cards.singleCar :car='$car' />
                @endforeach
            </div>
        </div>

    </div>