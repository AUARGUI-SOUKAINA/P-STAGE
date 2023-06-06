<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-blue-800 dark:text-blue-200 leading-tight">
            {{ __('Create Timetable') }}
        </h3>
    </x-slot>

    <div class="py-8">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8"> 
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <form action="{{ route('timetable.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="teacher_id" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Teacher:</label>
                        <select name="teacher_id" id="teacher_id" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="group_id" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Group:</label>
                        <select name="group_id" id="group_id" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="day" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Day:</label>
                        <select name="day" id="day" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>                   
                    </div>
                    <div class="mb-4">
                        <label for="start_time" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Start Time:</label>
                        <input class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start_time" name="start_time" type="time" required>                    </div>
                    <div class="mb-4">
                        <label for="end_time" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">End Time:</label>
                        <input class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end_time" name="end_time" type="time" required>                    </div>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
