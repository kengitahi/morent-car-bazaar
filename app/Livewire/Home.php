<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

use App\Models\Car;

#[Title('Home')]
class Home extends Component
{
    public function render()
    {
        return view(
            'livewire.app.home',
            [
                'popularCars' => Car::where('is_featured', '=', '1')->paginate(4),
                'allCars' => Car::paginate(12)

            ]
        );
    }
}
