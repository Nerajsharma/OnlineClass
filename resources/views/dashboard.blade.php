<x-app-layout>
    <div class="dashboard_wapper">
        <div class="dashboard_cover">
            <div class="dashboard_outer">
                <div class="user_cards w-4/12">
                    <div class="flex items-center gap-3 rounded-xl bg-gray-50 px-4 py-6 shadow-md">
                        <div class="w-4/12">
                            <div>
                                <img src="{{ asset('upload/user.png') }}" class="w-[100px] rounded-full bg-red-300"
                                    alt="">
                            </div>
                        </div>
                        <div class="w-8/12">
                            <p class="username font-bold capitalize text-gray-600">username</p>
                            <p class="username text-sm font-bold text-gray-400">user123@gmai.com</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex w-full gap-8">
                    <div class="w-fit">
                        <div class="notice_wapper rounded-md bg-slate-100 p-3">
                            <div class="notice_cover">
                                <form action="" method="post">
                                    @csrf
                                    <label for="notice_title" class="font-bold">Title : </label><br>
                                    <input type="text" name="notice_title" id="notice_title"
                                        placeholder="Enter Title" required class="w-full"> <br>
                                    <label for="notice_message" class="font-bold">Notice : </label><br>
                                    <textarea name="notice_message" id="notice_message" placeholder="Enter Notice" rows="8" cols="45"
                                        class="resize-none"></textarea> <br>
                                    <button type="submit"
                                        class="cursor-pointer rounded bg-teal-600 px-8 py-2 text-white">Publish</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="w-6/12">
                        <div class="notice_board_wapper">
                            <div class="notice_board_cover">
                                <div class="notice_board_outer w-full overflow-hidden rounded bg-slate-50">
                                    <div class="notice_board">
                                        <p class="w-full bg-blue-950 py-3 text-center font-bold text-white">Recent
                                            Notice</p>
                                        <div
                                            class="notice_list_box max-h-60 overflow-y-auto overflow-x-hidden px-3 py-2">

                                            <div class="notice bg-teal-100 p-3">
                                                <div class="my-2 flex w-full justify-between">
                                                    <div class="w-7/12">
                                                        <p class="font-bold capitalize">Holiday</p>
                                                    </div>
                                                    <div class="w-5/12 text-right">
                                                        <p class="text-sm font-bold">2081-10-04</p>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <p class="text-slate-600">Lorem ipsum dolor sit amet
                                                        consectetur,
                                                        adipisicing elit. Nostrum maxime totam reprehenderit est
                                                        doloremque aperiam laboriosam id sed modi illo, iste
                                                        voluptatibus adipisci praesentium officiis?</p>
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
        </div>
    </div>
</x-app-layout>
