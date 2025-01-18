<x-app-layout>
    <div class="cover">
        <div class="outer">
            <div class="buttons text-right px-4 pb-4 relative">
                <button class="px-6 py-3 right-500 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 " id="addButton">
                    Add Class
                </button>
                <form id="dynamicForm" class="mt-2 px-4 p-6 bg-white rounded-lg shadow-md w-80 hidden absolute ">
                    <div class="mb-4">
                      <label for="name" class="block text-left text-gray-700 mb-1 placeholder-Add class link"></label>
                      <input type="text" id="name" name="name"placeholder="Enter class link"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex justify-between items-center">
                      <button type="submit"
                        class="px-6 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                        Add Class
                      </button>
                      <button type="button" id="cancelButton"
                        class="px-6 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                        cancel
                      </button>
                    </div>
                </form>
                <button class="px-6 py-3 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Create Class
                </button>
            </div>
            <div class="wrapper">
                <table class="min-w-full table-auto border-collapse rounded-lg shadow-md h-100% w-100%  bg-gray-50/50 ">
                    <thead class="bg-orange-200">
                        <tr class=" rounded-lg border-collapse border-r-2">
                          <th class="px-6 py-3 text-left text-sm font-medium text-black">Class ID</th>
                          <th class="px-6 py-3 text-left text-sm font-medium text-black">Start Date</th>
                          <th class="px-6 py-3 text-left text-sm font-medium text-black">End Date</th>
                          <th class="px-6 py-3 text-left text-sm font-medium text-black">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-100">
                            <td class="px-6 py-3 text-black font-medium">1</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">Ended</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 text-black font-medium">2</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">Ended</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="px-6 py-3 text-black font-medium">3</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">Ended</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 text-black font-medium">4</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">Ended</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="px-6 py-3 text-black font-medium">5</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">2081-10-5</td>
                            <td class="px-6 py-3 text-black font-medium">Ended</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</x-app-layout>