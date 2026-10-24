@unless(isset($formularioEditar))
    <div class="carpeta-destino">
        <label for="carpetaDestino">Elegir carpeta</label>
        <select id="carpetaDestino" name="carpeta" required>
            <option value="" disabled selected>Selecciona una carpeta</option>
            @foreach (($carpetas ?? []) as $carpeta)
                <option value="{{ $carpeta }}">{{ $carpeta }}</option>
            @endforeach
        </select>
    </div>
@endunless
