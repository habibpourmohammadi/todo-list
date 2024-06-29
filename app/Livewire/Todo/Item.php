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

        // Dispatches an "update-item" event for the specific to-do item to the current component
        $this->dispatch("update-item-" . $todo->id)->self();

        // Resets the updateStatus and task properties
        $this->reset("updateStatus", "task");
    }

    #[On("update-item-{todo.id}")]
    public function render()
    {
        return view("livewire.todo.item");
    }
}
