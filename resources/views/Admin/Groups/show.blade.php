<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 dark:text-blue-200 leading-tight">
            {{ $group->name }} Students
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($students->count() === 0)
                            <p>No students found in this group.</p>
                    @else
                    <a href="{{ route('pdf.group.student',['groupId' => $group->id]) }}">
                    <button>
                        <img src="/pdf.png" alt="pdf" class="w-10 h-10 ml-2">
                    </button>
                    </a>
                    <table class="table-auto w-full border-collapse border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr class="text-gray-700">
                                    <td class="border px-4 py-2">{{ $student->id }}</td>
                                    <td class="border px-4 py-2">{{ $student->name }}</td>
                                    <td class="border px-4 py-2">{{ $student->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>