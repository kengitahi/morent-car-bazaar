<?php

namespace App\Livewire\Cars;

use Livewire\Attributes\Title;
use App\Models\Car;

use Livewire\Component;

#[Title('Single Car')]

class Singlecar extends Component
{
    public Car $singleCar;

    public function mount($car)
    {
        $this->singleCar = Car::find($car);
    }
    public function render()
    {
        return view(
            'livewire.cars.singlecar',
            [
                'popularCars' => Car::where('is_featured', '=', '1')->orderBy('created_at', 'asc')->paginate(4),
                'allCars' => Car::paginate(8)

            ]
        );
    }
}
