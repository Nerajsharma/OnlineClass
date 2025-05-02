<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div class="editstudent_wapper">
        <div class="editstudent_cover">
            <div class="container mx-auto mt-5">
                <h2 class="mb-4 text-xl font-bold">Edit User Details</h2>
                <form action="{{ route('users.update', $user->id) }}" method="POST"
                    class="rounded bg-white px-8 pb-8 pt-6 shadow-md">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}"
                            class="w-full rounded border px-3 py-2 text-gray-700 shadow-sm" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="w-full rounded border px-3 py-2 text-gray-700 shadow-sm" required>
                    </div>

                    <!-- Contact No -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Contact No</label>
                        <input type="text" name="contact_no" value="{{ $user->contact }}"
                            class="w-full rounded border px-3 py-2 text-gray-700 shadow-sm" required>
                    </div>

                    <!-- Role -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Role</label>
                        <select name="role" class="w-full rounded border px-3 py-2 text-gray-700 shadow-sm">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <!-- System -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">System</label>
                            <select name="system" id="system" class="w-full rounded border px-3 py-2 text-gray-700 shadow-sm">
                                <option value="{{ $user->system == 'Computer' ? 'selected' : '' }}">Computer</option>
                                <option value="{{ $user->system == 'Laptop' ? 'selected' : '' }}">Laptop</option>
                                <option value="{{ $user->system == 'Mobile' ? 'selected' : '' }}">Mobile</option>
                            </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="w-full rounded border px-3 py-2 text-gray-700 shadow-sm">
                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="block" {{ $user->status == 'block' ? 'selected' : '' }}>Block</option>
                        </select>
                    </div>

                    <!-- Course -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Batch</label>
                        <select name="cource" id="cource"
                            class="w-full rounded border px-3 py-2 text-gray-700 shadow-sm">
                            @foreach ($sbatches as $batch)
                                <option value="{{ $batch->id }}"
                                    {{ isset($user->cource) && $batch->batch_name === $user->cource ? 'selected' : '' }}>
                                    {{ $batch->batch_name }}
                                </option>
                            @endforeach

                        </select>
                        {{-- <input type="text" name="cource" value="{{ $user->cource }}"
                            class="w-full rounded border px-3 py-2 text-gray-700 shadow-sm"> --}}
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
