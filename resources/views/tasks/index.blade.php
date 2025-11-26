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

    <form method="GET" action="{{ route('tasks.index') }}" class="flex items-center space-x-4 mb-6">
        <div>
            <label for="keyword" class="block text-sm font-medium text-gray-700">Keyword</label>
            <input type="text" name="keyword" id="keyword" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:w-64" value="{{ request('keyword') }}">
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:w-40">
                <option value="">All</option>
                @foreach(\App\Enums\TaskStatus::cases() as $status)
                    <option value="{{ $status->value }}" {{ request('status') == $status->value ? 'selected' : '' }}>
                        {{ $status->getTitle() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="user" class="block text-sm font-medium text-gray-700">User</label>
            <select name="user_id" id="user_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:w-40">
                <option value="">All</option>
                @foreach(\App\Models\User::all() as $user)
                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tlačidlo filtrovania -->
        <button type="submit" class="mt-auto px-6 py-2 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-600">
            Filter
        </button>

        <a href="{{ route('tasks.index') }}" class="mt-auto px-6 py-2 bg-gray-500 text-white font-bold rounded-md hover:bg-gray-600">
            Cancel filter
        </a>
    </form>



    <section>
        {{-- table with tasks. and links to edit and delete task --}}
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b text-left">ID</th>
                    <th class="px-4 py-2 border-b text-left">Title</th>
                    <th class="px-4 py-2 border-b text-left">Description</th>
                    <th class="px-4 py-2 border-b text-left">User</th>
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
                        <td class="px-4 py-2 border-b">{{ $task->user->name }}</td>
                        <td class="px-4 py-2 border-b w-24">
                            <span class="{{ $task->statusEnum->cssClass() }} px-2 py-1 rounded-full text-sm">{{ $task->statusEnum->getTitle() }}</span>
                        </td>
                        <td class="px-4 py-2 border-b text-right w-32">
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
