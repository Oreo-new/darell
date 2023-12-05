<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        

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
            <h1 class="roboto uppercase text-white text-[100px] leading-tight text-center">
                the <br />oracles <br /> of <br />God 
            </h1>
            <div class="video-container z-[-1] absolute top-0 left-0 w-full h-screen">
                <video src="{{asset('images/home-video.mp4')}}" autoplay loop muted class="object-cover w-full h-screen"></video>
            </div>
        </section>
        <section id="author" class="bg-[#E5E8E5]">
            <div class="container mx-auto px-4">
                <div class="flex items-center py-24">
                    <div class="w-1/2 desc">
                        <h2 class="text-[50px] roboto my-5 font-bold">Darell B. Dyal</h2>
                       
                        {!! $author->description !!}
                    </div>
                    <div class="w-1/2">
                        <img src="{{asset('storage/'.$author->img)}}" alt="Darell B. Dyal" class="mx-auto max-w-full">
                    </div>
                </div>
            </div>
        </section>
        @if($featured)
            <section id="book" class="bg-cover bg-fixed" style="background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url({{asset('images/cross.webp')}})">
                <div class="container mx-auto px-4">
                    <div class="flex items-center py-24">
                        
                        <div class="w-1/2">
                            <a href="{{$featured->link}}" target="_blank">
                                <img src="{{asset('storage/'.$featured->img)}}" alt="{{$featured->title}}" class="mx-auto max-w-full">
                            </a>   
                        </div>
                        <div class="w-1/2 desc">
                            <h2 class="text-[50px] roboto my-5 font-bold text-white">{{$featured->title}}</h2>
                        
                            {!! $featured->description !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif
       @if(!$allBooks->isEmpty())
       <div class="container mx-auto px-4 my-20">
        <h3 class="text-[40px] text-center taviraj font-bold">Darell Dyal’s Latest Releases</h3>
       </div>
       <section id="allbooks">
            <div class="container mx-auto px-4">
                @foreach ( $allBooks as $book)
                    @if($loop->iteration % 2 == 0)
                        <div class="even flex w-full my-10">
                            <div class="book-desc flex items-center w-1/2 flex-wrap bg-[#E5E8E5]">
                                <div class="w-full">
                                    <h4 class="text-center w-full roboto text-[50px]">{{$book->title}}</h4>
                                    <p class="text-center w-full taviraj text-xl">{{$book->mini_title}}</p>
                                </div>
                                
                            </div>
                            <div class="book-img  w-1/2  py-10">
                                <a href="{{$book->link}}" target="_blank">
                                    <img src="{{asset('storage/'.$book->img)}}" alt="{{$book->title}}" width="333px" height="499px" class="mx-auto hover:scale-110 transition-transform">
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="odd flex w-full my-10">
                            <div class="book-desc flex items-center w-1/2 flex-wrap bg-[#E5E8E5]">
                                <div class="w-full">
                                    <h4 class="text-center w-full roboto text-[50px]">{{$book->title}}</h4>
                                    <p class="text-center w-full taviraj text-xl">{{$book->mini_title}}</p>
                                </div>
                                
                            </div>
                            <div class="book-img  w-1/2  py-10">
                                <a href="{{$book->link}}" target="_blank">
                                    <img src="{{asset('storage/'.$book->img)}}" alt="{{$book->title}}" width="333px" height="499px" class="mx-auto hover:scale-110 transition-transform">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
        <section id="contact" class="py-20">
            <h3 class="text-[40px] text-center taviraj font-bold mb-16">Contact Me</h3>
            <div class="container mx-auto px-4">
                <form action="" method="POST" id="contact-form" class="w-1/2 mx-auto roboto" >
                    @csrf
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
                </form>
            </div>
            
        </section>
       @endif
       
      
        
        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
