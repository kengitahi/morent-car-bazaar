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
        $this->singleCar = Car::findOrFail($car);
    }
    public function render()
    {
        return view(
            'livewire.cars.singlecar',
            [
                'recentCars' => Car::where('is_featured', '=', 'true')->orderBy('created_at', 'asc')->paginate(4),
                'allCars' => Car::paginate(8)

            ]
        );
    }
}
