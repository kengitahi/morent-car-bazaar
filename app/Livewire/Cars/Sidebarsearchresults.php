<?php

namespace App\Livewire\Cars;

use Livewire\Component;
use App\Models\Car;

use Illuminate\Http\Request;

class Sidebarsearchresults extends Component
{

    public $carCapacities;
    public $carTypes;

    public function mount()
    {
        //If either are empty or null, make them equal to an empty array. Happens when a user reloads the search page after finding results
        $this->carCapacities = session('carCapacities') ?? [];
        $this->carTypes = session('carTypes') ?? [];
    }

    public function getCarsByType(array|null $carTypes)
    {
        $carsOfSpecificType = Car::inCarType($carTypes)->get()->toArray();

        return $carsOfSpecificType;
    }
    public function getCarsByCapacity(array $carCapacities)
    {
        $carsOfSpecificCapacities = Car::inCarCapacity($carCapacities)->get()->toArray();
        return $carsOfSpecificCapacities;
    }

    public function render()
    {

        $searchedCars = array_merge($carsOfSpecificType = $this->getCarsByType($this->carTypes), $carsOfSpecificCapacities = $this->getCarsByCapacity($this->carCapacities));
        return view(
            'livewire.cars.sidebarsearchresults',
            [
                'searchedCars' => array_unique($searchedCars, SORT_REGULAR),
            ]
        )->title('Search Cars');
    }
}
