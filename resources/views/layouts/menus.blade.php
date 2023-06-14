

<div class="container-fluid">
    <div class="owl-carousel owl-theme mt-2">
        @foreach ($familias as $familia)
            <a class="cajaMenu" href="">{{$familia->familia}}</a>
        @endforeach
    </div>
</div>
