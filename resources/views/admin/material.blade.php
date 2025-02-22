<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div class="material_outer">
        <div class="material_wapper">
            <div class="material_cover">
                @if (Auth::user()->role == 'admin')
                    <div class="flex w-full items-center justify-end">
                        <button class="modelbtn w-fit rounded-lg bg-cyan-500 px-8 py-2 font-bold"
                            modeltarget="addmaterialform">Upload</button>
                    </div>

                    <div id="addmaterialform" class="model_box_wapper">
                        <div class="model_box_cover">
                            <h2 class="model_header">Add materiales</h2>
                            <div class="model_box">
                                <form action="{{ route('materials.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="material_name" id="material_name"
                                        placeholder="Material Name" required
                                        class="mb-3 w-full rounded border border-slate-400"><br>

                                    <label for="material_cource">Batches :</label> <br>
                                    @foreach ($batches as $batch)
                                        <input type="checkbox" name="material_cource[]" value="{{ $batch->id }}"
                                            class="mb-3 mr-2 aspect-square h-auto w-[1.3em] rounded border border-slate-400">
                                        {{ $batch->batch_name }}<br>
                                    @endforeach

                                    <input type="file" name="material_file" id="material_file" required
                                        class="mb-3 w-full rounded border border-slate-400"><br>

                                    <div class="flex justify-center">
                                        <button type="button"
                                            class="closeModal mr-2 rounded bg-rose-300 px-4 py-2">Cancel</button>
                                        <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Add
                                            Material</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                @endif
                <div class="material_table">
                    <div class="material_table_cover">
                        <table class="mt-6 w-full border-collapse overflow-hidden rounded-md bg-slate-100 text-center">
                            <thead class="overflow-hidden rounded-t-md bg-slate-300">
                                <tr class="">
                                    <th class="py-3 text-black">#</th>
                                    <th class="py-3 text-black">File Name</th>
                                    <th class="py-3 text-black">Upload date</th>
                                    <th class="py-3 text-black">Size</th>
                                    @if (Auth::user()->role === 'admin')
                                    <th class="py-3 text-black">Batch</th>
                                    @endif
                                    <th class="py-3 text-black">Upload By</th>
                                    <th class="py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materiales as $item)
                                    <tr class="border-b border-b-slate-300 text-black">
                                        <td class="py-2">{{ $item->id }}</td>
                                        <td class="py-2">{{ $item->material_name }}</td>
                                        <td class="py-2">{{ $item->created_at->format('d M Y') }}</td>
                                        <td class="py-2">{{ $item->file_size }}</td>
                                        @if (Auth::user()->role === 'admin')
                                        <td class="py-2">
                                            @php
                                                // Ensure material_cource is a string before decoding
                                                $batchIds = is_array($item->material_cource)
                                                    ? $item->material_cource
                                                    : json_decode($item->material_cource, true);
                                                    $batches = \App\Models\Batch::whereIn('id', (array) $batchIds)
                                                    ->pluck('batch_name')
                                                    ->implode(', ');
                                                    @endphp
                                            {{ $batches }}
                                        </td>
                                        @endif
                                        <td class="py-2">{{ $item->uploaded_by }}</td>

                                        <td class="py-2 w-fit">
                                            <div class="flex w-fit flex-col md:flex-row"> 
                                            <a href="{{ asset('material/' . $item->material_file) }}" class="w-fit mb-3 mr-2" target="_blank">
                                                <button
                                                    class="mx-1 rounded bg-teal-500 px-4 py-1 hover:bg-teal-600 hover:font-bold">View</button>
                                            </a>
                                            <a href="{{ asset('material/' . $item->material_file) }}"
                                                download="{{ now()->format('Ymd_His') . '_' . $item->material_name }}" class="w-fit">
                                                <button
                                                    class="mx-1 rounded bg-green-500 px-4 py-1 hover:bg-green-600 hover:font-bold">Download</button>
                                            </a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
