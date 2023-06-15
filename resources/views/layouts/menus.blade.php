

<div class="container-fluid mt-2">
    <div class="owl-carousel owl-theme mt-2">
        @foreach ($familias as $familia)
            @php
                $url = str_replace(' ' , '-' , $familia->familia);
            @endphp
            <a class="cajaMenu" href="{{route('menus' , ['menu' => $url])}}">{{$familia->familia}}</a>
        @endforeach
    </div>
</div>
