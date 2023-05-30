<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                <a href="{{route('students.add')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Student
                </button></a><br></br>
                <Table class="table-auto w-full border-collapse border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">UserType</th>
                                <th class="px-4 py-2">Group</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr class="text-gray-700">
                                <td class="border px-4 py-2">{{ $student->name }}</td>
                                <td class="border px-4 py-2">{{ $student->email }}</td>
                                <td class="border px-4 py-2">{{ $student->usertype }}</td>
                                <td class="border px-4 py-2">{{ $student->group->name }}</td>
                                <td class="border px-4 py-2" >
                                    <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit"  class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this student?')">DELETE</button>
                                    </form>
                                    <!-- <span class="text-gray-400 mx-2">|</span> -->
                                    <form method="POST" action="{{ route('students.update', $student->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-blue-500 hover:text-blue-700">EDIT</button>
                                    </form>
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