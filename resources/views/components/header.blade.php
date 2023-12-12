<div class="w-full fixed z-10 hidden lg:block" id="header">
    <div class="container mx-auto px-4">
        <ul class="flex justify-between  py-4 items-center text-black" data-aos="fade-in" data-aos-delay="300">
            @if($menu)
                @foreach ($menu as $men)
                    <li class="text-lg roboto"><a href="{{$men->url}}">{{$men->name}}</a></li>
                    @if($loop->index == 2)
                        <li class="Poppins font-bold uppercase"><a href="#home">Darell B. Dyal</a></li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
    
</div>
<div class="fixed w-full lg:hidden flex py-4 z-30" x-data="{showMenu : false}" id="mobile">
    <div class="w-full">
        <a href="#home" class="taviraj text-2xl leading-none text-center w-full block font-bold logo">Darell B. Dyal</a>
    </div>

    <button @click.prevent="showMenu = !showMenu" class=" flex justify-between absolute right-3 top-3" id="toggleBody">
        <svg x-show="!showMenu" class="w-8 h-8 z-30 mr-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="#000">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <svg x-cloak x-show="showMenu" class="w-8 h-8 z-30 mr-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="#000"><path d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
    
    <div class="absolute top-0 bg-white right-0 w-[300px] sm:w-64  pt-4 shadow space-y-6 h-screen" x-cloak x-show="showMenu" 
                    x-transition:enter="transform transition-transform duration-300"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition-transform duration-300"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full">

    <!-- Your content here -->
    <div class="navigation-mobile mt-12">
        
        <ul class="mx-4 mb-5">
            @foreach ($menu as $item)
                <li class="flex py-2 px-4 roboto text-lg">
                    <a href="{{$item['url']}}"> {{$item->name}}</a>
               </li>
            @endforeach
        </ul>
    </div>
    </div>
</div>
