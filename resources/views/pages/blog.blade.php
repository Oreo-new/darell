<x-layout>
    <section>
        <div class="relative h-[300px] md:h-auto">
            <img src="{{ asset('/images/blog-page.jpg') }}" alt="darell blog page" class="w-full h-full">
            <div class="w-full block m-auto absolute bottom-10 left-0 right-0">
                <h1 class="text-center uppercase teko text-[30px] md:text-[50px] lg:text-[80px] text-white font-semibold">{{$blog->title}}</h1>
                <span class="text-center uppercase teko text-2xl block m-auto text-white"> Home - <span class="text-yellow-500">Blog Post</span></span>
            </div>
        </div>
    </section>
    <section>
        <div class="container mx-auto px-4 py-20">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-3/4">
                    <div class="w-full h-[600px] pr-10 ">
                    @if($blog->image)
                        <img src="{{asset('storage/'.$blog->image)}}" alt="{{$blog->title}}" class="object-cover h-full w-full rounded-t-md">
                    @else
                        <img src="{{ asset('images/blog1.jpg') }}" alt="{{ $blog->title }}" class="object-cover h-full w-full rounded-t-md">
                    @endif
                    </div>
                    <div class="underline underline-offset-2 flex rubik text-lg font-normal mt-8 text-[#66686d]">
                        <span class="mr-4">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</span>
                        <span><strong>Author: </strong>{{ $blog->author->name }}</span>
                    </div>
                    <div class="w-full">
                        <h1 class="teko text-[40px] font-normal mt-2">{{ $blog->title }}</h1>
                        <div class="rubik text-[18px] text-[#66686d] blog-description mt-6">
                            {!! $blog->description !!}
                        </div>
                    </div>
                
                    <a href="/blogs">
                        <button class="flex items-center mt-6">
                            <span class="rounded-full px-6 py-3 text-lg hover:bg-yellow-500 bg-slate-100 mr-3 teko transition-colors"> < </span> <span class="underline underline-offset-4 teko text-xl">Go back to blog posts</span> 
                        </button>
                    </a>

                </div>
                <div class="w-full lg:w-1/4 bg-slate-200 py-10 px-6 h-[350px] mt-20 lg:mt-0">
                    <h2 class="text-center text-3xl teko mb-4">Latest Articles</h2>
                    <ul>
                        @foreach ($blogs as $item)
                            <li class="py-2 text-lg teko mt-2 flex items-center">
                                <a href="/blog/{{$item->slug}}"><span class="rounded-full px-5 py-2 text-lg hover:bg-yellow-500 bg-slate-100 mr-3 transition-colors"> {{$loop->iteration }}</span></a>
                                <div>
                                    <a href="/blog/{{$item->slug}}" class="text-xl block underline underline-offset-4">{{$item->title}}</a>
                                    <span class="block text-sm teko">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>  
            </div>
            
        </div>
    </section>
</x-layout>