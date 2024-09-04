<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

use App\Models\Car;

new #[Title('Add Car')] #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;

    public $name;
    public $description;
    public $type;
    public $capacity;
    public $steering;
    public $regular_price;
    #[Validate('lt:regular_price', message: 'The discount price should be less than the regular price')]
    public $discounted_price;
    public $is_featured;
    public $is_available = true;
    public $fuel;
    public $fuel_capacity;
    public $range;
    public $images = [];

    public function addCar()
    {
        $imagePaths = [];
        foreach ($this->images as $image) {
            $path = $image->store('cars', 'public');
            $imagePaths[] = 'storage/' . $path;
        }
        if ($this->fuel === 'gasoline') {
            $this->range = null;
        }

        if ($this->fuel === 'electric') {
            $this->fuel_capacity = null;
        }

        $validated = $this->validate([
            'name' => ['required', 'string', 'min:2'],
            'description' => ['required', 'string', 'min:20'],
            'type' => 'required',
            'capacity' => 'required',
            'steering' => 'required',
            'regular_price' => ['required', 'integer', 'min:5'],
            'discounted_price' => ['nullable', 'lt:regular_price', 'integer', 'min:5'],
            'is_featured' => 'required',
            'fuel' => 'required',
            'images.*' => ['required', 'mimes:jpg,jpeg,png'],
        ]);

        auth()
            ->user()
            ->cars()
            ->create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'short_description' => $this->description,
                'type' => $this->type,
                'capacity' => $this->capacity,
                'steering' => $this->steering,
                'regular_price' => $this->regular_price,
                'discounted_price' => $this->discounted_price,
                'is_featured' => $this->is_featured,
                'is_available' => $this->is_available,
                'fuel' => $this->fuel,
                'fuel_capacity' => $this->fuel_capacity,
                'range' => $this->range,
                'images' => $imagePaths,
            ]);

        session()->flash('message', 'Car added successfully.');
        $this->redirect(route('home'));
    }
}; ?>

<div class="py-12">
    <div class="mx-auto space-y-4 max-w-7xl sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Add Car</h2>
        <form class="space-y-4 add-car-form" wire:submit="addCar" x-data="carData">
            <x-input label="Car name" name="name" placeholder="Enter the car's name" wire:model="name" />
            <x-textarea label="Description" name="description" placeholder="Enter the car's description"
                wire:model="description" />
            <x-select :options="[
                ['name' => 'Sport', 'id' => 'sport'],
                ['name' => 'SUV', 'id' => 'suv'],
                ['name' => 'Sedan', 'id' => 'sedan'],
                ['name' => 'Hatchback', 'id' => 'hatchback'],
                ['name' => 'MPV', 'id' => 'mpv'],
                ['name' => 'Coupe', 'id' => 'coupe'],
            
                ['name' => 'Other', 'id' => 'other'],
            ]" label="Car Type" name="type" option-label="name" option-value="id"
                placeholder="Select car type" wire:model="type" />
            <div>
                <h2>Select the car's capacity</h2>
                @php
                    $capacities = [2, 4, 6, 8];
                @endphp

                <div class="flex gap-2">
                    @foreach ($capacities as $capacity)
                        <x-radio id="{{ $capacity }}" label="{{ $capacity }}" name="{{ $capacity }}"
                            name="capacity" value="{{ $capacity }}" wire:model="capacity" xl />
                    @endforeach
                </div>
            </div>
            <div>
                <h2>Select the car's steering</h2>
                @php
                    $steering = ['automatic', 'manual'];
                @endphp

                @foreach ($steering as $steering)
                    <x-radio id="{{ $steering }}" label="{{ $steering }}" name="steering" squared
                        value="{{ $steering }}" wire:model="steering" xl />
                @endforeach
            </div>
            <div>
                <h2>Select the car's fuel type</h2>
                <div>
                    <div class="flex items-center gap-2">
                        <input id="gasoline" name="fuel" type="radio" value="gasoline" wire:model.live="fuel">
                        <label for="gasoline">Gasoline</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input id="electric" name="fuel" type="radio" value="electric" wire:model.live="fuel">
                        <label for="electric">Electric</label>
                    </div>

                    @if ($fuel === 'gasoline')
                        <div class="flex flex-col gap-1">
                            <label for=" fuel_capacity">How much fuel can the car hold? (L):</label>
                            <input
                                class="block w-full transition duration-100 ease-in-out border rounded-md shadow-sm form-input border-secondary-300 placeholder-secondary-400 focus:border-primary-500 focus:outline-none focus:ring-primary-500 dark:border-secondary-600 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 sm:text-sm"
                                id="fuel_capacity" name="fuel_capacity" name="fuel_capacity" type="number"
                                wire:model="fuel_capacity">
                        </div>
                    @elseif ($fuel === 'electric')
                        <div class="flex flex-col gap-1">
                            <label for=" range">What is the car's range? (km):</label>
                            <input
                                class="block w-full transition duration-100 ease-in-out border rounded-md shadow-sm form-input border-secondary-300 placeholder-secondary-400 focus:border-primary-500 focus:outline-none focus:ring-primary-500 dark:border-secondary-600 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 sm:text-sm"
                                id="range" name="fuel_capacity" name="range" type="number" wire:model="range">
                        </div>
                    @endif
                </div>
            </div>
            <x-input label="Regular Price per day" name="regular_price" placeholder="Enter the car's regular price"
                wire:model="regular_price" />
            <x-input label="Discounted Price per day" name="discounted_price"
                placeholder="Enter the car's discounted price" wire:model="discounted_price" />
            <div>
                <h2>Do you want to add this car to the featured list?</h2>
                <x-radio id="featured" label="Yes" name="is_featured" value="true" wire:model="is_featured" />
                <x-radio id="featured" label="No" name="is_featured" value="false" wire:model="is_featured" />
            </div>
            <x-input multiple required type="file" wire:model="images" />
            <x-button label="Add New Car" primary wire:click="addCar" />
        </form>
    </div>
