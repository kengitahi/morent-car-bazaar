<?php

namespace App\Livewire\Cars;

use App\Models\Car;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class Singlecategory extends Component
{

    public $carType;
    public function mount($type)
    {
        $this->carType = $type;
    }
    public function render()
    {
        return view(
            'livewire.cars.singlecategory',
            [
                'carsInCategory' => Car::where('type', $this->carType)->paginate(12),
                'carType' => $this->carType
            ]
        )->title('Car Type : ' . $this->carType);
    }
}
