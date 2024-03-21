<div class="grid grid-cols-[1fr_5fr] mt-8">
    <livewire:cars.sidebar />
    <div class="space-y-2">
        <h2 class="text-secondary-500 font-bold text-2xl capitalize">All {{$carType}} Cars For Rent</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($carsInCategory as $car)
            <x-morent.cards.singleCar :car='$car' />
            @endforeach
        </div>
    </div>

</div>