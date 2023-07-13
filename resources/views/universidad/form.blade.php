<label for="nombre">Nombre:</label>
<input type="text" name="nombre" value=" {{ isset($universidad->nombre) ? $universidad->nombre : old('nombre')  }} " id="nombre" required>
<br>
<label for="direccion">Dirección:</label>
<input type="text" name="direccion" 
value="  {{ isset($universidad->direccion) ? $universidad->direccion : old('direccion')  }} " id="direccion" required>
<br>
<label for="email">Email:</label>
<input type="email" name="email" value=" {{ isset($universidad->email) ? $universidad->email : old('email')  }} " id="email" required>
<br>
<label for="fecha">Fecha:</label>
<input type="date" name="fecha"
value="{{ isset($universidad->fecha) ? date('Y-m-d', strtotime($universidad->fecha)) : old('fecha') }}" id="fecha" required>
<br>
<label for="telefono">Teléfono:</label>
<input type="text" name="telefono" 
value="  {{ isset($universidad->telefono) ? $universidad->telefono : old('telefono')  }} " id="telefono" required>
<br>
<label for="cant_salones">Cantidad de salones:</label>
<input type="number" name="cant_salones" 
value="{{ isset($universidad->cant_salones) ? intval($universidad->cant_salones) : old('cant_salones') }}" id="cant_salones" required>
<br>
<input type="submit" value="{{ $modo }}" class="btn btn-success">
<br>
<a href="{{ url('universidad') }}" class="btn btn-primary">Ir al Inicio</a>