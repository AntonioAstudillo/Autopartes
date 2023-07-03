<div>
       <div class="container-fluid">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Mensaje</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacto as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->nombre}}</td>
                                        <td>{{$item->correo}}</td>
                                        <td>{{$item->telefono}}</td>
                                        <td>{{$item->mensaje}}</td>
                                        <td>{{$item->fecha}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $contacto->links() }}
                </div>
    </div>
</div>
