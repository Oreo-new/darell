<x-layout>
<section>
    <div class="relative h-[300px] md:h-auto">
        <img src="{{ asset('/images/blog-page.jpg') }}" alt="darell blog page" class="w-full h-full">
        <div class="w-1/2 block m-auto absolute bottom-10 left-0 right-0">
            <h1 class="text-center uppercase teko text-[50px] md:text-[50px] lg:text-[100px] text-white font-semibold">Blog Articles</h1>
            <span class="text-center uppercase teko text-2xl block m-auto text-white"> Home - <span class="text-yellow-500">Blog Posts</span></span>
        </div>
    </div>
</section>
<section>
    <div class="container mx-auto px-4 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-10">
            @foreach ($blogs as $blog)
                <div class="border rounded-t-md" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                    <div class="h-[500px] md:h-[400px] w-full relative">
                        @if($blog->image)
                            <img src="{{asset('storage/'.$blog->image)}}" alt="{{$blog->title}}" class="object-cover h-full w-full rounded-t-md">
                        @else
                            <img src="{{ asset('images/blog1.jpg') }}" alt="{{ $blog->title }}" class="object-cover h-full w-full rounded-t-md">
                        @endif
                        <div class="absolute rounded-md w-4/5 left-0 right-0 m-auto -bottom-5 bg-slate-200 p-4">
                            <div class="w-full flex justify-between roboto">
                                <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</span>
                                <span><strong>Author: </strong>{{ $blog->author->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-10 relative">
                        <h3 class="text-center roboto text-3xl">{{$blog->title}}</h3>
                        <div class="mt-6 pb-6 rubik text-[#66686d]">
                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 200) }}
                        </div>
                        <a href="/blog/{{$blog->slug}}" class="">
                            <button class="roboto capitalize text-lg hover:underline underline-offset-2">
                                read more...
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="navigation mt-20">
            {{ $blogs->links() }}
        </div>
        
    </div>
</section>
</x-layout>