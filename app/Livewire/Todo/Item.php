<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Item extends Component
{
    /**
     * The Todo instance.
     *
     * @var \App\Models\Todo
     */
    public Todo $todo;


    /**
     * Indicates whether the status is being updated.
     *
     * @var bool
     */
    public bool $updateStatus = false;

    /**
     * The task input field.
     *
     * @var string
     */
    #[Validate("required|min:2|max:150")]
    public string $task;

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
     * Toggles the update status.
     *
     * @return void
     */
    public function changeUpdateStatus()
    {
        $this->updateStatus = !$this->updateStatus;
        $this->task = $this->todo->task;
    }

    /**
     * Updates the task for the specified todo.
     *
     * @param  Todo  $todo The todo to be updated.
     * @return void
     */
    public function update(Todo $todo)
    {
        // Validates the task input
        $this->validateOnly("task");

        // Updates the task for the todo
        $todo->update([
            "task" => $this->task
        ]);

        // Dispatches the update-item event
        $this->dispatch("update-item");

        // Resets the updateStatus and task properties
        $this->reset("updateStatus", "task");
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
