<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div class="cover">
        <div class="outer">
            @if (Auth::user()->role == 'admin')
                <div class="buttons relative flex justify-end gap-4 px-4 pb-4 text-right">
                    <button
                        class="modelbtn right-500 rounded-lg bg-blue-500 px-6 py-3 text-white shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="addButton" modeltarget="add_classform">
                        Add Class
                    </button>
                    <div class="model_box_wapper" id="add_classform">
                        <div class="model_box_cover">
                            <h2 class="model_header">Add Class</h2>
                            <div class="model_box">
                                <form id="dynamicForm" action="{{ route('classes.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-4 text-left">
                                        <label for="classlink"
                                            class="placeholder-Add class link mb-1 block text-left text-gray-700"></label>
                                        <input type="text" id="classlink" name="classlink"
                                            placeholder="Enter class link"
                                            class="w-full rounded-md border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            required>
                                    </div>
                                    <div class="mb-5">
                                        <select name="link_batch" id="link_batch" class="w-full cursor-pointer"
                                            required>
                                            <option value="Select Batch" readonly disabled selected>Select Batch
                                            </option>
                                            @foreach ($classbatch as $cbatch)
                                                <option value="{{ $cbatch->id }}">{{ $cbatch->batch_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" id="cancelButton"
                                            class="closeModal rounded-lg bg-red-500 px-6 py-2 text-white shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                                            cancel
                                        </button>
                                        <button type="submit"
                                            class="rounded-lg bg-green-500 px-6 py-2 text-white shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                                            Add Class
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <a href="https://meet.google.com/new?hs=180&authuser=0" target="_blank">
                        <button
                            class="rounded-lg bg-red-500 px-6 py-3 text-white shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Create Class
                        </button>
                    </a>
                </div>
            @endif
            <div class="wrapper">
                @php
                    $user = Auth::user();
                    $role = $user->role;
                    $usercource = $user->cource;
                @endphp
                <table class="w-full overflow-auto">
                    <thead class="w-full overflow-auto">
                        <tr class="">
                            <th class="text-black">Class ID</th>
                            @if ($role === 'admin')
                                <th class="text-black">Batch</th>
                            @endif
                            <th class="text-black">Start Date</th>
                            <th class="text-black">End Date</th>
                            <th class="text-black">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meet as $class)
                            @if ($class['link_batch'] === $usercource || $role === 'admin')
                                <tr>
                                    <td class="text-black">{{ str_pad($class['id'], 4, '0', STR_PAD_LEFT) }}</td>
                                    @if ($role === 'admin')
                                        <td class="text-black">{{ $class->batch->batch_name}}</td>
                                    @endif
                                    <td class="text-black">{{ $class->starttime }}</td>
                                    <td class="text-black">
                                        @if ($class->status === 'active')
                                            Running
                                        @else
                                            {{ $class->endtime }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex flex-col justify-center gap-2 text-black md:flex-row">
                                            @if ($class->status !== 'ended')
                                                <a href="{{ $class->classlink }}">
                                                    <button
                                                        class="rounded bg-green-500 px-8 py-1 text-white">Join</button>
                                                </a>

                                                @if ($role === 'admin')
                                                    <a href="{{ route('classes.end', $class->id) }}">
                                                        <button
                                                            class="rounded bg-red-500 px-8 py-1 text-white">End</button>
                                                    </a>
                                                @endif
                                            @else
                                                {{ $class->status }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-app-layout>
