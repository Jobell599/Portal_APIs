<?php
// index que contiene mi foto y mi nombre y la bienvenida al portal web, aquí utilizamos el div container que tiene el texto en el centro
// y la animación de los textos y la foto
include("includes/header.php");
?>

<div class="container text-center mt-5">
    <div class="container mt-5 fade-in">
        <img src="img/tu_foto.jpg" class="rounded-circle" alt="Tu Foto" width="150">
        <h1 class="mt-3">Jobell Gonell Henriquez</h1>
        <p class="lead">Bienvenido a mi portal web dinámico en PHP con 10 APIs diferentes.</p>
    </div>
</div>

<?php
include("includes/footer.php");
?>