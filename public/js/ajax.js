$( document ).ready(function() {
   if(sessionStorage.getItem("panel") == 1){
     getPanel();
   }

    $('#error').hide();
    $('#Rerror').hide();
    $( "#product" ).load( "/get/productos" );
});

$( ".reset" ).click(function() {
  $('#email').val('');
  $('#password').val('');
  $('#error').hide();
});


$( "#login" ).click(function() {
  var email = $('#email').val();
  var csrf = $('_token').val();
  var password = $('#password').val();
  console.log('correo: '+ email + 'password :'+ password );
  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/login',
  data: {  "_token":csrf , "email":email ,  "password":password  },
  dataType: 'json',
}).success(function(data){
}).fail(function(data){
  console.log(data);
  if (data.statusText == "OK") {
    $('#iniciaSesion').modal('toggle');
   location.reload();
}else if (data.statusText == "Unprocessable Entity" || data.statusText == "unknown status") {
    $('#error').show();
  }
});
});

function  getPanel(){
  sessionStorage.setItem("panel", 1)
  $( "#body" ).load( "/home" );
}

function  nopanel(){
  sessionStorage.setItem("panel", 0)
}


$( ".Rreset" ).click(function() {
  $('#name').val("");
  $('#lastname').val("");
  $('#second_lastname').val("");
  $('#remail').val("");
  $('#repassword').val("");
  $('#passwordconfirm').val("");
  $('_token').val("");
});



$( "#btnRegistro" ).click(function() {

  var  name = $('#name').val();
  var  lastname = $('#lastname').val();
  var  second_lastname = $('#second_lastname').val();
  var sexo = $('#sexo').val();
  var  remail = $('#remail').val();
  var  repassword= $('#repassword').val();
  var csrf = $('_token').val();


  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/register',
  data: {
    "_token":csrf ,
    "name":name ,
    "lastname":lastname,
    "second_lastname":second_lastname,
    "sexo":sexo,
    "email":remail,
    "password":repassword,
  },
  dataType: 'json',
}).success(function(data){
  console.log(data);
}).fail(function(data){

  if (data.statusText == "OK") {
    $('#registrarse').modal('toggle');
    location.reload();
  }else if (data.statusText == "Unprocessable Entity" || data.statusText == "unknown status") {
    $('#error').show();
  }
});

});
//Panel de administracion  de encargado

function getAreas(){
  $("#areasContainer").load('/Areas/index');
  $('#areas').modal('toggle');
}

function getAreas2(){
  $("#areasContainer").load('/Areas/index');
}


function editarArea(id){
    $( "#Anombre-"+id ).prop( "disabled", false );
    $( "#Adesc-"+id ).prop( "disabled", false );
    $( "#actions-"+id ).hide();
    $( "#update-"+id ).show();
}

function cancelEditarArea(id){
    $( "#Anombre-"+id ).prop( "disabled", true );
    $( "#Adesc-"+id ).prop( "disabled", true );
    $( "#actions-"+id ).show();
    $( "#update-"+id ).hide();
}



function updateArea(id){
  var  nombre = $('#Anombre-'+id).val();
  var  descripcion = $('#Adesc-'+id).val();

  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/Areas/update/'+id,
  data: {
    "nombre":nombre ,
    "descripcion":descripcion
  },
  dataType: 'json',
}).success(function(data){
  console.log(data);
  getAreas2();
}).fail(function(data){
  console.log(data);
});

}

function editarDescripcion(id){
  $( "#Adesc-"+id ).prop( "disabled", false );
  $( "#update-"+id ).show();
  $( "#actions-"+id ).hide();
}


function updateDescripcion(id){
  var  descripcion = $('#Adesc-'+id).val();
  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/Areas/update/'+id,
  data: {
    "descripcion":descripcion
  },
  dataType: 'json',
}).success(function(data){
  console.log(data);
  getAreas2();
  alert(data.message);
}).fail(function(data){
  console.log(data);
});

}



function  eliminarArea(id){
  $.get( "/Areas/delete/"+id, function( data ) {
    getAreas2();
    alert( data.message );
  });
}

function  ActivarArea(id){
  $.get( "/Areas/activar/"+id, function( data ) {
    getAreas2();
    alert( data.message );
  });
}



function crearArea (){
  $( "#areasContainer" ).load( "/Areas/create" );
  $("#Mfooter").hide();
}

function guardarArea(){
  var  nombre = $("#nombre").val();
  var  descripcion = $("#descripcion").val();

  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/Areas/store',
  data: {
    "nombre": nombre,
    "descripcion": descripcion,
  },
  dataType: 'json',
}).success(function(data){
  $("#Mfooter").show()
  getAreas2();
  alert(data.message);

}).fail(function(data){

});

}
function getUsuarios(){
  $("#UserContainer").load('/Usuarios/index');
  $('#usuarios').modal('toggle');
}

function getUsuarios2(){
  $("#UserContainer").load('/Usuarios/index');
}


function editarUsuario(id){
  $("#name-"+id).prop( "disabled", false );;
  $("#lastname-"+id).prop( "disabled", false );;
  $("#second_lastname-"+id).prop( "disabled", false );
  $("#email-"+id).prop( "disabled", false );
  $("#sexo-"+id).prop( "disabled", false );
  $("#rol-"+id).prop( "disabled", false );

  $( "#UsUpdate").show();
  $( "#UsActions").hide();
}

