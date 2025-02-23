<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div>
        <div class="student_filter_wapper">
            <div class="student_filter_cover">
                <header class="rounded-lg border border-neutral-200/20 bg-white p-4" id="el-tgwaha8z">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-gray-800" id="el-qqege6lk">Students</h1>
                        <div class="w-fit">
                            <select
                                class="cursor-pointer w-[130px] rounded-lg border border-neutral-200/30 p-2 focus:border-blue-500 focus:outline-none"
                                id="filterstdbatch">
                                <option selected readonly>All Batches</option>
                                @foreach ($stbatches as $selbatch)
                                    <option>{{ $selbatch->batch_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=""><select
                                class="cursor-pointer w-[130px] rounded-lg border border-neutral-200/30 p-2 focus:border-blue-500 focus:outline-none"
                                id="filterstdstatus">
                                <option>All Status</option>
                                <option>Pending</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select></div>
                        <div class="flex items-center space-x-4" id="el-mqkbt0lp">
                            <div class="relative" id="el-lk0ifdwo">
                                <input type="search" placeholder="Search students..."
                                    class="rounded-lg border border-neutral-200/30 py-2 pl-10 pr-4 focus:border-blue-300 focus:outline-none"
                                    id="filterstdname">
                                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" id="el-5sbujoin">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <button
                                class="rounded-lg bg-blue-500 px-4 py-2 text-white transition-colors hover:bg-blue-600"
                                id="el-rjy48wx2">
                                Add Student
                            </button>
                        </div>
                    </div>
                </header>
            </div>
        </div>
        <div class="container overflow-x-auto overflow-y-hidden">
            <table class="h-full w-full table-auto border-collapse rounded-lg bg-gray-50 text-center shadow-md" id="studenttable">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Date</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Contact No</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Role</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">System</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Batch</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="overflow-hidden border-t hover:bg-gray-200">
                            <td class="p-1 text-sm text-black">{{ $user->created_at }}</td>
                            <td class="p-1 text-sm text-black">{{ $user->name }}</td>
                            <td class="p-1 text-sm text-black">{{ $user->email }}</td>
                            <td class="p-1 text-sm text-black">{{ $user->contact }}</td>
                            <td class="p-1 text-sm text-black">{{ $user->role }}</td>
                            <td class="p-1 text-sm text-black">{{ $user->system }}</td>
                            <td
                                class="@if ($user->status == 'active') bg-green-200 @elseif ($user->status == 'pending') bg-yellow-200 @elseif ($user->status == 'block') bg-red-200 @endif p-1 text-sm font-bold capitalize text-black">
                                {{ $user->status }}</td>
                            <td class="p-1 text-sm text-black">{{ $user->cource }}</td>
                            <td class="p-1 text-sm text-black">
                                <div class="flex flex-col gap-2">
                                    @if ($user->status == 'block' || $user->status == 'pending')
                                        <form action="{{ route('users.approve', $user->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="rounded bg-blue-500 px-4 py-2 text-white">Approve</button>
                                        </form>
                                    @elseif ($user->status == 'active')
                                        <form action="{{ route('users.block', $user->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="rounded bg-red-500 px-4 py-2 text-white">Block</button>
                                        </form>
                                    @endif
                                    <a href="{{ route('users.edit', $user->id) }}">
                                        <button class="rounded bg-green-500 px-4 py-2 text-white">Edit </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
