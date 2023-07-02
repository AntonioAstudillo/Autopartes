<!-- Modal -->
<div class="modal fade" id="addMarcaProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addMarcaForm">
            @csrf
            <div class="form-group">
                <label for="codigoProducto">Código</label>
                <input type="text" name="codigoProducto" class="form-control" id="codigoProducto"  placeholder="Ingresa el código del producto">
            </div>
            <div class="form-group">
                <label for="marca">Marca</label>
                <select class="form-control" name="marca" id="marca">
                    <option value="">-- Elige una marca --</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->marca}}">{{$marca->marca}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="submarca">Submarca</label>
                <select class="form-control" name="submarca" id="submarca">
                    <option value="" selected disabled>-- Elige una submarca --</option>
                    @foreach ($submarcas as $submarca)
                        <option value="{{$submarca->submarca}}">{{$submarca->submarca}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input name="modelo" type="text" class="form-control" id="modelo"  placeholder="Ingresa el modelo del producto">
            </div>
            <div class="form-group">
                <label for="fmsi">FMSI</label>
                <input name="fmsi" type="text" class="form-control" id="fmsi"  placeholder="Ingresa el fmsi del producto">
            </div>
              <div class="form-group">
                <label for="noBalata">No Balata</label>
                <input name="noBalata" type="text" class="form-control" id="noBalata"  placeholder="Ingresa el noBalata del producto">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveMarca" class="btn btn-primary">Guardar Marca</button>
      </div>
    </div>
  </div>
</div>