function updateUsuario(id){
  var name = $("#name-"+id).val();
  var lastname = $("#lastname-"+id).val();
  var slastname = $("#second_lastname-"+id).val();
  var email = $("#email-"+id).val();
  var sexo = $("#sexo-"+id).val();
  var rol = $("#rol-"+id).val();
  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/Usuarios/update/'+id,
  data: {
    "name":name ,
    "lastname":lastname ,
    "second_lastname":slastname ,
    "email":email ,
    "sexo":sexo ,
    "rol":rol ,
  },
  dataType: 'json',
}).success(function(data){
  getUsuarios2();
  alert(data.message);
}).fail(function(data){

});
}


function cambiarContraseña(id){
  $("#Mfooter2").hide()
  $("#UserContainer").load('/Usuarios/password/'+id);
}


function storePass(id){
  var password = $("#password").val();
  console.log(id)
  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/Usuarios/storepass/'+id,
  data: {
    "password": password ,
  },
  dataType: 'json',
}).success(function(data){
  $("#Mfooter2").show();
  getUsuarios2();
  alert(data.message);
}).fail(function(data){
  alert(data.message);
});

}



function crearUsuario(){
  $("#Mfooter2").hide();
  $("#UserContainer").load('Usuarios/register/');
}



function saveUser(){
  var name = $("#name").val();
  var lastname = $("#lastname").val();
  var slastname = $("#second_lastname").val();
  var email = $("#email").val();
  var sexo = $("#sexo").val();
  var rol = $("#id_role").val();
  var password = $("#password").val();
  console.log(password);

  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/Usuarios/store',
  data: {
    "name":name ,
    "lastname":lastname ,
    "password":password ,
    "second_lastname":slastname ,
    "email":email ,
    "sexo":sexo ,
    "id_role":rol ,
  },
  dataType: 'json',
}).success(function(data){
  $("#Mfooter2").show();
  getUsuarios2();
  alert(data.message);
}).fail(function(data){
  alert(data.message);
});

}




function getProductosAdmin(){
  $("#productosContainer").load('/Productos/admin/show');
  $('#productos').modal('toggle');
}

function getProductosAdmin2(){
  $("#productosContainer").load('/Productos/admin/show');
}


function getImages(id){
$("#productosContainer").load('/Productos/admin/images/show/'+id);
}

function  consignar(id){
$("#productosContainer").load('/Productos/consignar/'+id);
}

function  consignarStore(id){
  var precio = $("#precio").val();
  console.log('precio')
  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/Productos/storeConsigna/'+id,
  data: {
    "precio_vendido" : precio,
    },
  dataType: 'json',
}).success(function(data){
  getProductosAdmin2();
  alert(data.message);
}).fail(function(data){
  alert(data.message);
});

}



//cliente

function getProductos(){
  $("#productosContainer").load('/Productos/index');
    $('#productos').modal('toggle');
}

function getProductos2(){
  $("#productosContainer").load('/Productos/index');
}


function editarProducto(id){
  $( "#descripcion-"+id ).prop( "disabled", false );
  $( "#precio_propuesto-"+id ).prop( "disabled", false );
  $( "#disponibles-"+id ).prop( "disabled", false );
  $( "#area-"+id ).prop( "disabled", false );
  $( "#editar-"+id ).hide();
  $( "#editSave-"+id ).show();
}


function updateProduct(id){
  var descripcion =  $( "#descripcion-"+id ).val();
  var precio = $( "#precio_propuesto-"+id ).val();
  var disponibles = $( "#disponibles-"+id ).val();
  var area = $( "#area-"+id ).val();


  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  type: "POST",
  url: '/Productos/update/'+id,
  data: {
    "descripcion" :descripcion ,
    "precio_propuesto" : precio,
    "disponibles" :disponibles ,
    "area" :area ,
    },
  dataType: 'json',
  }).success(function(data){
  getProductos2();
  alert(data.message);
  }).fail(function(data){
  alert(data.message);
  });

}

function imageForm(id){
$("#productosContainer").load('/fotos/upload/'+id);
}


function deleteProducto(id){
  $.get( "/Producto/delete/"+id, function( data ) {
    getProductos2();
    alert( data.message );
  });
}

function getFormProduct(){
  $("#productosContainer").load("/Productos/create");
}

function deleteFoto(id){
  $.get( "/Fotos/delete/"+id, function( data ) {
    getImages(data.id);
    alert( data.message );
  });
}

function editFoto(id){
  $("#productosContainer").load('/fotos/edit/'+id);
}


function comprar(id){
  $.get( "/Ventas/create/"+id, function( data ) {
    getImages(data.id);
    alert( data.message );
    $( "#product" ).load( "/get/productos" );
  });
}

function getCompras(){
  $("#comprasContainer").load('/compras/index');
  $('#compras').modal('toggle');
}


function createPago(){
  $("#pagosContainer").load('/Pagos/create/');
  $('#pagos').modal('toggle');
}

function createPago2(){
  $("#pagosContainer").load('/Pagos/create/');
}


function getPagos(){
  $("#pagosContainer").load('/Pagos/index/');
  $('#pagos').modal('toggle');
}
function getPagos2(){
  $("#pagosContainer").load('/Pagos/index/');

}


function entregarPago(id){
  $.get( "/Pagos/entregar/"+id, function( data ) {
    alert( data.message );
    getPagos2();
  });
}
