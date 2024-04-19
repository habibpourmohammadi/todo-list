<div class="mt-8">
    <form wire:submit="create" class="flex sm:flex-row flex-col-reverse justify-between w-3/4 m-auto">
        <section class="sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-28">
            <button type="submit"
                class="bg-blue-600 text-white font-medium sm:text-sm py-2.5 px-5 rounded-lg delay-75 transition-all hover:bg-blue-800">Add
                Task</button>
        </section>
        <section class="sm:w-3/4 md:w-3/4 xl:w-3/4 my-2 sm:my-0">
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-sans"
                placeholder="Write your task..." wire:model="task" />
            @error('task')
                <span class="text-red-500 font-bold ms-1"><small>{{ $message }}</small></span>
            @enderror
            <div class="mt-1">
                @if (session('success-alert'))
                    <span
                        class="text-green-500 font-bold ms-1 font-mono"><small>{{ session('success-alert') }}</small></span>
                @endif
            </div>
        </section>
        <section class="xl:ms-2">
            <select wire:change="sendFilter" wire:model="filter" id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="all">All</option>
                <option value="completed">Completed</option>
                <option value="not_completed">Not completed</option>
            </select>
        </section>
    </form>
</div>
