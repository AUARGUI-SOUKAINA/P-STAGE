<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-blue-800 dark:text-blue-200 leading-tight">TimeTable</h1>
    </x-slot><br><br>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{route('timetable.create')}}"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Add timetable
                    </button> </a><br><br>
                @foreach ($groups as $group)
                    <h2 class="text-2xl font-bold">{{ $group->name }} Timetables</h2>
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Day</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Start Time</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">End Time</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Teacher</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                            @foreach ($group->timetables as $timetable)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $timetable->day }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $timetable->start_time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $timetable->end_time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $timetable->teacher->name }}</td>                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('timetable.edit', $timetable->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('timetable.destroy', $timetable->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this timetable?')" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>