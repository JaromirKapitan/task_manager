<aside class="w-64 bg-gray-800 text-white flex flex-col">
    <div class="p-4 text-lg font-bold">Admin Panel</div>
    <nav class="flex-1">
        <ul>
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a></li>
            <li><a href="{{ route('tasks.index') }}" class="block px-4 py-2 hover:bg-gray-700">Tasks</a></li>
            {{--            <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Users</a></li>--}}
            {{--            <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Settings</a></li>--}}
        </ul>
    </nav>
    <div class="p-4">
        {{--        <a href="#" class="block px-4 py-2 bg-red-500 text-center rounded hover:bg-red-600">Logout</a>--}}
    </div>
</aside>
