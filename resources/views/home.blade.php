<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Panel de control</div>
        <div class="card-body">
          @if(Auth::user()->id_role == 1)
          <a href="#" onclick="getAreas();">  Areas  </a> <br>
          <a href="#" onclick="getUsuarios();">  Usuarios  </a> <br>
          <a href="#" onclick="getProductosAdmin();"> Productos </a>
          @endif
          @if(Auth::user()->id_role == 2)
          <a href="#"onclick="getProductos()">Ver Productos</a> <br><br>
          <a href="#"onclick="getCompras()">Ver compras</a>
          @endif

          @if(Auth::user()->id_role == 3)
          <a href="#"onclick="getPagos()">Pagos Realizados </a> <br><br>
          <a href="#"onclick="createPago()">Realizar pago</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="areas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Areas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" id="areasContainer">

        </div>
      </div>
      <div class="modal-footer" id="Mfooter">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="crearArea();">Crear Area</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="usuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" id="UserContainer">

        </div>
      </div>
      <div class="modal-footer" id="Mfooter2">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="crearUsuario()">Crear Usuario</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" id="productosContainer">

        </div>
      </div>
      <div class="modal-footer" id="Mfooter2">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="compras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" id="comprasContainer">

        </div>
      </div>
      <div class="modal-footer" id="Mfooter2">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="pagos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" id="pagosContainer">

        </div>
      </div>
      <div class="modal-footer" id="Mfooter4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->
