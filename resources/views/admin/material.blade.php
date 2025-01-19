<x-app-layout>
    <div class="material_outer">
        <div class="material_wapper">
            <div class="material_cover">
                <div class="flex w-full items-center justify-end">
                    <button class="w-fit rounded-lg bg-cyan-500 px-8 py-2 font-bold">Upload</button>
                </div>
                <div class="material_table">
                    <div class="material_table_cover">
                        <table class="mt-6 w-full border-collapse overflow-hidden rounded-md text-center">
                            <thead class="overflow-hidden rounded-t-md bg-white">
                                <tr class="">
                                    <th class="py-3">#</th>
                                    <th class="py-3">File Name</th>
                                    <th class="py-3">Upload date</th>
                                    <th class="py-3">Size</th>
                                    <th class="py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td class="bg-gray-200/75 py-2">1</td>
                                    <td class="bg-gray-200/75 py-2">Chetsheet</td>
                                    <td class="bg-gray-200/75 py-2">2081-10-04</td>
                                    <td class="bg-gray-200/75 py-2">1024 kb</td>
                                    <td class="bg-gray-200/75 py-2">
                                        <a href="" target="_blank">
                                            <button
                                                class="mx-1 rounded bg-teal-500 px-4 py-1 hover:bg-teal-600 hover:font-bold">view</button>
                                        </a>
                                        <a href="notes.blade.php" download="hii">
                                            <button
                                                class="mx-1 rounded bg-green-500 px-4 py-1 hover:bg-green-600 hover:font-bold">Download</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
