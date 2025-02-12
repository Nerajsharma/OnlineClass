<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @endif
    </script>

    <div class="batch_outer">
        <div class="batch_wapper">
            <div class="batch_cover">
                <div class="flex w-full items-center justify-end pr-8">
                    <button class="modelbtn w-fit rounded-lg bg-cyan-500 px-8 py-2 font-bold"
                        modeltarget="addbatchform">Add
                        Batch</button>
                </div>

                <div id="addbatchform" class="model_box_wapper">
                    <div class="model_box_cover ">
                        <h2 class="model_header">Add Batches</h2>
                        <div class="model_box">
                            <form action="{{ route('batches.store') }}" method="post">
                                @csrf
                                <input type="text" name="batch_name" id="batch_name" placeholder="Batch Name"
                                    required class="mb-3 w-full rounded border border-slate-400"><br>

                                <input type="text" name="batch_cource" id="batch_cource" placeholder="Batch Courses"
                                    required class="mb-3 w-full rounded border border-slate-400"><br>

                                <input type="text" name="batch_duration" id="batch_duration"
                                    placeholder="Batch Courses Duration" required
                                    class="mb-3 w-full rounded border border-slate-400"><br>
                                {{-- <input type="text" name="batch_host" id="batch_host" placeholder="Batch Host Name"
                                    required class="mb-3 w-full rounded border border-slate-400"><br>

                                <input type="datetime-local" name="batch_expired" id="batch_expired"
                                    placeholder="batch_expired" required
                                    class="mb-3 w-full rounded border border-slate-400"><br> --}}

                                <div class="flex justify-center">
                                    <button type="button"
                                        class="closeModal mr-2 rounded bg-rose-300 px-4 py-2">Cancel</button>
                                    <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Add
                                        Batch</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="batch_table w-full overflow-auto ">
                    <div class="batch_table_cover">
                        <table class="mt-6 w-full border-collapse  rounded-md bg-slate-100 text-center">
                            <thead class=" rounded-t-md bg-slate-300">
                                <tr class="">
                                    <th class="py-3">Code</th>
                                    <th class="py-3">Created At</th>
                                    <th class="py-3">Batch Name</th>
                                    <th class="py-3">Cources</th>
                                    <th class="py-3">Duration</th>
                                    <th class="py-3">Student</th>
                                    {{-- <th class="py-3">Host</th>
                                    <th class="py-3">BY</th>
                                    <th class="py-3">Expired</th> --}}
                                    <th class="py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($batches as $batch)
                                    <tr class="border-b border-b-slate-300">
                                        <td class="py-2">{{ $batch->id }}</td>
                                        <td class="py-2">{{ $batch->created_at }}</td>
                                        <td class="py-2">{{ $batch->batch_name }}</td>
                                        <td class="py-2">{{ $batch->batch_cource }}</td>
                                        <td class="py-2">{{ $batch->batch_duration }} Hrs</td>
                                        <td class="py-2">
                                            {{ $bathcstd[$batch->batch_name] ?? 0 }}</td>
                                        {{-- <td class="py-2">Neeraj</td>
                                        <td class="py-2">Neeraj</td>
                                        <td class="py-2">2081-10-15 10:15:15</td> --}}
                                        <td class="py-2">
                                            <div class=" flex flex-col gap-2"> 
                                            <a href="{{ route('batches.viewdetails', ['id' => $batch->id]) }}">
                                                <button
                                                    class="mx-1 rounded bg-teal-500 px-4 py-1 hover:bg-teal-600 hover:font-bold">
                                                    View
                                                </button>
                                            </a>
                                            {{-- <button
                                                class="mx-1 rounded bg-amber-300 px-4 py-1 hover:bg-amber-600 hover:font-bold">Link</button> --}}
                                            <a href="">
                                                <button
                                                    class="mx-1 rounded bg-rose-500 px-4 py-1 hover:bg-rose-600 hover:font-bold">Delete</button>
                                            </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="bg-blue-500 py-4 text-center text-white">No batches
                                            found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
