<x-app-layout>
    <script>
        @if (session('success'))
            toaster("success", "Successfully", '{{ session('success') }}');
        @elseif (session('error'))
            toaster("error", "Upload Failed", '{{ session('success') }}');
        @endif
    </script>
    <div class="dout_wapper">
        <div class="dout_cover">
            <div class="flex w-full items-center justify-end pr-6">
                <button class="modelbtn cursor-pointer rounded bg-green-700 px-8 py-2 text-white"
                    modeltarget="adddoutsform">Dout ? </button>
            </div>

            <!-- Ask Question Modal -->
            <div id="adddoutsform" class="model_box_wapper">
                <div class="model_box_cover">
                    <h2 class="model_header">Ask Your Doubts ?</h2>
                    <div class="model_box">
                        <p>Do you have any queries or doubts? Just write them down. We will help you.</p>
                        <form action="{{ route('ask-question', ['parent_id' => null]) }}" method="post">
                            @csrf
                            <label for="askquestion">Question</label>
                            <textarea name="askquestion" id="askquestion" class="h-32 w-full resize-none rounded p-1"
                                placeholder="Write your Question"></textarea>
                            <div class="flex justify-center">
                                <button type="button"
                                    class="closeModal mr-2 rounded bg-rose-300 px-4 py-2">Cancel</button>
                                <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Add
                                    Question</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Display Questions and Replies -->
            <div class="outer mt-4 flex w-full justify-center flex-wrap gap-4">
                @foreach ($questions as $question)
                    <div class="user_dout_box_wapper md:8/12 w-11/12 rounded-lg border border-slate-500 bg-white p-5 shadow-lg shadow-slate-600">
                        <div class="user_dout_box_cover">
                            <div class="flex w-full items-center gap-2">
                                <div class="w-fit rounded-full border border-slate-500 bg-white">
                                    <img src="{{ $question->user->id === 16 ? asset('upload/niraj.jpg') : asset('upload/user.png') }}" class="w-[50px]" alt="">
                                </div>
                                <div class="w-10/12">
                                    <p class="text-md font-bold capitalize text-slate-600">{{ $question->user->name }}</p>
                                    <p class="text-sm text-slate-400">{{ $question->created_at->format('Y-m-d') }}</p>
                                </div>
                            </div>
                            <div class="douts_question mt-1 md:ml-16">
                                <p class="text-md font-sans font-bold text-slate-950">{{ $question->question }}</p>

                                <!-- Replies Section -->
                                <p class="font-bold text-blue-950 underline md:ml-2">Recent Answers:</p>
                                @if ($question->replies->count())
                                    <div class="user_answer md:ml-3">
                                        @foreach ($question->replies as $reply)
                                            <div class="user_answer_wapper m-3 rounded border border-slate-500 p-3">
                                                <div class="flex w-full items-center gap-2">
                                                    <div class="w-fit rounded-full border border-slate-500 bg-white">
                                                        <img src="{{ $reply->user->id === 16 ? asset('upload/niraj.jpg') : asset('upload/user.png') }}" class="w-[30px]" alt="">
                                                    </div>
                                                    <div class="w-10/12">
                                                        <p class="text-sm font-bold capitalize text-slate-600">{{ $reply->user->name }}</p>
                                                        <p class="text-xs text-slate-400">{{ $reply->created_at->format('Y-m-d') }}</p>
                                                    </div>
                                                </div>
                                                <p class="answers md:ml-4">{{ $reply->question }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Reply Button -->
                                <form action="{{ route('ask-question', ['parent_id' => $question->id]) }}" method="post" class="mt-2">
                                    @csrf
                                    <textarea name="askquestion" class="w-full rounded p-1 border resize-none" placeholder="Write your reply"></textarea>
                                    <button type="submit" class="font-bold text-blue-950">Reply</button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
