<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div class="changepass_wapper">
        <div class="changepass_cover">
            <div class="changepass_outer">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
</x-app-layout>
