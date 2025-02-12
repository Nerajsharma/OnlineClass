<div class="navbar_list">
    <div class="navbar_list-wapper">
        <div class="list_header mt-5 pl-8 capitalize">
            <div class="flex h-full w-full flex-col justify-between">
                <div class="flex h-full w-full flex-col">
                    <a href="{{ route('dashboard.index') }}" class="py-1">
                        Dashboard
                    </a>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('student.index') }}" class="py-1">
                            Student
                        </a>

                        <a href="{{ route('batch.index') }}" class="py-1">
                            Batch
                        </a>
                    @endif
                    <a href="{{ route('class.index') }}" class="py-1">
                        Class
                    </a>
                    <a href="{{ route('notes.index') }}" class="py-1">
                        Notes
                    </a>
                    <a href="{{ route('material.index') }}" class="py-1">
                        Material
                    </a>
                    <a href="{{ route('project.index') }}" class="py-1">
                        Project
                    </a>
                    <a href="{{ route('playground.index') }}" class="py-1">
                        Playground
                    </a>
                    <a href="{{ route('whiteboard.index') }}" class="py-1">
                        Whiteboard
                    </a>
                </div>
                <div class="mt-10 flex h-full w-full flex-col">
                    {{-- <a href="{{ route('profile.index') }}">Profile</a> --}}
                    {{-- <a href="{{ route('updatepassword.index') }}">Change Password</a> --}}
                    {{-- <a href="{{ route('logout') }}">Log out</a> --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full px-2 py-2 text-white">Log out</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
