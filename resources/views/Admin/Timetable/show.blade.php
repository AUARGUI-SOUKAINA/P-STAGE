<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-blue-800 dark:text-blue-200 leading-tight">TimeTables</h1>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{route('timetable.create')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add timetable
                    </button> </a><br><br>
                @foreach ($groups as $group)
                <div class="flex items-center">
                    <h2 class="text-2xl font-bold text-blue-800">{{ $group->name }} Timetable</h2>
                    <a href="{{ route('pdf.timetable.group', ['groupId' => $group->id]) }}">
                    <img src="/pdf.png" alt="pdf" class="w-10 h-10 ml-2">
                    </a>
                </div>
                    <br><br>
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
                                    <td class="border px-4 py-2">{{ $timetable->day }}</td>
                                    <td class="border px-4 py-2">{{ $timetable->start_time }}</td>
                                    <td class="border px-4 py-2">{{ $timetable->end_time }}</td>
                                    <td class="border px-4 py-2">{{ $timetable->teacher->name }}</td>                                    
                                    <td class="border px-4 py-2">
                                    <a href="{{ route('timetable.edit', $timetable->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <span class="text-gray-400 mx-2">|</span>
                                    <form action="{{ route('timetable.destroy', $timetable->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this timetable?')" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br><br>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
