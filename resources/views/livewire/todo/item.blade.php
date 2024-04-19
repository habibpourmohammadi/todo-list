<div class="bg-white rounded-md shadow-sm my-4">
    <div class="flex items-center justify-between py-2 px-2">
        <section class="flex items-center">
            <section>
                <input @checked($todo->completion_status == 'completed') wire:change="changeStatus({{ $todo }})"
                    id="task-{{ $todo->id }}" type="checkbox"
                    class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
            </section>
            @if (!$updateStatus)
                <label for="task-{{ $todo->id }}" class="ms-3">
                    <small
                        class="font-medium {{ $todo->completion_status == 'completed' ? 'line-through text-green-500' : '' }}">
                        {{ $todo->task }}
                    </small>
                    <br>
                    <small>{{ $todo->created_at }}</small>
                </label>
            @else
                <input type="text" wire:model="task"
                    class="ms-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 font-sans"
                    value="{{ $todo->task }}">
                <button type="button" wire:click="update({{ $todo }})"
                    class="ms-1 bg-gray-200 py-1 px-2 delay-75 transition-all hover:text-blue-700 rounded-md">
                    <i class="fa fa-pencil-alt"></i>
                </button>
                <button wire:click="changeUpdateStatus" type="button"
                    class="ms-1 bg-gray-200 py-1 px-2 delay-75 transition-all hover:text-red-700 rounded-md">
                    <i class="fa fa-times-circle"></i>
                </button>
            @endif
        </section>
        <section>
            <button type="button" wire:click="changeUpdateStatus"
                class="bg-gray-200 py-1 px-2 delay-75 transition-all hover:text-blue-700 rounded-md ms-1">
                <i class="fa fa-pen"></i>
            </button>
            <button wire:click="delete({{ $todo }})" type="button"
                class="bg-gray-200 py-1 px-2 delay-75 transition-all hover:text-red-700 rounded-md">
                <i class="fa fa-trash"></i>
            </button>
        </section>
    </div>
</div>
