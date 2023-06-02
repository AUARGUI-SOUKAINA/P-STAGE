<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-blue-800 dark:text-blue-200 leading-tight">Edit Timetable</h1>
    </x-slot><br><br>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('timetable.update', $timetable->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="day" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Day:</label>
                            <select name="day" id="day" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                                <option value="">Select Day</option>
                                <option value="Monday" {{ $timetable->day === 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ $timetable->day === 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ $timetable->day === 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ $timetable->day === 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ $timetable->day === 'Friday' ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ $timetable->day === 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="Sunday" {{ $timetable->day === 'Sunday' ? 'selected' : '' }}>Sunday</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Time:</label>
                            <input type="text" name="start_time" id="start_time" value="{{ $timetable->start_time }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>

                        <div class="mb-4">
                            <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Time:</label>
                            <input type="text" name="end_time" id="end_time" value="{{ $timetable->end_time }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>

                        <div class="mb-4">
                            <label for="teacher_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teacher:</label>
                            <select name="teacher_id" id="teacher_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ $timetable->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="group_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Group:</label>
                            <select name="group_id" id="group_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300">
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" {{ $timetable->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-violet-700 hover:bg-violet-800 text-white font-bold py-2 px-4 rounded">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
