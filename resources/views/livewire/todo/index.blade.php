<div>
    <livewire:todo.create />
    <div class="bg-gray-200 w-3/4 m-auto rounded-lg py-2 px-4 my-2">
        @forelse ($this->todos as $todo)
            <livewire:todo.item :todo="$todo" wire:key="{{ $todo->id }}" />
        @empty
            <div class="bg-red-100 border text-center border-red-300 text-red-600 px-4 py-2 rounded relative"
                role="alert">
                <span class="block sm:inline">
                    Your task list is empty !
                </span>
            </div>
        @endforelse
        {{ $this->todos->links() }}
    </div>
</div>
