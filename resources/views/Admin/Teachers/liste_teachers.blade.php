<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teachers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                <a href="{{route('teachers.add')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Teacher
                </button></a>
                <!-- <a href="{{route('timetable.create')}}"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        ADD TIMETABLE
                </button></a> -->
                <br></br>
                <Table class="table-auto w-full border-collapse border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">UserType</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                            <tr class="text-gray-700">
                                <td class="border px-4 py-2">{{ $teacher->name }}</td>
                                <td class="border px-4 py-2">{{ $teacher->email }}</td>
                                <td class="border px-4 py-2">{{ $teacher->usertype }}</td>
                                <td class="border px-4 py-2" >
                                    <form method="POST" action="{{ route('teachers.destroy', $teacher->id) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this teacher?')" class="text-red-500 hover:text-red-700">DELETE</button>
                                    </form>

                                    
                                    <button type="submit" class="text-blue-500 hover:text-blue-700">EDIT</button>
                                    <!-- </form> -->
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>       
                </Table>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>