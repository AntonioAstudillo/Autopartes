<div>
    <div class="container-fluid">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>Id</th>
                                    <th>Movimiento</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Codigo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($log as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->movimiento}}</td>
                                        <td>{{$item->usuario}}</td>
                                        <td>{{$item->fecha}}</td>
                                        <td>{{$item->codigo}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $log->links() }}
                </div>
    </div>
</div>
