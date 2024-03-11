<?php

namespace App\Livewire\Cars;

use Livewire\Component;
use App\Models\Car;

class Searchresults extends Component
{
    public $searchedCars;
    public $searchTerm;

    public function mount($term)
    {

        $this->searchTerm = $term;
        $this->searchedCars = Car::where('name', 'like', '%' . $term . '%')
            ->orWhere('short_description', 'like', '%' . $term . '%')
            ->get();
    }

    public function render()
    {

        return view('livewire.cars.searchresults')
            ->title("Search results for $this->searchTerm");
    }
}
