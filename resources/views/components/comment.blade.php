@if(!$comments->isEmpty())

<div class="mt-8">
  

    <!--- Start of comment box form -->

     @foreach($comments as $item)
        @php
            $originalDate = $item->created_at;
            $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $originalDate);
            $formattedDate = $carbonDate->format('F j, Y \a\t g:i a');
        @endphp
        <div class="shadow p-4 my-4  w-full lg:w-4/6 relative mx-auto">
            <div class="flex items-center">
                <div class="bg-gray-400 mr-3">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 p2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg> 
                </div>
                <div>
                    <p class="w-full capitalize roboto">{{$item->name}} says:</p>
                    <p class="w-full roboto">{{$formattedDate}}</p>
                </div>
            </div>
            <div class="comment-content mt-2 taviraj">
                <p>{{ $item->comment }}</p>
                 
            </div>
            <!--- this is reply div -->
                @if($item->replies)
                    @foreach($item->replies as $reply)
                        <div class="mt-4 pl-4 bg-gray-300 rounded py-4 replies">
                            <div class="flex items-center">
                                <div class="bg-gray-400 mr-3">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 p2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg> 
                                </div>
                                <div>
                                    <p class="w-full capitalize roboto">{{$reply->name}} Replies:</p>
                                    <p class="w-full roboto">{{$formattedDate}}</p>
                                </div>
                            </div>
                            <div class="comment-content mt-2 taviraj">
                                <p class="text-black">{{ $reply->comment }}</p>   
                            </div>
                        </div>
                    @endforeach
                @endif

            <!--- this is reply form -->
                <div x-data="{ showReplyForm: false }" class="reply-form">
                    <button @click="showReplyForm = !showReplyForm" class="flex mt-4 items-center">

                        <span x-show="!showReplyForm" class="text-xs text-neutral-600 mr-1 roboto">Reply to this comment: </span> 
                        <svg x-show="!showReplyForm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-neutral-600 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l6-6m0 0l-6-6m6 6H9a6 6 0 000 12h3" />
                        </svg>
                        <span x-show="showReplyForm" class="text-xs text-neutral-600 mr-1 roboto">Close</span> 
                        <svg x-show="showReplyForm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-600 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                          
                    </button>
                
                    <div x-show="showReplyForm">
                        <div>

                             <form action="{{route('comments') }}" method="POST" class="mt-5 p-8 bg-gray-300">
                                @csrf
                                
                                <input type="hidden" name="parent_id" value="{{ $item->id }}" />
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-600 text-sm mr-2 mb-2 roboto">Name:<span class="text-red-600"> *</span> </label>
                                    <input type="text" name="name" id="name" class="w-full border border-gray-300 p-1" required>
                                </div>
                    
                                <div class="mb-4">
                                    <label for="email" class="block text-gray-600 text-sm mr-2 mb-2 roboto">Email: </label>
                                    <input type="email" name="email" id="email" class="w-full border border-gray-300 p-1" required>
                                </div>
                                <div class="mb-4">
                                    <label for="comment" class="block text-gray-600 text-sm mr-2 mb-2 roboto">Comments:<span class="text-red-600"> *</span>  </label>
                                    <textarea name="comment" id="comment" rows="4" class="w-full border border-gray-300 p-1" required></textarea>
                                </div>
                                <button type="submit" class="text-black py-1 px-3 rounded bg-[#E5E8E5] hover:bg-[#c2cbc2] transition-colors roboto">Submit reply</button>
                            </form>
                        </div>
                       
                    </div>
                </div>
            <!--- this is reply form -->
        </div>
     @endforeach
</div>
@endif
<div class="mt-8">
</div>
    <form action="{{route('comments') }}" method="POST" class="mt-4 w-full lg:w-4/6 p-8 bg-gray-300 mx-auto">
        <p class="text-2xl font-bold roboto">Leave your comments here.</p>

        <p class="text-sm text-neutral-500 roboto mb-6">Your email address will not be published. Required fields are marked *</p>
        @csrf
    {{-- <input type="hidden" name="parent_id" value="{{ $comment->id }}" /> --}}
        <div class="mb-4">
            <label for="name" class="block text-gray-600 mr-2 mb-2 roboto">Name:<span class="text-red-600"> *</span> </label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 p-1" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-600 mr-2 mb-2 roboto">Email: </label>
            <input type="email" name="email" id="email" class="w-full border border-gray-300 p-1" required>
        </div>

        <div class="mb-4">
            <label for="comment" class="block text-gray-600 mr-2 mb-2 roboto">Comments:<span class="text-red-600"> *</span>  </label>
            <textarea name="comment" id="comment" rows="4" class="w-full border border-gray-300 p-1" required></textarea>
        </div>

        {{-- Add Google reCAPTCHA here --}}

        <button type="submit" class="text-black py-1 px-3 rounded bg-[#E5E8E5] hover:bg-[#c2cbc2] transition-colors roboto">Post Comment</button>
    </form>
</div>
</div>