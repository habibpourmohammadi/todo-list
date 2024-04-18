<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class Item extends Component
{
    /**
     * The Todo instance.
     *
     * @var \App\Models\Todo
     */
    public Todo $todo;

    /**
     * Change the completion status of a todo task.
     */
    public function changeStatus(Todo $todo)
    {
        // Update the completion status of the todo task
        $todo->update([
            "completion_status" => $todo->completion_status == "completed" ? "not_completed" : "completed"
        ]);

        // Dispatch the "update-list" and "update-item" events to update the todo list
        $this->dispatch("update-list");
        $this->dispatch("update-item");
    }

    /**
     * Delete the specified todo item.
     */
    public function delete(Todo $todo)
    {
        $todo->delete();
        $this->dispatch("update-list");
    }

    #[On("update-item")]
    public function render()
    {
        return view("livewire.todo.item");
    }
}
