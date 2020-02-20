@csrf
<div class="form-group row">
  <label for="name" class="col-md-4 col-form-label text-md-right">Nombre: </label>
  <div class="col-md-6">
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
  </div>
</div>
<div class="form-group row">
  <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido Paterno: </label>
  <div class="col-md-6">
    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
  </div>
</div>
<div class="form-group row">
  <label for="second_lastname" class="col-md-4 col-form-label text-md-right">Apellido Materno: </label>
  <div class="col-md-6">
    <input id="second_lastname" type="text" class="form-control @error('second_lastname') is-invalid @enderror" name="second_lastname" value="{{ old('second_lastname') }}" required autocomplete="second_lastname" autofocus>
    @error('second_lastname')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>
<div class="form-group row">
  <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
  <div class="col-md-6">
    <select class="form-control @error('sexo') is-invalid @enderror" name="sexo"  id="sexo" required >
      <option value="1">Masculino</option>
      <option value="2">Femenino</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="rol" class="col-md-4 col-form-label text-md-right">Rol</label>
  <div class="col-md-6">
    <select class="form-control" name="id_role" id="id_role" name="email" required >
      <option value="1">Encargado</option>
      <option value="2">Cliente</option>
      <option value="3">Pagador</option>
    </select>
  </div>
</div>


<div class="form-group row">
  <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>
  <div class="col-md-6">
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>
<div class="form-group row">
  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
  <div class="col-md-6">
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
  </div>
</div>
<div class="form-group row">
  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
  <div class="col-md-6">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  </div>
</div>
<div class="form-group row mb-0">
  <div class="col-md-6 offset-md-4">
    <button type="button" name="button" class="btn btn-info" onclick="saveUser()">Guardar</button>
  </div>
</div>
