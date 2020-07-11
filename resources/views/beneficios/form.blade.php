<div class="{{ $errors->has('Nombre') ? ' has-error' : '' }}">
    <label for="Nombre" class="col-md-4 control-label">Nombre</label>

        <input id="Nombre" type="text" class="form-control" name="Nombre" value="{{ old('Nombre') }}" required autofocus>

        <select id="estado"
                    class="form-control @error('estado') is-invalid @enderror"
                    name="estado" value="{{ old('estado') }}" required
                    autocomplete="estado">
                    <option value="{{ old('estado') }}">Seleccionar*</option>
                    <option value="Habilitado">Habilitado</option>
                    <option value="Deshabilitado">Deshabilitado</option>
                </select>
</div>



@if(count($errors) > 0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
<input type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}" class="btn btn-link">

<a href="{{ url('beneficios') }}">Regresar</a> 