<div class="" style="overflow: auto">
  <table class="">
    <tr>
      <td>nombre</td>
      <td>Apellido paterno</td>
      <td>Apellido Materno</td>
      <td>correo</td>
      <td>sexo</td>
      <td>rol</td>
      <td>Actions</td>
    </tr>
    @foreach($usuarios as $usuario)
    <tr style="color: #000;" class="mt-3">
      <td><input type="text" value="{{$usuario->name}}" disabled id="name-{{$usuario->id}}" ></td>
      <td><input type="text" value="{{$usuario->lastname}}" disabled id="lastname-{{$usuario->id}}"></td>
      <td><input type="text" value="{{$usuario->second_lastname}}" disabled id="second_lastname-{{$usuario->id}}"></td>
      <td><input type="text" value="{{$usuario->email}}" disabled id="email-{{$usuario->id}}"></td>
      <td>
      <select  name="sexo" id="sexo-{{$usuario->id}}" disabled>
        <option value="1" @if($usuario->sexo == 1) selected @endif>Masculino</option>
        <option value="2" @if($usuario->sexo == 2) selected @endif >Femenino</option>
      </select>
    </td>
      <td>
        <select  name="rol" id="rol-{{$usuario->id}}" disabled>
          <option value="1" @if($usuario->id_role == 1) selected @endif>Encargado</option>
          <option value="2" @if($usuario->id_role == 2) selected @endif >Cliente</option>
          <option value="3" @if($usuario->id_role == 3) selected @endif >Pagador</option>
        </select>
      </td>
      <td id="UsActions">
        <a href="#" onclick="editarUsuario({{$usuario->id}})">Editar</a>
        <a href="#" onclick="cambiarContraseña({{$usuario->id}})">CambiarContraseña</a>
      </td>

      <td id="UsUpdate" style="display: none;">
        <a href="#"  onclick="updateUsuario({{$usuario->id}})">Guardar</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
