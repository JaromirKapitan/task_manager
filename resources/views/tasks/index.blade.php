<x-layout>
    <x-slot:title>
        Tasks
    </x-slot:title>

    <header class="mb-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Tasks</h1>
            <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Task</a>
        </div>
    </header>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <section>
        {{-- table with tasks. and links to edit and delete task --}}
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b text-left">ID</th>
                    <th class="px-4 py-2 border-b text-left">Title</th>
                    <th class="px-4 py-2 border-b text-left">Description</th>
                    <th class="px-4 py-2 border-b text-left">Status</th>
                    <th class="px-4 py-2 border-b text-right">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $task->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $task->title }}</td>
                        <td class="px-4 py-2 border-b">{{ $task->description }}</td>
                        <td class="px-4 py-2 border-b">
                            @if($task->status == 'todo')
                                <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-sm">To Do</span>
                            @elseif($task->status == 'doing')
                                <span class="bg-blue-200 text-blue-800 px-2 py-1 rounded-full text-sm">Doing</span>
                            @elseif($task->status == 'done')
                                <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-sm">Done</span>
                            @endif

                        <td class="px-4 py-2 border-b text-right">
                            <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </section>
</x-layout>
