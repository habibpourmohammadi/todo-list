<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    /**
     * Validates and stores the task description for creating a new todo item.
     */
    #[Validate("required|min:2|max:150")]
    public string $task;

    /**
     * Store a newly created todo item.
     *
     * @return void
     */
    public function create()
    {
        // Validate the task input
        $this->validate();

        // Create a new Todo instance with the provided task
        Todo::create([
            "task" => $this->task
        ]);

        // Flash a success message to the session
        session()->flash("success-alert", "Your task has been successfully created");

        // Reset the task input field
        $this->reset("task");
    }
}