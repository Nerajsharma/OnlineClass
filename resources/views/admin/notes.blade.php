<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div class="notes_outer">
        <div class="notes_wapper">
            <div class="notes_cover">
                @if (Auth::user()->role === 'admin')
                <div class="flex items-center justify-end pr-4">
                    <button class="modelbtn cursor-pointer rounded-md bg-teal-600 px-5 py-1 text-lg font-bold text-white"
                    modeltarget="upload_note_form">Upload
                    Note</button>
                </div>
                @endif
                {{-- {{ $batch_id }} --}}
                <div id="upload_note_form" class="model_box_wapper">
                    <div class="model_box_cover">
                        <h2 class="model_header">Upload Note</h2>
                        <div class="model_box">
                            <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="notetitle" id="notetitle" class="w-full"
                                    placeholder="Enter note title" required><br><br>

                                <select name="batchselect" id="batchselect" class="w-full">
                                    @foreach ($batch_id as $item)
                                        {{ $item }}
                                        <option value="{{ $item->id }}">{{ $item->batch_name }}</option>
                                    @endforeach
                                </select><br><br>

                                <input type="file" name="notefile" id="notefile" class="w-full" required><br><br>

                                <div class="flex justify-center">
                                    <button type="button"
                                        class="closeModal mr-2 rounded bg-rose-300 px-4 py-2">Cancel</button>
                                    <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Upload
                                        Notes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="note_code line-numbers">
                    @foreach ($notes as $note)
                        <div class="mt-6 flex items-center justify-between">
                            <p class="code_header">{{ $note->title }}</p>
                            @if (Auth::user()->role === 'admin')
                                <!-- Delete Button -->
                                <form action="{{ route('notes.destroy', $note->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="rounded bg-red-500 px-4 py-1 text-lg font-bold text-white">Delete</button>
                                </form>
                            @endif

                        </div>
                        @php
                            $filePath = public_path($note->file_path);
                            $extension = pathinfo($filePath, PATHINFO_EXTENSION); // Get file extension

                            // Determine the correct language class
                            $languageClass = match ($extension) {
                                'html' => 'language-markup',
                                'css' => 'language-css',
                                'js' => 'language-js',
                                default => 'language-plaintext', // Fallback for unknown types
                            };
                        @endphp

                        <pre><code class="{{ $languageClass }}" data-prismjs-copy="Copy!">
                            @php
                                // echo 'File Path: ' . $filePath . '<br>';

                                if (file_exists($filePath)) {
                                    $htmlContent = file_get_contents($filePath);
                                    echo nl2br(e($htmlContent)); // Prevents executing HTML
                                } else {
                                    echo 'File not found!';
                                }
                            @endphp
                        </code></pre>
                    @endforeach


                </div>
            </div>

        </div>
    </div>

</x-app-layout>
