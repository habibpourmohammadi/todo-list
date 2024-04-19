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
     * Array representing the query conditions.
     *
     * @var array
     */
    private array $query = [
        "created_at",
        "!=",
        null
    ];


    /**
     * Handle the update-filter event.
     *
     * @param mixed|null $filter
     * @return void
     */
    #[On("update-filter")]
    public function changeFilter($filter = null)
    {
        $this->setFilter($filter);
    }


    /**
     * Set the filter based on the provided value.
     *
     * @param mixed|null $filter
     * @return void
     */
    private function setFilter($filter = null)
    {
        switch ($filter) {
            case 'all':
                $this->query[0] = "created_at";
                $this->query[1] = "!=";
                $this->query[2] = null;
                break;

            case 'completed':
                $this->query[0] = "completion_status";
                $this->query[1] = "=";
                $this->query[2] = "completed";
                break;

            case 'not_completed':
                $this->query[0] = "completion_status";
                $this->query[1] = "=";
                $this->query[2] = "not_completed";
                break;

            default:
                $this->query[0] = "created_at";
                $this->query[1] = "!=";
                $this->query[2] = null;
                break;
        }
    }


    /**
     * Retrieve the list of todos based on the current filter query.
     */
    #[On("update-list")]
    #[Computed()]
    public function todos()
    {
        return Todo::latest()->where($this->query[0], $this->query[1], $this->query[2])->paginate(5);
    }
}
