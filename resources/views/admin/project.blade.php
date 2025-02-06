<x-app-layout>
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
                            <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="projectname" class="mb-4 w-full rounded"
                                    placeholder="Enter Project Name" required maxlength="25">
                                <br>
                                <input type="text" name="projectlang" class="mb-4 w-full rounded"
                                    placeholder="HTML, CSS, JS" required maxlength="50">
                                <br>
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

                <table>
                    <thead>
                        <tr>
                            <th>Project ID</th>
                            <th>Project Name</th>
                            <th>Language</th>
                            <th>Uploader</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->project_id }}</td>
                                <td>{{ $project->projectname }}</td>
                                <td>{{ $project->projectlang }}</td>
                                <td>{{ $project->uploader_name }}</td>
                                <td>
                                    @php
                                        $filePath = asset($project->project_file); // Corrected file path
                                        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                    @endphp

                                    <!-- Show live preview only for HTML, CSS, JS -->
                                    @if (in_array($fileExtension, ['html', 'css', 'js', 'php', 'py', 'cpp', 'c', 'java']))
                                        <a href="{{ $filePath }}" target="_blank"
                                            class="rounded bg-teal-500 px-6 py-2 font-bold text-white">Live Preview</a>
                                    @endif

                                    <a href="{{ $filePath }}" download="{{ $project->project_id }}"
                                        class="mx-2 rounded bg-lime-500 px-6 py-2 font-bold text-white">Download</a>
                                    <a href=""
                                        class="rounded bg-rose-500 px-6 py-2 font-bold text-white">Delete</a>
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                </table>


            </div>
        </div>
    </div>
</x-app-layout>
