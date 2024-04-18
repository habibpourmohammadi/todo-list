<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    /**
     * Compute and return the list of todos.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    #[On("update-list")]
    #[Computed()]
    public function todos()
    {
        return Todo::latest()->get();
    }
}
