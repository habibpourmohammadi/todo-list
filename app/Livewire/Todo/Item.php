<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;

class Item extends Component
{
    /**
     * The Todo instance.
     *
     * @var \App\Models\Todo
     */
    public Todo $todo;
}
