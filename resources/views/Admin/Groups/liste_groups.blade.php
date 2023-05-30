<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    @if (Auth::user()->usertype === 'admin')
                        <a href="{{ route('groups.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Group
                        </a><br><br>
                    @endif
                    <ul class="list-disc">
                        @foreach ($groups as $group)
                            <li class="flex items-center">
                            <div class="flex items-center justify-between">
                                <a href="{{ route('groups.show', $group->id) }}" class="text-gray-500 hover:underline">{{ $group->name }}</a>
                                @if (Auth::user()->usertype === 'admin')
                                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Are you sure you want to delete this Group?')">Delete</button>
                                    </form>
                                @endif
                        </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
