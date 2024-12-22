<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Task manager') }}</h2>
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" style="float: right;" href="{{ route('tasks.create') }}">Create New Task</a>
            <br/>
            <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
                    <div class="flex space-x-4 text-black">
                        <!-- Priority Filter -->
                        <div>
{{--                            <label for="priority" class="block">Priority</label>--}}
                            <select name="priority" id="priority" class="form-select">
                                <option value="">All</option>
                                <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>High</option>
                            </select>
                        </div>

                        <!-- Status Filter -->
                        <div>
{{--                            <label for="status" class="block">Status</label>--}}
                            <select name="status" id="status" class="form-select">
                                <option value="">All</option>
                                <option value="to-do" {{ request('status') === 'to-do' ? 'selected' : '' }}>To Do</option>
                                <option value="in progress" {{ request('status') === 'in progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="done" {{ request('status') === 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>

                        <!-- Due Date Filter -->
                        <div>
{{--                            <label for="due_date" class="block">Due Date</label>--}}
                            <input type="date" name="due_date" id="due_date" class="form-input" value="{{ request('due_date') }}">
                        </div>
                        <div>
                            <button type="submit"  style="height: 100%; margin-left: 5px;" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Filter</button>
                        </div>
                    </div>
                </form>

                <table class="min-w-full divide-y divide-gray-200 border rounded" style="width: 100%;">
                    <thead class="thead-dark">
                    <tr>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Description</th>
                        <th class="px-6 py-3 text-left">Priority</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Due Date</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ $task->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ $task->description }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    <span style="
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        background-color:
            @if($task->priority === 'low') green
            @elseif($task->priority === 'medium') orange
            @else red @endif;">
        {{ ucfirst($task->priority) }}
                    </span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    <span style="
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 4px;
        background-color: #f0f0f0; /* Light gray background */
        color:
            @if($task->status === 'to-do') gray
            @elseif($task->status === 'in progress') blue
            @else green @endif;">
        {{ ucfirst(str_replace('-', ' ', $task->status)) }}
    </span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ $task->due_date }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                <a href="{{ route('tasks.show', $task->id) }}"
                                   style="padding: 5px 10px; color: blue; border-radius: 4px; text-decoration: none; margin-right: 5px;">
                                    View
                                </a>
                                <a href="{{ route('tasks.edit', $task->id) }}"
                                   style="padding: 5px 10px; color: orange; border-radius: 4px; text-decoration: none; margin-right: 5px;">
                                    Edit
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="padding: 5px 10px; color: red; border: none; border-radius: 4px; cursor: pointer;">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
