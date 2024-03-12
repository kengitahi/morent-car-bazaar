<?php

namespace Illuminate\Contracts\View;

use Illuminate\Contracts\Support\Renderable;
use App\Models\Car;

interface View extends Renderable
{
    /** @return static */
    public function extends();
    public function title();
    public function cars();
}
