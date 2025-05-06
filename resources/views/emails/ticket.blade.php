<h2>¡Hola {{ $nombre }}!</h2>
<p>Gracias por registrarte para ver la película.</p>
<p><strong>Este correo confirma tu asistencia.</strong></p>

<h3>Detalles de la película:</h3>
<p><strong>Título:</strong> {{ $titulo }}</p>
<p><strong>Hora:</strong> {{ $hora }}</p>
<p><strong>Descripción:</strong> {{ $descripcion }}</p>

<img src="{{ $image }}" alt="Movie Poster"
    style="width: 600px; height: auto; display: block; margin-bottom: 10px;
    border-radius: 20px;">
<img src="https://i.postimg.cc/htN1YcK9/filmo-logo-removebg-preview.png" alt="Filmo"
    style="width: 400px; height: auto; display: block;">
