<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1>{{ isset($task) ? 'Edit Task' : 'Create Task' }}</h1>
                <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST">
                    @csrf
                    @if(isset($task))
                        @method('PUT')
                    @endif

                    <label>Name:</label>
                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" type="text" name="name" value="{{ $task->name ?? '' }}">
                    @error('name')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <br>

                    <label>Description:</label>
                    <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="description">{{ $task->description ?? '' }}</textarea>
                    @error('description')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <br>

                    <label>Priority:</label>
                    <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="priority" required>
                        <option value="low" {{ (isset($task) && $task->priority == 'low') ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ (isset($task) && $task->priority == 'medium') ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ (isset($task) && $task->priority == 'high') ? 'selected' : '' }}>High</option>
                    </select>
                    <br>

                    <label>Status:</label>
                    <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="status" required>
                        <option value="to-do" {{ (isset($task) && $task->status == 'to-do') ? 'selected' : '' }}>To-Do</option>
                        <option value="in progress" {{ (isset($task) && $task->status == 'in progress') ? 'selected' : '' }}>In Progress</option>
                        <option value="done" {{ (isset($task) && $task->status == 'done') ? 'selected' : '' }}>Done</option>
                    </select>
                    <br>

                    <label>Due Date:</label>
                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" type="date" name="due_date" value="{{ $task->due_date ?? '' }}">
                    @error('due_date')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <br>

                    <button type="submit">{{ isset($task) ? 'Update' : 'Create' }}</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
