<x-app-layout>
    <div class="dashboard_wapper">
        <div class="dashboard_cover">
            <div class="dashboard_outer">
                <div class="user_cards mb-8 flex w-fit flex-wrap">
                    <div class="flex items-center gap-3 rounded-xl bg-gray-50 px-4 py-6 shadow-md">
                        <div class="w-4/12">
                            <div>
                                <img src="{{ Auth::check() && Auth::user()->id === 16 ? asset('upload/niraj.jpg') : asset('upload/user.png') }}"
                                    class="w-[100px] rounded-full border border-dashed border-rose-500 p-[2px]"
                                    alt="User Image">
                            </div>
                        </div>
                        <div class="w-8/12">
                            <p class="username font-bold capitalize text-gray-600">{{ $user->name }}</p>
                            <p class="username w-full text-wrap text-sm font-bold text-gray-400">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->role === 'admin')
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4" id="el-r34m730n">
                        <div class="rounded-lg border border-neutral-200/20 bg-white p-6" id="el-xsa4by6t">
                            <div class="flex items-center" id="el-naxr0k3p">
                                <div class="rounded-lg bg-blue-100 p-3" id="el-921memeq">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" id="el-s4l5d3b4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                            id="el-ds7hay6l"></path>
                                    </svg>
                                </div>
                                <div class="ml-4" id="el-w1mucw2e">
                                    <p class="text-sm text-gray-500" id="el-5wkb1is5">Total Students</p>
                                    <h3 class="text-xl font-bold text-gray-900" id="el-j0lmcz2f">{{ $totalUser }}
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-lg border border-neutral-200/20 bg-white p-6" id="el-p9pv6myo">
                            <div class="flex items-center" id="el-scf3z2lm">
                                <div class="rounded-lg bg-green-100 p-3" id="el-25ghiigd">
                                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" id="el-vyccbgna">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                            id="el-71xlr72x"></path>
                                    </svg>
                                </div>
                                <div class="ml-4" id="el-ppxjcauz">
                                    <p class="text-sm text-gray-500" id="el-tusyqgwi">Active Student</p>
                                    <h3 class="text-xl font-bold text-gray-900" id="el-t2em3g29">{{ $activeUser }}
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-lg border border-neutral-200/20 bg-white p-6" id="el-vkhvn82n">
                            <div class="flex items-center" id="el-srgv5ezn">
                                <div class="rounded-lg bg-purple-100 p-3" id="el-ys9oukc7">
                                    <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" id="el-fs0qr1jv">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                            id="el-2s10qamj"></path>
                                    </svg>
                                </div>
                                <div class="ml-4" id="el-su1ho60l">
                                    <p class="text-sm text-gray-500" id="el-9tmg80tg">Total Batch</p>
                                    <h3 class="text-xl font-bold text-gray-900" id="el-da1i4uy7">{{ $totalBatch }}
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-lg border border-neutral-200/20 bg-white p-6" id="el-mbfg3kce">
                            <div class="flex items-center" id="el-5uh0fp17">
                                <div class="rounded-lg bg-yellow-100 p-3" id="el-je8yhyzl">
                                    <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" id="el-j59cxxdg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                                            id="el-p3n9mj4z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4" id="el-3frfxlvx">
                                    <p class="text-sm text-gray-500" id="el-b9yqelx6">Active Projects</p>
                                    <h3 class="text-xl font-bold text-gray-900" id="el-f1tt8e36">{{ $totalproject }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mt-8 flex w-full flex-col gap-8 md:flex-row">
                    @if (Auth::user()->role == 'admin')
                        <div class="w-11/12 md:w-6/12">
                            <div class="notice_wapper rounded-md bg-slate-100 p-3">
                                <div class="notice_cover w-full">
                                    <form action="{{ route('notices.store') }}" method="post">
                                        @csrf
                                        <label for="notice_title" class="font-bold text-black">Title:</label><br>
                                        <input type="text" name="notice_title" id="notice_title"
                                            placeholder="Enter Title" required class="w-full"> <br>
                                        <label for="notice_message" class="font-bold text-black">Notice:</label><br>
                                        <textarea name="notice_message" id="notice_message" placeholder="Enter Notice" class="h-48 w-full resize-none">
                                        </textarea>
                                        <br>
                                        <button type="submit"
                                            class="cursor-pointer rounded bg-teal-600 px-8 py-2 text-white">Publish
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="w-11/12 md:w-6/12">
                        <div class="notice_board_wapper">
                            <div class="notice_board_cover">
                                <div class="notice_board_outer w-full overflow-hidden rounded bg-slate-50">
                                    <div class="notice_board">
                                        <p class="w-full bg-blue-950 py-3 text-center font-bold text-white">Recent
                                            Notice</p>
                                        <div
                                            class="notice_list_box max-h-80 overflow-y-auto overflow-x-hidden px-3 py-2">
                                            @foreach ($notices as $notice)
                                                <div class="notice my-2 bg-teal-100 p-3">
                                                    <div class="flex w-full justify-between">
                                                        <div class="w-7/12">
                                                            <p class="font-bold capitalize">{{ $notice->title }}</p>
                                                        </div>
                                                        <div class="w-5/12 text-right">
                                                            <p class="text-sm font-bold">{{ $notice->created_at }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <p class="text-slate-600">{{ $notice->message }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
