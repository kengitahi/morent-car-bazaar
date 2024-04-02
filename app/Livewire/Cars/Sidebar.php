<?php

namespace App\Livewire\Cars;

use Livewire\Component;
use App\Models\Car;

class Sidebar extends Component
{
    public $selectedCarTypes = [];
    public $selectedCapacities = [];
    public function searchCars()
    {
        return redirect(route('cars.sidebarsearchresults'))
            ->with('carTypes', $this->selectedCarTypes)
            ->with('carCapacities', $this->selectedCapacities);
    }
    public function render()
    {
        return view(
            'livewire.cars.sidebar',
            [
                'carTypesCount' => Car::selectRaw('type, COUNT(*) as count')->groupBy('type')->get(),
                'carCapacitiesCount' => Car::selectRaw('capacity, COUNT(*) as count')->groupBy('capacity')->get(),
            ]

        );
    }
}
