@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h3 class="page__heading">Realizar  Examen {{$examen->titulo}}</h3>
        <a href="{{route('mis-examenes')}}" class="btn btn-secondary">Regresar</a>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="descripcion" class="d-flex flex-column align-items-center py-2">
                            <h3>{{$examen->descripcion}}</h3>
                            <button class="btn btn-primary mt-4">Iniciar Examen</button>
                        </div>
                        <div id="preguntas" class="w-100 flex-column align-items-center py-2 d-none">
                            <h5>
                            </h5    >
                            <div class="d-flex flex-column align-items-start preguntas-list">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="radioOpciones" id="radio_a" value="a">
                                  <label class="form-check-label opca" for="radio_a">
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="radioOpciones" id="radio_b" value="b">
                                  <label class="form-check-label opcb" for="radio_b">
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="radioOpciones" id="radio_c" value="c">
                                  <label class="form-check-label opcc" for="radio_c">
                                  </label>
                                </div>
                            </div>
                            <div class="nav w-75 w-md-50 d-flex justify-content-between">
                                <button class="btn btn-primary mt-4 anterior">Anterior</button>
                                <button class="btn btn-primary mt-4 siguiente">Siguiente</button>
                                <button class="btn btn-success mt-4 d-none finalizar">Finalizar</button>
                            </div>
                        </div>
                        <div id="resultado" class="py-2 flex-column align-items-center d-none">
                            <h5>Has obtenido una calificación de <strong id="calificacion"></strong></h5>
                            <a href="{{route('mis-examenes')}}" class="btn btn-secondary mt-4">Regresar a "Mis Examenes"</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
        let descripcion = document.querySelector('#descripcion');
        let preguntas = document.querySelector('#preguntas');
        let calificacion = document.querySelector('#calificacion');
        let opca = preguntas.querySelector('.opca');
        let opcb = preguntas.querySelector('.opcb');
        let opcc = preguntas.querySelector('.opcc');
        var opts = document.getElementsByName("radioOpciones");
        let preguntaText = preguntas.querySelector('h5');
        let resultado = document.querySelector('#resultado');
        let btnIniciar = descripcion.querySelector('button');
        let btnAnterior = preguntas.querySelector('button.anterior');
        let btnSiguiente = preguntas.querySelector('button.siguiente');
        let btnFinalizar = preguntas.querySelector('button.finalizar');
        let index = 0;
        let lasPreguntas = {!! $preguntas !!};
        let resultados = [];
        let cambiarPregunta = () => {
            if (index == 0) {
                btnAnterior.disabled = true;
            } else {
                btnAnterior.disabled = false;
            }
            if (index == lasPreguntas.length - 1) {
                btnSiguiente.disabled = true;
                btnSiguiente.classList.add('d-none');
                btnFinalizar.classList.remove('d-none');
            } else {
                btnSiguiente.disabled = false;
                btnSiguiente.classList.remove('d-none');
                btnFinalizar.classList.add('d-none');
            }
            opts.forEach((opt) => {
                opt.checked = false;
                if (resultados[index] && resultados[index].value == opt.value) {
                    opt.checked = true;
                }
            });
            preguntaText.innerHTML = lasPreguntas[index].pregunta;
            opca.innerHTML = lasPreguntas[index].opcion_a;
            opcb.innerHTML = lasPreguntas[index].opcion_b;
            opcc.innerHTML = lasPreguntas[index].opcion_c;
        }
        btnIniciar.addEventListener('click', (evt) => {
            Swal.fire({
                title: '¿Seguro que deseas iniciar?',
                showCancelButton: true,
                confirmButtonText: 'Ok',
                icon: 'info',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    index = 0;
                    cambiarPregunta();
                    descripcion.classList.remove('d-flex');
                    descripcion.classList.add('d-none');
                    preguntas.classList.add('d-flex');
                    preguntas.classList.remove('d-none');
                }
            });
        });
        btnFinalizar.addEventListener('click', (evt) => {
            getResult();
            if (resultados.length != lasPreguntas.length || resultados.filter((resultado) => resultado.value == '').length >= 1) {
                Swal.fire({
                    title: 'Debes de contestar todas las preguntas',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                });
            }  else {
                Swal.fire({
                    title: '¿Seguro que deseas concluir el examen?',
                    text: 'Una vez concluido no podrás cambiar tus respuestas',
                    showCancelButton: true,
                    icon: 'warning',
                    confirmButtonText: 'Ok',
                    cancelButtonText: 'No',
                }).then((result) => {
                    if (result.isConfirmed) {
                        let dataFormulario = new FormData();
                        resultados.forEach((resultado) => {
                            dataFormulario.append('ids[]', resultado.id);
                            dataFormulario.append('values[]', resultado.value);
                        });
                        axios.post('{{route('calificar-examen', ['examen' => $examen->id])}}', dataFormulario)
                        .then((response) => {
                            calificacion.innerHTML = response.data.calificacion;
                            preguntas.classList.remove('d-flex');
                            preguntas.classList.add('d-none');
                            resultado.classList.add('d-flex');
                            resultado.classList.remove('d-none');
                        })
                        .catch((error) => {
                            let mensajeError = error.message;
                            if (error.response && error.response.message) mensajeError = error.response.message;
                            if (error.response && error.response.data && error.response.data.message) mensajeError = error.response.data.message;
                            Swal.fire({
                                title: 'Error',
                                text: mensajeError,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        });
                    }
                });
            }
        });
        let getResult = () => {
            resultados[index] = {id: lasPreguntas[index].id, value: ''};
            for (var option = 0; option < opts.length; option++) {
                if(opts[option].checked) {
                    resultados[index].value = opts[option].value;
                    break;
                }
            }
        };
        btnAnterior.addEventListener('click', (evt) => {
            getResult();
            index--;
            if (index < 0) index = 0;
            cambiarPregunta();
        });
        btnSiguiente.addEventListener('click', (evt) => {
            getResult();
            index++;
            if (index >= lasPreguntas.length) index = lasPreguntas.length - 1;
            cambiarPregunta();
        });
</script>
@endpush