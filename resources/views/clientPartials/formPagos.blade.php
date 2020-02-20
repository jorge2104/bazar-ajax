<form   method="post" id="formulario">
  <div class="row">
    @foreach($ventas as $venta)
    <div class="col-md-4">
      <p>Vendedor: {{$venta->vendedor->name}}</p>
      <p>Comprador: {{$venta->quien_compra->name}}</p>
      <p>monto: {{$venta->precio_venta}}</p>
      <div class="row">
        <label for="pagar">Pagar</label>
        <input type="checkbox" name="pagar[]" id="pagar-{{$venta->id}}" value="{{$venta->id}}" >
      </div>
    </div>
    @endforeach
    <button type="submit" name="button"> Guardar </button>
  </div>
</form>


<script type="text/javascript">


$( document ).ready(function() {
  var form = document.getElementById("formulario");

  form.onsubmit = function(e){
    e.preventDefault();
    let pagar = [];
    $("input[type=checkbox]:checked").each(function(){
      pagar.push(this.value);
    });
    $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    type: "POST",
    url: '/Pagos/store/',
    data: { "pagar": pagar }  ,
    dataType: 'json',
  }).success(function(data){
    alert(data.message);
    createPago2();
  }).fail(function(data){
    alert(data.message);
  });

  }
});





</script>
