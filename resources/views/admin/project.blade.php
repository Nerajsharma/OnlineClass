<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div class="project_wapper">
        <div class="project_cover">
            <div class="project_outer">
                <div class="flex w-full items-center justify-end">
                    <button class="modelbtn text-md mr-5 rounded bg-teal-600 px-6 py-2 font-bold text-white"
                        modeltarget="uploadprojectbtn">Upload project</button>
                </div>
                <div id="uploadprojectbtn" class="model_box_wapper">
                    <div class="model_box_cover">
                        <h2 class="model_header">Upload project </h2>
                        <div class="model_box">
                            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="projectname" class="mb-4 w-full rounded"
                                    placeholder="Enter Project Name" required maxlength="25">
                                <br>
                                <input type="text" name="projectlang" class="mb-4 w-full rounded"
                                    placeholder="HTML, CSS, JS" required maxlength="50">
                                <br>
                                <select name="projectmode" id="projectmode" class="mb-4 w-full rounded">
                                    <option value="public">public</option>
                                    <option value="private">private</option>
                                </select><br>
                                <input type="file" name="project_file" class="mb-2 rounded border border-slate-600"
                                    required>
                                <!-- Only zip, html, css, js, etc. allowed -->

                                <div class="flex justify-center">
                                    <button type="button"
                                        class="closeModal mr-2 rounded bg-rose-300 px-4 py-2">Cancel</button>
                                    <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Upload
                                        Project</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <div class="w-full overflow-auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Project ID</th>
                                <th>Project Name</th>
                                <th>Language</th>
                                @if (Auth::User()->role === 'admin')
                                    <th>File</th>
                                @endif
                                <th>Uploader</th>
                                <th>Date</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                @php
                                    $folderPath = public_path('project/' . $project->project_id);
                                    $indexFile = $folderPath . '/index.html';
                                    $zipFile = $folderPath . '/' . $project->project_file;
                                @endphp
                                {{-- {{ asset('project/' . $project->project_id . '/index.html') }} --}}
                                {{-- {{ file_exists($indexFile) }} --}}
                                @if ($project->projectmode === 'private')
                                    @if ($project->uploader_id === Auth::user()->id || Auth::user()->role === 'admin')
                                        <tr>
                                            <td class="flex">
                                                @if (true)
                                                    <sup
                                                        class="ml-[2px] h-fit rounded bg-green-300 p-[4px] text-green-700"><i
                                                            class="nb nb_locked"></i></sup>
                                                @endif
                                                {{ $project->project_id }}
                                            </td>
                                            <td>{{ $project->projectname }}</td>
                                            <td>{{ $project->projectlang }}</td>
                                            @if (Auth::User()->role === 'admin')
                                                <td>{{ $project->project_file }}</td>
                                            @endif
                                            <td>{{ $project->uploader->name }}</td>
                                            <td>{{ $project->created_at }}</td>
                                            <td>
                                                <div
                                                    class="flex flex-col items-center justify-center gap-2 md:flex-row">
                                                    @if (file_exists($indexFile))
                                                        <a href="{{ asset('project/' . $project->project_id . '/index.html') }}"
                                                            target="_blank"
                                                            class="rounded bg-teal-500 px-6 py-2 font-bold text-white">
                                                            Live Preview
                                                        </a>

                                                        <button class="projectcopylink copy-link-btn"
                                                            copydata="{{ asset('project/' . $project->project_id . '/index.html') }}"
                                                            title="{{ asset('project/' . $project->project_id . '/index.html') }}">
                                                            Copy Link
                                                        </button>
                                                    @elseif (file_exists($zipFile) && mime_content_type($zipFile) === 'application/zip')
                                                        @if (Auth::user()->role === 'admin')
                                                            <form
                                                                action="{{ route('projects.extract', $project->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="rounded bg-orange-500 px-6 py-2 font-bold text-white">
                                                                    Extract
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endif

                                                    <a href="{{ route('projects.download', $project->id) }}"
                                                        class="mx-2 rounded bg-lime-500 px-6 py-2 font-bold text-white">
                                                        Download
                                                    </a>
                                                    @if (Auth::user()->role === 'admin')
                                                        <form action="{{ route('projects.destroy', $project->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this project?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="rounded bg-rose-500 px-6 py-2 font-bold text-white">Delete</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @elseif ($project->projectmode !== 'private')
                                    <tr>
                                        <td class="flex">
                                            @if (true)
                                                <sup
                                                    class="ml-[2px] h-fit rounded bg-orange-300 p-[4px] text-orange-700"><i
                                                        class="nb nb_unlocked1"></i></sup>
                                            @endif
                                            {{ $project->project_id }}
                                        </td>
                                        <td>{{ $project->projectname }}</td>
                                        <td>{{ $project->projectlang }}</td>
                                        @if (Auth::User()->role === 'admin')
                                            <td>{{ $project->project_file }}</td>
                                        @endif
                                        <td>{{ $project->uploader->name }}</td>
                                        <td>{{ $project->created_at }}</td>
                                        <td>
                                            <div class="flex flex-col items-center justify-center gap-2 md:flex-row">
                                                @if (file_exists($indexFile))
                                                    <a href="{{ asset('project/' . $project->project_id . '/index.html') }}"
                                                        target="_blank"
                                                        class="rounded bg-teal-500 px-6 py-2 font-bold text-white">Live
                                                        Preview</a>

                                                    <button class="projectcopylink copy-link-btn"
                                                        copydata="{{ asset('project/' . $project->project_id . '/index.html') }}"
                                                        title="{{ asset('project/' . $project->project_id . '/index.html') }}">Copy
                                                        Link</button>
                                                @elseif (file_exists($zipFile) && mime_content_type($zipFile) === 'application/zip')
                                                    @if (Auth::user()->role === 'admin')
                                                        <form action="{{ route('projects.extract', $project->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                class="rounded bg-orange-500 px-6 py-2 font-bold text-white">Extract</button>
                                                        </form>
                                                    @endif
                                                @endif
                                                <a href="{{ route('projects.download', $project->id) }}"
                                                    class="mx-2 rounded bg-lime-500 px-6 py-2 font-bold text-white">
                                                    Download
                                                </a>
                                                @if (Auth::user()->role === 'admin')
                                                    <form action="{{ route('projects.destroy', $project->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this project?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="rounded bg-rose-500 px-6 py-2 font-bold text-white">Delete</button>
                                                    </form>
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
    </div>
</x-app-layout>
