<div class="header w-full fixed z-10">
    <div class="container mx-auto px-4">
        <ul class="flex justify-between  py-4 items-center">
            @if($menu)
                @foreach ($menu as $menu)
                    <li class="text-lg roboto"><a href="{{$menu->url}}">{{$menu->name}}</a></li>
                    @if($loop->index == 2)
                        <li class="text-3xl Poppins font-bold uppercase"><a href="#home">Darell Dyal</a></li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</div>