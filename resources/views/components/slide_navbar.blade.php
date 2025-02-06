<div class="navbar_list">
    <div class="navbar_list-wapper">
        <div class="list_header mt-5 pl-8 capitalize">
            <div class="flex h-full w-full flex-col justify-between">
                <div class="flex h-full w-full flex-col">
                    <a href="{{ route('dashboard.index') }}" class="">
                        Dashboard
                    </a>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('student.index') }}" class="">
                            Student
                        </a>

                        <a href="{{ route('batch.index') }}" class="">
                            Batch
                        </a>
                    @endif
                    <a href="{{ route('class.index') }}" class="">
                        Class
                    </a>
                    <a href="{{ route('notes.index') }}" class="">
                        Notes
                    </a>
                    <a href="{{ route('material.index') }}" class="">
                        Material
                    </a>
                    <a href="{{ route('project.index') }}" class="">
                        Project
                    </a>
                    <a href="{{ route('playground.index') }}" class="">
                        Playground
                    </a>
                    <a href="{{ route('whiteboard.index') }}" class="">
                        Whiteboard
                    </a>
                </div>
                <div class="mt-10 flex h-full w-full flex-col">
                    {{-- <a href="{{ route('profile.index') }}">Profile</a> --}}
                    {{-- <a href="{{ route('updatepassword.index') }}">Change Password</a> --}}
                    <a href="">Log out</a>
                </div>
            </div>

        </div>
    </div>
</div>
