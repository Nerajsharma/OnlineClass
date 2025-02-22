<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div class="profile_wapper">
        <div class="profile_cover">
            <div class="profile_outer">
                @include('profile.edit')
            </div>
        </div>
    </div>
</x-app-layout>
