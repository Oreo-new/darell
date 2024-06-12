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

        {{$slot}}

        
      <footer class="bg-[#E5E8E5] ">
        <div class="container mx-auto px-4 py-10">
            <p class="roboto text-lg text-center tracking-wide">Copyright © {{ now()->year }} Darell B. Dyal</p>
        </div>
      </footer>
       
    
        <!-- Place <div> tag where you want the feed to appear -->

        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
