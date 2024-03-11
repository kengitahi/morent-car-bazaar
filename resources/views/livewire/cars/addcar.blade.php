<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


new
    #[Title("Add Car")]
    #[Layout("layouts.app")]
    class extends Component
    {

        use WithFileUploads;

        public $name;
        public $description;
        public $type;
        public $capacity;
        public $steering;
        public $regular_price;
        #[
            Validate('lt:regular_price', message: 'The discount price should be less than the regular price')
        ]

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
                'discounted_price' => ['lt:regular_price', 'integer', 'min:5'],
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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
        <h2 class="text-lg font-semibold">Add Car</h2>
        <form x-data="carData" class="space-y-4 add-car-form" wire:submit="addCar">
            <x-input label="Car name" name="name" placeholder="Enter the car's name" wire:model="name" />
            <x-textarea label="Description" name="description" placeholder="Enter the car's description" wire:model="description" />
            <x-select label="Car Type" placeholder="Select car type" name="type" :options="[
                    ['name' => 'Sport', 'id' => 'sport'],
                    ['name' => 'SUV', 'id' => 'suv'],
                    ['name' => 'Sedan', 'id' => 'sedan'],
                    ['name' => 'Hatchback', 'id' => 'hatchback'],
                    ['name' => 'MPV', 'id' => 'mpv'],
                    ['name' => 'Coupe', 'id' => 'coupe'],

                    ['name' => 'Other', 'id' => 'other'],
                ]" option-label="name" option-value="id" wire:model="type" />
            <div>
                <h2>Select the car's capacity</h2>
                @php
                $capacities = [2, 4, 6, 8];
                @endphp

                <div class="flex gap-2">
                    @foreach($capacities as $capacity)
                    <x-radio id="{{$capacity}}" name="{{$capacity}}" label="{{$capacity}}" value="{{$capacity}}" xl name="capacity" wire:model="capacity" />
                    @endforeach
                </div>
            </div>
            <div>
                <h2>Select the car's steering</h2>
                @php
                $steering = ["automatic", "manual"];
                @endphp

                @foreach($steering as $steering)
                <x-radio id="{{$steering}}" squared label="{{$steering}}" value="{{$steering}}" xl name="steering" wire:model="steering" />
                @endforeach
            </div>
            <div>
                <h2>Select the car's fuel type</h2>
                <div>
                    <div class="flex items-center gap-2">
                        <input wire:model.live="fuel" name="fuel" type="radio" value="gasoline" id="gasoline">
                        <label for="gasoline">Gasoline</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input wire:model.live="fuel" name="fuel" type="radio" value="electric" id="electric">
                        <label for="electric">Electric</label>
                    </div>

                    @if ($fuel === 'gasoline')
                    <div class="flex flex-col gap-1">
                        <label for=" fuel_capacity">How much fuel can the car hold? (L):</label>
                        <input wire:model="fuel_capacity" name="fuel_capacity" type="number" id="fuel_capacity" name="fuel_capacity" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm">
                    </div>
                    @elseif ($fuel === 'electric')
                    <div class="flex flex-col gap-1">
                        <label for=" range">What is the car's range? (km):</label>
                        <input wire:model="range" name="fuel_capacity" type="number" id="range" name="range" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm">
                    </div>
                    @endif
                </div>
            </div>
            <x-input label="Regular Price per day" name="regular_price" placeholder="Enter the car's regular price" wire:model="regular_price" />
            <x-input label="Discounted Price per day" name="discounted_price" placeholder="Enter the car's discounted price" wire:model="discounted_price" />
            <div>
                <h2>Do you want to add this car to the featured list?</h2>
                <x-radio id="featured" label="Yes" wire:model="is_featured" name="is_featured" value="true" />
                <x-radio id="featured" label="No" wire:model="is_featured" name="is_featured" value="false" />
            </div>
            <x-input type="file" wire:model="images" multiple required />
            <x-button label="Add New Car" primary wire:click="addCar" />
        </form>
    </div>