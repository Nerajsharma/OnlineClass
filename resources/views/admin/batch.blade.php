<x-app-layout>
    <div class="batch_outer">
        <div class="batch_wapper">
            <div class="batch_cover">
                <div class="flex w-full items-center justify-end pr-8">
                    <button class="modelbtn w-fit rounded-lg bg-cyan-500 px-8 py-2 font-bold"
                        modeltarget="addbatchform">Add
                        Batch</button>
                </div>

                <div id="addbatchform" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-75">
                    <div class="w-96 overflow-hidden rounded-lg bg-white shadow-lg">
                        <h2 class="mb-4 bg-blue-400 py-2 text-center text-xl font-bold text-white">Add Batches</h2>
                        <div class="model_boxs p-6">
                            <form action="{{ route('batches.store') }}" method="post">
                                @csrf
                                <input type="text" name="batch_name" id="batch_name" placeholder="Batch Name"
                                    required class="mb-3 w-full rounded border border-slate-400"><br>
                                <input type="text" name="batch_cource" id="batch_cource" placeholder="Batch Courses"
                                    required class="mb-3 w-full rounded border border-slate-400"><br>
                                <input type="text" name="batch_duration" id="batch_duration"
                                    placeholder="Batch Courses Duration" required
                                    class="mb-3 w-full rounded border border-slate-400"><br>
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

                <div class="batch_table">
                    <div class="batch_table_cover">
                        <table class="mt-6 w-full border-collapse overflow-hidden rounded-md bg-slate-100 text-center">
                            <thead class="overflow-hidden rounded-t-md bg-slate-300">
                                <tr class="">
                                    <th class="py-3">Created At</th>
                                    <th class="py-3">Batch Name</th>
                                    <th class="py-3">Cources</th>
                                    <th class="py-3">Duration</th>
                                    <th class="py-3">Total no </th>
                                    <th class="py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($batches as $batch)
                                    <tr class="border-b border-b-slate-300">
                                        <td class="py-2">{{ $batch->created_at }}</td>
                                        <td class="py-2">{{ $batch->batch_name }}</td>
                                        <td class="py-2">{{ $batch->batch_cource }}</td>
                                        <td class="py-2">{{ $batch->batch_duration }} Hrs</td>
                                        <td class="py-2">
                                            {{ $bathcstd[$batch->batch_name] ?? 0 }}</td>
                                        <td class="py-2">
                                            <a href="" target="_blank">
                                                <button
                                                    class="mx-1 rounded bg-teal-500 px-4 py-1 hover:bg-teal-600 hover:font-bold">view</button>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="bg-blue-500 py-4 text-center text-white">No batches
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
    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('modal').classList.remove('flex');
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
</x-app-layout>
