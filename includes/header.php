<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Portal PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #f2f6ff, #e6ecf9);
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }

    /* animación de elevación fade-in */
    .fade-in {
      animation: fadeIn 1s ease-in both;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* tarjetas que contienen sombra y bordes más suaves */
    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
      background-color: #ffffff;
    }

    .card-body {
      padding: 2rem;
    }

    /* foto tipo pasaporte */
    .passport-photo {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #0d6efd;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      margin-bottom: 20px;
    }

    /* para los titulos */
    h2, h3, h4, .card-title {
      font-weight: 600;
      color: #0d6efd;
    }

    /* buttoms */
    .btn-primary {
      background-color: #0d6efd;
      border: none;
      border-radius: 8px;
      padding: 8px 20px;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }

    /* forms */
    form {
      margin: auto;
    }

    /* para las alertas */
    .alert {
      border-radius: 10px;
      padding: 1rem;
      font-size: 1rem;
    }

    /* párrafos mejorados */
    p {
      font-size: 1.05rem;
      line-height: 1.6;
      margin-bottom: 1rem;
    }
    .custom-navbar {
      background-color: #cfe2ff; /* azul Bootstrap */
    }

    .custom-navbar .navbar-brand,
    .custom-navbar .nav-link {
      color: #084298 !important; /* azul Bootstrap, sirve para contraste */
      font-weight: 500;
    }

    .custom-navbar .nav-link:hover {
      color: #052c65 !important; /* azul para mouse */
    }
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #f2f6ff, #e6ecf9);
      min-height: 100vh;
      color: #3b3b3b;
    }

    /* principals titules */
    h1, h2, h3, h4 {
      font-weight: 600;
      color: #1a73e8; /* color azul*/
      margin-bottom: 15px;
    }

    /* texto general*/
    p {
      font-size: 1.1rem;
      line-height: 1.7;
      color: #444; /* gris */
    }

    /* links de los navbar */
    .custom-navbar .navbar-brand,
    .custom-navbar .nav-link {
      color: #1a237e !important; /* azul */
      font-weight: 500;
      transition: color 0.3s;
    }

    .custom-navbar .nav-link:hover {
      color: #0d47a1 !important; /* azul al pasar el mouse */
    }

    /* buttoms */
    .btn-primary {
      background-color: #1a73e8;
      border: none;
      border-radius: 8px;
      font-weight: 500;
      padding: 10px 22px;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }

    /* titulos de las cards */
    .card-title {
      font-size: 1.3rem;
      color: #1a237e;
    }

    /* animation */
    .fade-in {
      animation: fadeIn 1s ease-in both;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<!-- estos son los links que hacen referencia a las APIs, utilizamos la palabra "Mi Portal PHP" para regresar al inicio -->
<body>
  <nav class="navbar navbar-expand-lg custom-navbar shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/index.php">Mi Portal PHP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="/acerca.php">Acerca de</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/genero.php">Género</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/edad.php">Edad</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/universidades.php">Universidades</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/clima.php">Clima</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/pokemon.php">Pokémon</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/noticias.php">Noticias</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/monedas.php">Monedas</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/imagenes.php">Imágenes</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/pais.php">País</a></li>
          <li class="nav-item"><a class="nav-link" href="/apis/chistes.php">Chistes</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- continuación en foot de este div -->
  <div class="container">