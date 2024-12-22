<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1>Task Details</h1>
                <p>Name: {{ $task->name }}</p>
                <p>Description: {{ $task->description }}</p>
                <p>Priority: {{ ucfirst($task->priority) }}</p>
                <p>Status: {{ ucfirst(str_replace('-', ' ', $task->status)) }}</p>
                <p>Due Date: {{ $task->due_date }}</p>
                <a href="{{ route('tasks.index') }}">Back to Task List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
