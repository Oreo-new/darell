<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        
        <title>Darell B. Dyal Author Of The Oracles of God | Darell B. Dyal Author</title>
        <meta name="description" content="Darell B. Dyal is the author of Book The Oracles of God, Darell B. Dyal also wrote a book called Limpy, For such a time as this and more." />
        <link rel="canonical" href="https://www.booksbyauthordarellbdyal.com" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Darell B. Dyal Author Of The Oracles of God | Darell B. Dyal Author" />
        <meta property="og:description" content="Darell B. Dyal is the author of Book The Oracles of God, Darell B. Dyal also wrote a book called Limpy, For such a time as this and more." />
        <meta property="og:url" content="https:///www.booksbyauthordarellbdyal.com" />
        <meta property="og:site_name" content="Darell B. Dyal" />
        <meta property="og:image" content="http:///www.booksbyauthordarellbdyal.com/storage/01HGT4RFDVX17SY2ZSFVBJP68Z.jpg" />
        <meta property="og:image:width" content="1874" />
        <meta property="og:image:height" content="732" />
        <meta property="og:image:type" content="image/png" />
        <meta name="twitter:card" content="summary_large_image" />
    
        <!-- / Yoast SEO plugin. -->
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">
        <!-- Scripts -->
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body class="font-serif antialiased" >
        <x-header/>

        <section id="home" class="w-full min-h-screen relative flex items-center justify-center">
            <h1 class="roboto uppercase text-white  md:text-[90px] text-[50px] leading-tight text-center" data-aos="zoom-out" data-aos-duration="3000">
                the <br />oracles <br /> of <br />God 
            </h1>
            <div class="video-container z-[-1] absolute top-0 left-0 w-full h-screen">
                <video src="{{asset('images/home-video.mp4')}}" autoplay loop muted class="object-cover w-full h-screen"></video>
            </div>
        </section>
        <section id="author" class="bg-[#E5E8E5]">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap lg:flex-nowrap items-center py-10 lg:py-24">
                    <div class="w-full lg:w-1/2 desc" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                        <h2 class="text-[30px] lg:text-[50px] roboto my-5 font-bold">Darell B. Dyal</h2>
                       
                        {!! $author->description !!}
                    </div>
                    <div class="w-full lg:w-1/2">
                        <img src="{{asset('storage/'.$author->img)}}" alt="Darell B. Dyal" class="mx-auto max-w-full" width="333px" height="499px" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                    </div>
                </div>
            </div>
        </section>
        @if($featured)
            <section id="book" class="bg-cover bg-fixed" style="background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url({{asset('images/cross.webp')}})">
                <div class="container mx-auto px-4">
                    <div class="flex items-center flex-wrap lg:flex-nowrap py-10 lg:py-24">
                        
                        <div class="w-full lg:w-1/2 order-2 lg:order-1 ">
                            <a href="{{$featured->link}}" target="_blank">
                                <img src="{{asset('storage/'.$featured->img)}}" alt="{{$featured->title}}" width="333px" height="499px" class="mx-auto max-w-full mt-10 lg:mt-0" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                            </a>   
                        </div>
                        <div class="w-full lg:w-1/2 order-1 lg:order-2 desc" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                            <h2 class="text-[30px] lg:text-[50px] roboto my-5 font-bold text-white" >{{$featured->title}}</h2>
                        
                            {!! $featured->description !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif
        
       @if(!$allBooks->isEmpty())
        <div class="container mx-auto px-4 my-20">
            <h3 class="text-[30px] lg:text-[50px] roboto text-center font-bold" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">Darell Dyal’s Latest Releases</h3>
        </div>
        <section id="allbooks" class="mb-20">
                <div class="container mx-auto px-4">
                    @foreach ( $allBooks as $book)
                        @if($loop->iteration % 2 == 0)
                            <div class="even flex flex-wrap sm:flex-nowrap w-full my-10">
                                <div class="book-desc flex items-center w-full sm:w-1/2 flex-wrap bg-[#E5E8E5]"  data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                                    <div class="w-full py-10 sm:py-0">
                                        <h4 class="text-center w-full roboto text-[30px] lg:text-[50px] px-4" >{{$book->title}}</h4>
                                        <p class="text-center w-full taviraj text-xl px-4">{{$book->mini_title}}</p>
                                    </div>
                                    
                                </div>
                                <div class="book-img  w-full sm:w-1/2  py-10">
                                    <a href="{{$book->link}}" target="_blank">
                                        <img src="{{asset('storage/'.$book->img)}}" alt="{{$book->title}}" width="333px" height="499px" class="mx-auto hover:scale-110 transition-transform" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="odd flex flex-wrap sm:flex-nowrap w-full my-10">
                                <div class="book-desc flex items-center w-full sm:w-1/2 flex-wrap bg-[#E5E8E5]" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                                    <div class="w-full py-10 sm:py-0" >
                                        <h4 class="text-center w-full roboto text-[30px] lg:text-[50px] px-4" >{{$book->title}}</h4>
                                        <p class="text-center w-full taviraj text-xl px-4" >{{$book->mini_title}}</p>
                                    </div>
                                    
                                </div>
                                <div class="book-img  w-full sm:w-1/2  py-10">
                                    <a href="{{$book->link}}" target="_blank">
                                        <img src="{{asset('storage/'.$book->img)}}" alt="{{$book->title}}" width="333px" height="499px" class="mx-auto hover:scale-110 transition-transform" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        @endif
        @if(!$reviews->isEmpty())
            <section id="reviews" class="bg-[#E5E8E5] py-20"> 
                <div class="container mx-auto px-4">
                    <div class="flex w-full">
                        <div class="swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ( $reviews as $review)
                                <div class="swiper-slide text-center">
                                    <p class="roboto text-lg">{{$review->name}}</p>
                                    {!!$review->review!!}
                                </div>
                            @endforeach
                                
                        </div>
                    </div>
                </div>
            </section>  
        @endif
        <section id="videos">
            <h3 class="text-[30px] lg:text-[50px] text-center roboto font-bold mb-16 mt-16" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">Latest Videos</h3>
            <div class="container mx-auto px-4 mb-10">
                <div class='sk-ww-youtube-channel-videos' data-embed-id='238269' data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300"></div>
            </div>
            <div class="container mx-auto px-4">
                <div class='sk-tiktok-feed' data-embed-id='238258' data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300"></div>
            </div>
        </section>
        <section class="container mx-auto px-4">
            {{-- <x-comment /> disable comment box because of spams --}}
            @if($qrcode)
                <h3 class="text-[30px] lg:text-[50px] text-center roboto font-bold mb-16">Scan Here to Discover Divine Wisdom – Buy My Books</h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                    @foreach ($qrcode as $item)
                    <div class="border darell-books p-4 flex items-center justify-center">
                        <img src="{{asset('storage/'.$item->img)}}" alt='book.{{$item->slug }}' class="lg:w-9/12 ml-4">
                        <div class="book-img">
                            {!! $item->description !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </section>
       
        <section id="contact" class="py-20">
            <h3 class="text-[30px] lg:text-[50px] text-center roboto font-bold mb-16">Contact Me</h3>
            <div class="container mx-auto px-4">
                <form action="{{ route('contact-us') }}" method="POST" id="contact-form" class="w-full md:w-1/2 mx-auto roboto shadow p-6">
                    @csrf
                        @if(session('success'))
                            <div class="bg-green-300 shadow py-2 px-4 mb-5" style="w-full">
                                {!! session('success') !!}
                            </div>
                        @endif
                        @if(session('failure'))
                        <div class="bg-red-300 text-white shadow py-2 px-4 mb-5" style="w-full">
                                {!! session('failure') !!}
                            </div>
                        @endif
                    <div class="flex justify-between mb-5">
                        <input type="text" name="name" id="name" placeholder="Name *" class="w-1/2 border-b border-black p-2 mr-6 text-black placeholder:text-black" required>
                        <input type="text" name="email" id="email" placeholder="Email *" class="w-1/2 border-b  border-black p-2 ml-6 text-black placeholder:text-black" required>
                    </div>
                    <div class="flex mb-5">
                        <input type="text" name="subject" id="subject" placeholder="Subject *" class="w-full border-b border-black p-2 text-black placeholder:text-black" required>
                    </div>
                    <div class="flex mb-5">
                        <textarea name="message" id="message" rows="4" placeholder="Message *" class="w-full border-b border-black p-2 text-black placeholder:text-black" required></textarea>
                    </div>
                    <div class="flex mb-2 mt-2">
                        <div class="g-recaptcha" data-sitekey="6LdobyopAAAAAHTnMFflrxAH2KKcbEv1CdKy6Qxf"></div>
                        @if($errors->has('g-recaptcha-response')) 
                            <p class="mt-2 text-sm text-red-500">
                                {{ $errors->first('g-recaptcha-response') }}
                            </p>
                        @endif
                    </div>
                    <div class="flex mb-5">
                        <button type="submit" class="py-2 px-6 mx-auto bg-[#E5E8E5] hover:bg-[#c2cbc2] transition-colors text-black rounded mt-10">
                            Contact Me
                        </button>
                    </div>
                </form>
            </div>
        </section>

        
      <footer class="bg-[#E5E8E5] ">
        <div class="container mx-auto px-4 py-10">
            <p class="roboto text-lg text-center tracking-wide">Copyright © {{ now()->year }} Darell B. Dyal</p>
        </div>
      </footer>
       
      
        <!-- Place <div> tag where you want the feed to appear -->

        <script src='https://widgets.sociablekit.com/tiktok-feed/widget.js' async defer></script>
        <script src='https://widgets.sociablekit.com/youtube-channel-videos/widget.js' async defer></script>
        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
