<x-app-layout>
    <main>
        <div class="container mx-auto">
          <h1 class="text-2xl font-bold mb-5"> User's Table</h1>
           <table class="min-w-full table-auto border-collapse rounded-lg shadow-md h-100% w-100% bg-gray-50/50">
               <thead>
                 <tr class="bg-gray-100">
                   <th class="px-6 py-3 text-left text-sm font-medium text-black">SN.</th>
                   <th class="px-6 py-3 text-left text-sm font-medium text-black">Name</th>
                   <th class="px-6 py-3 text-left text-sm font-medium text-black">Email</th>
                   <th class="px-6 py-3 text-left text-sm font-medium text-black">Contact No</th>
                   <th class="px-6 py-3 text-left text-sm font-medium text-black">Esewa Number</th>
                   <th class="px-6 py-3 text-left text-sm font-medium text-black">System</th>
                   <th class="px-6 py-3 text-left text-sm font-medium text-black">Status</th>
                   <th class="px-6 py-3 text-left text-sm font-medium text-black">Course</th>
                   <th class="px-6 py-3 text-left text-sm font-medium text-black">Action</th>
                 </tr>
               </thead>
               <tbody>
                    <tr class="border-t hover:bg-gray-400 overflow-hidden">
                      <td class="px-6 py-3 text-sm text-black">1</td>
                      <td class="px-2 py-3 text-sm text-black">John Doe</td>
                      <td class="px-6 py-3 text-sm text-black">john.doe@example.com</td>
                      <td class="px-6 py-3 text-sm text-black">9802020202</td>
                      <td class="px-6 py-3 text-sm text-black">98********</td>
                      <td class="px-6 py-3 text-sm text-black">Mobile</td>
                      <td class="px-6 py-3 text-sm text-black">frondend</td>
                      <td class="px-6 py-3 text-sm text-black">Active</td>
                       <td class="px-6 py-3 text-sm">
                          <button class="px-4 py-2 bg-blue-500 text-white rounded">Approve </button>
                          <button class="px-4 py-2 bg-red-500 text-white rounded">Block  </button>
                          <button class="px-4 py-2 bg-yellow-500 text-white rounded mt-1">Pending </button>  
                          <button class="px-4 py-2 bg-green-500 text-white rounded">Edit </button>  
                      </td>
                    </tr>
                    <tr class="border-t hover:bg-gray-400 overflow-hidden">
                        <td class="px-6 py-3 text-sm text-black bg-gray-200">2</td>
                        <td class="px-2 py-3 text-sm text-black bg-gray-200">John Doe</td>
                        <td class="px-6 py-3 text-sm text-black bg-gray-200">john.doe@example.com</td>
                        <td class="px-6 py-3 text-sm text-black bg-gray-200">9802020202</td>
                        <td class="px-6 py-3 text-sm text-black bg-gray-200">98********</td>
                        <td class="px-6 py-3 text-sm text-black bg-gray-200">Mobile</td>
                        <td class="px-6 py-3 text-sm text-black bg-gray-200">frondend</td>
                        <td class="px-6 py-3 text-sm text-black bg-gray-200">Active</td>
                        <td class="px-6 py-3 text-sm bg-gray-200">
                            <button class="px-4 py-2 bg-blue-500 text-white rounded">Approve </button>
                            <button class="px-4 py-2 bg-red-500 text-white rounded">Block  </button>
                            <button class="px-4 py-2 bg-yellow-500 text-white rounded mt-1">pending </button>  
                            <button class="px-4 py-2 bg-green-500 text-white rounded">Edit </button>  
                        </td>
                    </tr>
                    <tr class="border-t hover:bg-gray-400 overflow-hidden">
                      <td class="px-6 py-3 text-sm text-black">3</td>
                      <td class="px-2 py-3 text-sm text-black">John Doe</td>
                      <td class="px-6 py-3 text-sm text-black">john.doe@example.com</td>
                      <td class="px-6 py-3 text-sm text-black">9802020202</td>
                      <td class="px-6 py-3 text-sm text-black">98********</td>
                      <td class="px-6 py-3 text-sm text-black">Mobile</td>
                      <td class="px-6 py-3 text-sm text-black">frondend</td>
                      <td class="px-6 py-3 text-sm text-black">Active</td>
                       <td class="px-6 py-3 text-sm">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded">Approve </button>
                        <button class="px-4 py-2 bg-red-500 text-white rounded">Block  </button>
                        <button class="px-4 py-2 bg-yellow-500 text-white rounded  mt-1">pending </button>  
                        <button class="px-4 py-2 bg-green-500 text-white rounded">Edit</button>  
                     </td>
                    </tr>
                    <tr class="border-t hover:bg-gray-400 overflow-hidden">
                      <td class="px-6 py-3 text-sm text-black bg-gray-200">4</td>
                      <td class="px-2 py-3 text-sm text-black bg-gray-200">John Doe</td>
                      <td class="px-6 py-3 text-sm text-black bg-gray-200">john.doe@example.com</td>
                      <td class="px-6 py-3 text-sm text-black bg-gray-200">9802020202</td>
                      <td class="px-6 py-3 text-sm text-black bg-gray-200">98********</td>
                      <td class="px-6 py-3 text-sm text-black bg-gray-200">Mobile</td>
                      <td class="px-6 py-3 text-sm text-black bg-gray-200">frondend</td>
                      <td class="px-6 py-3 text-sm text-black bg-gray-200">Active</td>
                       <td class="px-6 py-3 text-sm bg-gray-200">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded">Approve </button>
                        <button class="px-4 py-2 bg-red-500 text-white rounded">Block  </button>
                        <button class="px-4 py-2 bg-yellow-500 text-white rounded mt-1">pending </button>  
                        <button class="px-4 py-2 bg-green-500 text-white rounded">Edit </button>  
                     </td>
                    </tr>
                    <tr class="border-t hover:bg-gray-400 overflow-hidden">
                        <td class="px-6 py-3 text-sm text-black">5</td>
                        <td class="px-2 py-3 text-sm text-black">John Doe</td>
                        <td class="px-6 py-3 text-sm text-black">john.doe@example.com</td>
                        <td class="px-6 py-3 text-sm text-black">9802020202</td>
                        <td class="px-6 py-3 text-sm text-black">98********</td>
                        <td class="px-6 py-3 text-sm text-black">Mobile</td>
                        <td class="px-6 py-3 text-sm text-black">frondend</td>
                        <td class="px-6 py-3 text-sm text-black">Active</td>
                        <td class="px-4 py-3 text-sm">
                            <button class="px-4 py-2 bg-blue-500 text-white rounded">Approve </button>
                            <button class="px-4 py-2 bg-red-500 text-white rounded">Block  </button>
                            <button class="px-4 py-2 bg-yellow-500 text-white rounded gap-2 mt-1">pending </button>  
                            <button class="px-4 py-2 bg-green-500 text-white rounded gap-2">Edit </button>  
                       </td>
                    </tr>
               </tbody>
            </table>
        </div>
      </main>
</x-app-layout>