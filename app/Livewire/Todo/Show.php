<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;


    /**
     * Retrieve paginated todos sorted by latest.
     */
    #[On("update-list")]
    #[Computed()]
    public function todos()
    {
        return Todo::latest()->paginate(5);
    }
}
