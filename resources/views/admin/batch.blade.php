<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
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
                    <div class="model_box_cover">
                        <h2 class="model_header">Add Batches</h2>
                        <div class="model_box">
                            <form action="{{ route('batches.store') }}" method="post">
                                @csrf
                                <input type="text" name="batch_name" id="batch_name" placeholder="Batch Name"
                                    required class="mb-3 w-full rounded border border-slate-400" title="Batch name"><br>

                                <input type="text" name="batch_cource" id="batch_cource" placeholder="Batch Courses"
                                    required class="mb-3 w-full rounded border border-slate-400"
                                    title="Batch cource"><br>

                                <input type="text" name="batch_duration" id="batch_duration"
                                    placeholder="Batch Courses Duration" required
                                    class="mb-3 w-full rounded border border-slate-400" title="Bath Duration"><br>
                                {{-- <input type="text" name="batch_host" id="batch_host" placeholder="Batch Host Name"
                                    required class="mb-3 w-full rounded border border-slate-400"><br>
                                    
                                    <input type="datetime-local" name="batch_expired" id="batch_expired"
                                    placeholder="batch_expired" required
                                    class="mb-3 w-full rounded border border-slate-400"><br> --}}
                                {{-- Container for extra dynamic fields --}}
                                <div id="extraFields" class="mb-4"></div>

                                <input type="datetime-local" name="formvalid" id="formvalid"
                                    placeholder="Form Fill uptime" title="Deadline of form fill up" required
                                    class="mb-3 w-full rounded border border-slate-400"><br>
                                <div class="flex justify-center gap-3">
                                    <button type="button"
                                        class="closeModal rounded bg-rose-300 px-4 py-2">Cancel</button>
                                    <button type="button" class="rounded bg-green-400 px-4 py-2 text-white"
                                        id="addFieldBtn">Add
                                        Field</button>
                                    <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Add
                                        Batch</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="batch_table w-full overflow-auto">
                    <div class="batch_table_cover">
                        <table class="mt-6 w-full border-collapse rounded-md bg-slate-100 text-center">
                            <thead class="rounded-t-md bg-slate-300">
                                <tr class="">
                                    <th class="py-3 text-black">Code</th>
                                    <th class="py-3 text-black">Created At</th>
                                    <th class="py-3 text-black">Batch Name</th>
                                    <th class="py-3 text-black">Cources</th>
                                    <th class="py-3 text-black">Duration</th>
                                    <th class="py-3 text-black">Student</th>
                                    {{-- <th class="py-3">Host</th>
                                    <th class="py-3">BY</th>
                                    <th class="py-3">Expired</th> --}}
                                    <th class="py-3 text-black">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($batchets as $batch)
                                    {{-- {{ $batch }} --}}
                                    <tr class="border-b border-b-slate-300">
                                        <td class="py-2 text-black">{{ $batch->id }}</td>
                                        <td class="py-2 text-black">{{ $batch->created_at }}</td>
                                        <td class="py-2 text-black">{{ $batch->batch_name }}</td>
                                        <td class="py-2 text-black">{{ $batch->batch_cource }}</td>
                                        <td class="py-2 text-black">{{ $batch->batch_duration }} Hrs</td>
                                        <td class="py-2 text-black">{{ $batch->student_count}}</td>

                                        {{-- <td class="py-2">Neeraj</td>
                                        <td class="py-2">Neeraj</td>
                                        <td class="py-2">2081-10-15 10:15:15</td> --}}
                                        <td class="py-2">
                                            <div class="flex w-full flex-col justify-center gap-2 md:flex-row">

                                                @php
                                                    $encryptedId = Illuminate\Support\Facades\Crypt::encryptString($batch->id);
                                                @endphp

                                                <button
                                                    class="batchlinkbtn mx-1 rounded bg-teal-500 px-4 py-1 hover:bg-teal-600 hover:font-bold"
                                                    copy-data="{{ $encryptedId }}">
                                                    Copy link
                                                </button>


                                                <a href="{{ route('batches.viewdetails', ['id' => $batch->id]) }}">
                                                    <button
                                                        class="mx-1 rounded bg-teal-500 px-4 py-1 hover:bg-teal-600 hover:font-bold">
                                                        View
                                                    </button>
                                                </a>
                                                {{-- <button
                                                class="mx-1 rounded bg-amber-300 px-4 py-1 hover:bg-amber-600 hover:font-bold">Link</button> --}}
                                                <form action="{{ route('batches.destroy', $batch->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this batch?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="mx-1 rounded bg-rose-500 px-4 py-1 hover:bg-rose-600 hover:font-bold">
                                                        Delete
                                                    </button>
                                                </form>
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
    <script>
        document.getElementById('addFieldBtn').addEventListener('click', function() {
            const container = document.getElementById('extraFields');

            const fieldWrapper = document.createElement('div');
            fieldWrapper.classList.add('mb-3', 'flex', 'items-center', 'gap-2');

            // Label input
            const labelInput = document.createElement('input');
            labelInput.type = 'text';
            labelInput.name = 'custom_labels[]';
            labelInput.placeholder = 'Field Label';
            labelInput.className = 'rounded border border-slate-400 p-2 w-1/3';

            // Type select
            const select = document.createElement('select');
            select.name = 'custom_types[]';
            select.className = 'rounded border border-slate-400 p-2 w-1/3';

            const types = ['text', 'number', 'date', 'email', 'datetime-local', 'time', 'file'];
            types.forEach(type => {
                const option = document.createElement('option');
                option.value = type;
                option.textContent = type.charAt(0).toUpperCase() + type.slice(1);
                select.appendChild(option);
            });

            // Required checkbox
            const requiredLabel = document.createElement('label');
            requiredLabel.className = 'flex items-center gap-1 text-sm';

            const requiredCheckbox = document.createElement('input');
            requiredCheckbox.type = 'checkbox';
            requiredCheckbox.name = 'custom_requireds[]';
            requiredCheckbox.value = 'yes';

            requiredLabel.appendChild(requiredCheckbox);
            requiredLabel.appendChild(document.createTextNode('Required'));

            // Hidden input for unchecked checkboxes
            const hiddenRequired = document.createElement('input');
            hiddenRequired.type = 'hidden';
            hiddenRequired.name = 'custom_requireds[]';
            hiddenRequired.value = 'no';

            fieldWrapper.appendChild(labelInput);
            fieldWrapper.appendChild(select);
            fieldWrapper.appendChild(hiddenRequired); // add before checkbox so "no" is submitted if not checked
            fieldWrapper.appendChild(requiredLabel);

            container.appendChild(fieldWrapper);
        });

document.querySelectorAll('.batchlinkbtn').forEach(function(button) {
    button.addEventListener('click', function() {
        const encryptedId = this.getAttribute('copy-data');
        const link = `${window.location.origin}/register/batch?has=${encodeURIComponent(encryptedId)}`;
        navigator.clipboard.writeText(link).then(function() {
            toaster("success", "Link Copied", "Batch link copied to clipboard.");
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    });
});

    </script>
</x-app-layout>
