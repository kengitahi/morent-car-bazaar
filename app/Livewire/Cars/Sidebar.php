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

        // redirect(route(
        //     'cars.sidebarsearchresults',
        //     [
        //         $carCapacities[] = $this->selectedCapacities,
        //         $carTypes[] = $this->selectedCarTypes
        //     ]
        // ));
        $carCapacities = $this->selectedCapacities;
        $carTypes = $this->selectedCarTypes;

        dd($carCapacities, $carTypes);
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
