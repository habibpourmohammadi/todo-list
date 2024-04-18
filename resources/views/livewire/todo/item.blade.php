<div class="bg-white rounded-md shadow-sm my-4">
    <div class="flex items-center justify-between py-2 px-2">
        <section class="flex items-center">
            <section>
                <input id="task-{{ $todo->id }}" type="checkbox"
                    class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
            </section>
            <label for="task-{{ $todo->id }}" class="ms-3">
                <small class="font-medium {{ $todo->completion_status == 'completed' ? 'line-through' : '' }}">
                    {{ $todo->task }}
                </small>
                <br>
                <small>{{ $todo->created_at }}</small>
            </label>
        </section>
        <section>
            <button class="bg-gray-200 py-1 px-2 rounded-md">
                <i class="fa fa-trash"></i>
            </button>
            <button class="bg-gray-200 py-1 px-2 rounded-md ms-1">
                <i class="fa fa-pen"></i>
            </button>
        </section>
    </div>
</div>
