<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div class="bath_details">
        <div class="bath_details_wapper">
            <div class="bath_details_cover">
                <p class="text-lg font-bold capitalize underline">Details Of : {{ $stbatch_name }} Batch</p>
                <table class="">
                    <thead class="">
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Reg. Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $user_count = 1;
                        @endphp
                        @foreach ($stbatch as $user)
                            <tr>
                                <td>{{ $user_count }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td
                                    class="@if ($user->status == 'active') bg-green-200 @elseif ($user->status == 'pending') bg-yellow-200 @elseif ($user->status == 'block') bg-red-200 @endif p-1 text-sm font-bold capitalize text-black">
                                    {{ $user->status }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            @php
                                $user_count++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
