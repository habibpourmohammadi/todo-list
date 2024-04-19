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
     * The filter value for the todos.
     *
     * @var string
     */
    public $filter;

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

        // Dispatches the "update-list" event.
        $this->dispatch("update-list");
    }


    /**
     * Send the filter value to update the filter.
     *
     * @return void
     */
    public function sendFilter()
    {
        $this->dispatch("update-filter", $this->filter);
    }
}
