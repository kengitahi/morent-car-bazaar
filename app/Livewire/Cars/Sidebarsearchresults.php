<?php

namespace App\Livewire\Cars;

use Livewire\Component;

use Illuminate\Http\Request;

class Sidebarsearchresults extends Component
{

    public $carCapacities;
    public $carTypes;

    public function mount(Request $request)
    {
        $carCapacities = $request->get('carCapacities');
        $carTypes = $request->get('carTypes');
    }
    public function render()
    {
        return view(
            'livewire.cars.sidebarsearchresults',
            [
                'carCapacities' => $this->carCapacities,
                'carTypes' => $this->carTypes
            ]
        )->title('Search Cars');
    }
}
