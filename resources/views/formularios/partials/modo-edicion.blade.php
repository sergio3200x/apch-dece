<script>
    window.formularioEnEdicion = @json(isset($formularioEditar) ? [
        'id' => $formularioEditar->id,
        'datos' => $datosEditar,
    ] : null);

    document.addEventListener('DOMContentLoaded', function () {
        if (!window.formularioEnEdicion) {
            return;
        }

        const datos = window.formularioEnEdicion.datos;

        function asignarValor(campo, valorOriginal) {
            const valor = valorOriginal && typeof valorOriginal === 'object'
                ? ('valor' in valorOriginal
                    ? valorOriginal.valor
                    : ('value' in valorOriginal
                        ? valorOriginal.value
                        : ('checked' in valorOriginal
                            ? valorOriginal.checked
                            : valorOriginal)))
                : valorOriginal;

            if (campo.type === 'radio') {
                campo.checked = typeof valor === 'boolean'
                    ? valor
                    : String(campo.value) === String(valor ?? '');
            } else if (campo.type === 'checkbox') {
                campo.checked = Boolean(valor);
            } else {
                campo.value = valor ?? '';
            }
        }

        function asignarCamposPorIndice(valores, camposFormulario) {
            valores.forEach(function (entrada, indice) {
                const posicion = entrada && typeof entrada === 'object' && 'index' in entrada
                    ? entrada.index
                    : indice;
                const valor = entrada && typeof entrada === 'object'
                    ? ('value' in entrada
                        ? entrada.value
                        : ('valor' in entrada
                            ? entrada.valor
                            : ('checked' in entrada
                                ? entrada.checked
                                : entrada)))
                    : entrada;

                if (camposFormulario[posicion]) {
                    asignarValor(camposFormulario[posicion], valor);
                }
            });
        }

        if (Array.isArray(datos)) {
            asignarCamposPorIndice(
                datos,
                Array.from(document.querySelectorAll('.page input'))
            );
        } else if (datos && datos.campos && typeof datos.campos === 'object') {
            const camposFormulario = Array.from(
                document.querySelectorAll('.page input, .page textarea')
            );

            Object.keys(datos.campos).forEach(function (clave) {
                const campo = camposFormulario[Number(clave)];

                if (campo && !campo.closest('.dynamic-action-row, .dynamic-follow-row')) {
                    asignarValor(campo, datos.campos[clave]);
                }
            });

            if (typeof window.cargarFilasDinamicas === 'function') {
                window.cargarFilasDinamicas(datos.filas);
            }
        } else if (datos && typeof datos === 'object') {
            const campos = Array.from(document.querySelectorAll(
                '.page input, .page textarea, .page select'
            ));

            campos.forEach(function (campo) {
                const clave = campo.name || campo.id;

                if (clave && Object.prototype.hasOwnProperty.call(datos, clave)) {
                    asignarValor(campo, datos[clave]);
                }
            });
        }

        if (typeof window.actualizarEstadoGuardado === 'function') {
            window.actualizarEstadoGuardado('Formulario cargado para edición');
        }
    });
</script>
