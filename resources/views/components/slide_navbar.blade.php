<div class="navbar_list">
    <div class="navbar_list-wapper">
        <div class="list_header mt-5 pl-8 capitalize">
            <div class="flex h-full w-full flex-col justify-between">
                <div class="flex h-full w-full flex-col">
                    <a href="{{ route('dashboard.index') }}" class="py-1">
                       <i class="nb nb_dashboard"></i> Dashboard
                    </a>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('student.index') }}" class="py-1">
                           <i class="nb nb_graduate"></i> Student
                        </a>

                        <a href="{{ route('batch.index') }}" class="py-1">
                           <i class="nb nb_users"></i> Batch
                        </a>
                    @endif
                    <a href="{{ route('class.index') }}" class="py-1">
                       <i class="nb nb_book3"></i> Class
                    </a>
                    <a href="{{ route('notes.index') }}" class="py-1">
                       <i class="nb nb_document-code1"></i> Notes
                    </a>
                    <a href="{{ route('material.index') }}" class="py-1">
                       <i class="nb nb_archive1"></i> Material
                    </a>
                    <a href="{{ route('project.index') }}" class="py-1">
                       <i class="nb nb_free-code-camp"></i> Project
                    </a>
                    <a href="{{ route('playground.index') }}" class="py-1">
                       <i class="nb nb_code1"></i> Playground
                    </a>
                    <a href="{{ route('whiteboard.index') }}" class="py-1">
                       <i class="nb nb_image"></i> Whiteboard
                    </a>
                    <a href="{{route('questions.index')}}" class="py-1">
                       <i class="nb nb_question"></i> Q&N/Douts
                    </a>
                </div>
                <div class="mt-10 flex h-full w-full flex-col">
                    <a href="{{ route('profile.edit') }}"><i class="nb nb_gears"></i> Profile</a>
                    {{-- <a href="{{ route('updatepassword.index') }}">Change Password</a> --}}
                    {{-- <a href="{{ route('logout') }}">Log out</a> --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-white text-left"><i class="nb nb_log-out"></i> Log out</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
