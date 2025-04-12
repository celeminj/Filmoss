@extends('index.index')
@section('contenido')
    <div class="reproductor">
        <div class="pelicula">
            <div class="degradado-info"></div>

            <div class="contenedor-imagen">
                <img src="{{ $pelicula->image }}" alt="" style="width: 120rem; height: 58rem; object-fit: cover;">
            </div>

            <iframe class="iframe-pelicula" src="{{ $pelicula->pelicula_src }}" frameborder="0"
                scrolling="no" width="1905" height="940" allowfullscreen
                style="display: none; margin-top: 0rem;"></iframe>

            <!-- Chat lateral (oculto inicialmente) -->
            <div id="chat-lateral">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3>Live chat</h3>
                    <button id="cerrar-chat" >&times;</button>
                </div>

                <div class="chat-en-curso" >
                    <div class="interior-chat-en-curso">
                        <div class="hora-envio-chat"><p></p></div>
                        <div class="usuario-mas-mensaje">
                            <div class="nombre-usuario-chat"></div>
                            <div class="mensaje-usuario"><p></p></div>
                        </div>
                    </div>
                </div>

                <div class="enviar-chat">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Escribe tu mensaje" aria-label="Mensaje">
                        <button class="btn btn-secondary" type="button" id="button-addon2">></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="info-peli">
            <div class="titulo-pelicula">
                <h1>{{ $pelicula->titulo }}</h1>
                <div class="hora">
                    <p>Hora seleccionada: <strong>{{ $hora }}</strong></p>
                </div>
            </div>

            <div class="categorias">
                <p>Comedia, acción, animación</p>
            </div>

            <div class="edad">
                <p>+ {{ $pelicula->restriccion_edad }}</p>
            </div>

            <div class="descripcion-peli">
                <p>{{ $pelicula->descripcion }}</p>
            </div>

            <div class="botones-pelicula">
                <div class="ver-ya">
                    <button>VER YA</button>
                    <a href="{{ $pelicula->pelicula_src }}">
                        <div class="play-button"></div>
                    </a>
                </div>
                <div class="otros-botones">
                    <div class="trailer">
                        <button>Trailer</button>
                    </div>
                    <div class="heart">
                        {{-- <button>Favoritos</button> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Botón flotante para mostrar el chat -->
    <div class="boton-mostrar-chat" >
        <button type="button" class="btn btn-primary">Chat</button>
    </div>

    <div class="detalles">
        <div class="titulo-detalles">
            <h1>DETALLES</h1>
        </div>
        <div class="texto-detalles">
            <h2>{{ $pelicula->titulo }}</h2>
            <p>{{ $pelicula->descripcion }}</p>
            <h4>Género</h4>
            <p>Comedia, acción, animación</p>
            <h4>Fecha de estreno</h4>
            <p>{{ $pelicula->fecha_estreno }}</p>
            <h4>{{ $pelicula->calificacion }}/10</h4>
            <p>Edad: + {{ $pelicula->restriccion_edad }}</p>
        </div>
    </div>

    <div class="reparto">
        <div class="titulo-reparto">
            <h1>REPARTO</h1>
        </div>
        <div class="actores">
            @foreach ($pelicula->actores as $actor)
                <div class="actor"
                    style="background-image: url('{{ $actor->imagen }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
                    <div class="imagen">
                        <div class="nombre-actor">
                            <h4>{{ $actor->nombre }} {{ $actor->apellido }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const verYaBtn = document.getElementById('btn-ver-ya');
            const contenedorImagen = document.querySelector('.contenedor-imagen');
            const iframe = document.querySelector('.iframe-pelicula');
            const infoPeli = document.querySelector('.info-peli');
            const degradado = document.querySelector('.degradado-info');
            const botonMostrarChat = document.querySelector('.boton-mostrar-chat');
            const chatLateral = document.getElementById('chat-lateral');
            const cerrarChatBtn = document.getElementById('cerrar-chat');

            verYaBtn.addEventListener('click', function(e) {
                e.preventDefault();

                contenedorImagen.style.display = 'none';
                infoPeli.style.display = 'none';
                degradado.style.display = 'none';
                iframe.style.display = 'block';

                // Mostrar botón flotante de chat
                botonMostrarChat.style.display = 'block';
            });

            botonMostrarChat.addEventListener('click', () => {
                chatLateral.style.right = '0';
            });

            cerrarChatBtn.addEventListener('click', () => {
                chatLateral.style.right = '-400px';
            });

            // 🕒 Función para obtener la hora actual formateada
            function getHoraActual() {
                const ahora = new Date();
                const horas = ahora.getHours().toString().padStart(2, '0');
                const minutos = ahora.getMinutes().toString().padStart(2, '0');
                return `${horas}:${minutos}`;
            }

            // 🚀 Script para enviar mensaje al chat
            const inputMensaje = document.querySelector('.enviar-chat input');
            const botonEnviar = document.getElementById('button-addon2');
            const contenedorChat = document.querySelector('.interior-chat-en-curso');

            function enviarMensaje() {
    const texto = inputMensaje.value.trim();
    if (texto !== '') {
        const hora = getHoraActual();

        // Crear contenedor general del mensaje
        const contenedorMensaje = document.createElement('div');
        contenedorMensaje.classList.add('bloque-mensaje'); // puedes definir esto en CSS si quieres más control

        // Hora del envío
        const horaEnvio = document.createElement('div');
        horaEnvio.classList.add('hora-envio-chat');
        horaEnvio.innerHTML = `<p style="font-size: 0.75rem; color: gray; margin: 5px 0 4px 0;">${hora}</p>`;

        // Nombre del usuario
        const nombreUsuario = document.createElement('div');
        nombreUsuario.classList.add('nombre-usuario-chat');
        nombreUsuario.innerText = 'Tú:';

        // Mensaje del usuario
        const nuevoMensaje = document.createElement('div');
        nuevoMensaje.classList.add('mensaje-usuario');
        nuevoMensaje.innerHTML = `<p>${texto}</p>`;

        // Agregar todo al bloque
        contenedorMensaje.appendChild(horaEnvio);
        contenedorMensaje.appendChild(nombreUsuario);
        contenedorMensaje.appendChild(nuevoMensaje);

        // Agregar bloque completo al chat
        contenedorChat.appendChild(contenedorMensaje);

        // Limpiar el input
        inputMensaje.value = '';

        // Scroll automático hacia el último mensaje
        contenedorChat.scrollTop = contenedorChat.scrollHeight;
    }
}
            // Evento click del botón
            botonEnviar.addEventListener('click', enviarMensaje);

            // Evento Enter desde el input
            inputMensaje.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    enviarMensaje();
                }
            });
        });
    </script>



@endsection
