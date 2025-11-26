<x-layout>
    <x-slot:title>
        {{ isset($model->id) ? 'Update Task' : 'Create Task' }}
    </x-slot:title>

    <header class="mb-6">
        <h1 class="text-2xl font-bold">{{ isset($model->id) ? 'Update Task' : 'Create Task' }}</h1>
    </header>
    <section>

        <form action="{{ isset($model->id) ? route('tasks.update', $model) : route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @if(isset($model->id))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $model->title) }}" class="w-full px-3 py-2 border rounded" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description *</label>
                <textarea name="description" id="description" class="w-full px-3 py-2 border rounded" required>{{ old('description', $model->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold mb-2">Status *</label>
                <select name="status" id="status" class="w-full px-3 py-2 border rounded" required>
                    <option value="todo" {{ old('status', $model->status) == 'todo' ? 'selected' : '' }}>To Do</option>
                    <option value="doing" {{ old('status', $model->status) == 'doing' ? 'selected' : '' }}>Doing</option>
                    <option value="done" {{ old('status', $model->status) == 'done' ? 'selected' : '' }}>Done</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deadline_at" class="block text-gray-700 font-bold mb-2">Deadline at</label>
                <input type="date" name="deadline_at" id="deadline_at" value="{{ old('title', $model->title) }}" class="w-full px-3 py-2 border rounded">
                @error('deadline_at')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    {{ isset($model->id) ? 'Update Task' : 'Create Task' }}
                </button>
            </div>
        </form>
    </section>
</x-layout>
