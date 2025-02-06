<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div>
        <div class="container mx-auto">
            <h1 class="text-xl font-bold"> Student's Table</h1>
            <table
                class="h-full w-full table-auto border-collapse overflow-hidden rounded-lg bg-gray-50 text-center shadow-md">
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
                            <td class="p-1 text-sm">
                                @if ($user->status == 'block' || $user->status == 'pending')
                                    <form action="{{ route('users.approve', $user->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="rounded bg-blue-500 px-4 py-2 text-white">Approve</button>
                                    </form>
                                @elseif ($user->status == 'active')
                                    <form action="{{ route('users.block', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="rounded bg-red-500 px-4 py-2 text-white">Block</button>
                                    </form>
                                @endif
                                <a href="{{ route('users.edit', $user->id) }}">
                                    <button class="rounded bg-green-500 px-4 py-2 text-white">Edit </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
