<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;
use App\Livewire\Todo\Item;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class Index extends Component
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
     * Change the completion status of a todo task.
     */
    public function changeStatus(Todo $todo)
    {
        // Update the completion status of the todo task
        $todo->update([
            "completion_status" => $todo->completion_status == "completed" ? "not_completed" : "completed"
        ]);

        // Dispatches an "update-item" event to the Item class for the specific to-do item
        $this->dispatch("update-item-" . $todo->id)->to(Item::class);
    }

     /**
     * Delete the specified todo item.
     */
    public function delete(Todo $todo)
    {
        $todo->delete();
    }

    /**
     * Set the filter based on the provided value.
     *
     * @param mixed|null $filter
     * @return void
     */
    public function setFilter($filter = null)
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
    #[On("update-todos")]
    #[Computed()]
    public function todos()
    {
        return Todo::latest()->where($this->query[0], $this->query[1], $this->query[2])->paginate(5);
    }

    public function render()
    {
        return view('livewire.todo.index');
    }
}
