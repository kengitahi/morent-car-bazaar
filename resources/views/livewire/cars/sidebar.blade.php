<form wire.submit="searchCars" class="space-y-8">
    <div class="">
        <h2 class="text-secondary-500 font-bold text-2xl mb-4">Type</h2>
        <div class="space-y-2">
            @foreach($carTypesCount as $carType)
            <div class="flex items-center gap-2">
                <input type="checkbox" id="{{ $carType->type }}" name="carType" value="{{ $carType->type }}" wire:model="selectedCarTypes.{{$carType->type}}" />
                <label for="{{ $carType->type }}">
                    <span class="capitalize">{{ $carType->type }} </span>
                    <span class="text-secondary-400">({{ $carType->count }})</span>
                </label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="">
        <h2 class="text-secondary-500 font-bold text-2xl mb-4">Capacity</h2>
        <div class="space-y-2">
            @foreach($carCapacitiesCount as $carCapacity)
            <div class="flex items-center gap-2">
                <input type="checkbox" id="{{ $carCapacity->capacity }}" name="carType" value="{{ $carCapacity->capacity }}" wire:model="selectedCapacities.{{$carCapacity->capacity}}" />
                <label for="{{ $carCapacity->capacity }}">
                    <span class="capitalize">{{ $carCapacity->capacity }} People</span>
                    <span class="text-secondary-400">({{ $carCapacity->count }})</span>
                </label>
            </div>
            @endforeach
        </div>
    </div>

    <x-button label="Search Cars" primary wire:click="searchCars" />
</form>