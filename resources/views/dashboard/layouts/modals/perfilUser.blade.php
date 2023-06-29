<div id="modalPerfilUser" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                @if(auth()->user()->avatar == 'A')
                                     <img alt="Avatar" class="rounded-circle img-fluid"style="width: 150px;" src="{{asset('img/perfiles/undraw_rocket.svg')}}">
                                @elseif (auth()->user()->avatar == 'M')
                                 <img alt="Avatar" class="rounded-circle img-fluid"style="width: 150px;" src="{{asset('img/perfiles/undraw_profile_2.svg')}}">
                                @else
                                     <img alt="Avatar" class="rounded-circle img-fluid"style="width: 150px;" src="{{asset('img/perfiles/undraw_profile_3.svg')}}">
                                @endif
                                <h5 class="my-3">{{auth()->user()->nombre}}</h5>
                                <p class="text-muted mb-1">{{auth()->user()->user}}</p>
                                <p class="text-muted mb-4">{{auth()->user()->email}}</p>
                                <p class="text-muted mb-4">{{auth()->user()->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
