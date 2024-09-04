{{-- @php
dd($searchedCars);
@endphp --}}

<div>
    <div class="mt-8 grid grid-cols-[1fr_3fr]">
        <div>
            <h2 class="my-4 text-xl font-bold text-secondary-900">Search again?</h2>
            <livewire:cars.sidebar />
        </div>

        <div>
            @if (count($searchedCars) == 0)
                <h2 class="my-4 text-xl font-bold text-secondary-900">We did not find any cars, please try again using
                    the sidebar to the left or the one on top.</h2>
            @else
                <h2 class="my-4 text-xl font-bold text-secondary-900">Here are the cars you searched for:</h2>
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($searchedCars as $car)
                        <x-morent.cards.singleCar :car='$car' />
                    @endforeach
                </div>
            @endif
        </div>

    </div>
