<x-app-layout>
    <div class="cover">
        <div class="outer">
            <div class="buttons relative px-4 pb-4 text-right">
                <button
                    class="right-500 rounded-lg bg-blue-500 px-6 py-3 text-white shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    id="addButton">
                    Add Class
                </button>
                <form id="dynamicForm" action="{{ route('classes.store') }}" method="POST"
                    class="top-13 absolute right-3 mt-2 hidden w-80 rounded-lg bg-white p-6 px-4 shadow-md">
                    @csrf
                    <div class="mb-4 text-left">
                        <label for="classlink"
                            class="placeholder-Add class link mb-1 block text-left text-gray-700"></label>
                        <input type="text" id="classlink" name="classlink" placeholder="Enter class link"
                            class="w-full rounded-md border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required>
                    </div>
                    <div class="mb-5">
                        <select name="link_batch" id="link_batch" class="w-full cursor-pointer" required>
                            <option value="Select Batch" readonly disabled selected>Select Batch</option>
                            <option value="Frontend">Frontend</option>
                            <option value="Backend">Backend</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="rounded-lg bg-green-500 px-6 py-2 text-white shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                            Add Class
                        </button>
                        <button type="button" id="cancelButton"
                            class="rounded-lg bg-red-500 px-6 py-2 text-white shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                            cancel
                        </button>
                    </div>
                </form>
                <a href="https://meet.google.com/new?hs=180&authuser=0" target="_blank">
                    <button
                        class="rounded-lg bg-red-500 px-6 py-3 text-white shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Create Class
                    </button>
                </a>
            </div>
            <div class="wrapper">
                <table class="h-100% w-100% min-w-full table-auto border-collapse rounded-lg bg-gray-50/50 shadow-md">
                    <thead class="bg-orange-200">
                        <tr class="border-collapse rounded-lg border-r-2 text-center">
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">Class ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">Batch</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">Start Date</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">End Date</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($meet as $class)
                            <tr class="bg-gray-100">
                                <td class="px-6 py-3 font-medium text-black">{{ $class['id'] }}</td>
                                <td class="px-6 py-3 font-medium text-black">{{ $class['link_batch'] }}</td>
                                <td class="px-6 py-3 font-medium text-black">{{ $class->starttime }}</td>
                                <td class="px-6 py-3 font-medium text-black">
                                    @if ($class->status == 'active')
                                        {{ 'Running' }}
                                    @else
                                        {{ $class->endtime }}
                                    @endif
                                </td>
                                <td class="px-6 py-3 font-medium text-black">
                                    @php
                                        $user = Auth::user();
                                        $role = $user->role;
                                    @endphp

                                    @if ($class->status == 'ended')
                                        {{ $class->status }}
                                    @else
                                        <a href="{{ $class->classlink }}" class="">
                                            <button class="rounded bg-green-500 px-8 py-1 text-white">Join</button>
                                        </a>

                                        @if ($role == 'admin')
                                            <!-- Check if role is 'admin' -->
                                            <a href="{{ route('classes.end', $class->id) }}" class="">
                                                <button class="rounded bg-red-500 px-8 py-1 text-white">End</button>
                                            </a>
                                        @endif
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-app-layout>
