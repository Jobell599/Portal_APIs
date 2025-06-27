<?php include("../includes/header.php"); ?>
<!-- Este es el API de los chistes, que los genera en automático, aunque en inglés jeje. -->
<div class="container mt-5 text-center">
  <div class="container mt-5 fade-in">
    <h2>Generador de Chistes Aleatorios</h2>

    <?php
      // esta es la url del sitio web que extraemos los chistes y los guardamos en la variable $response con el file_get_contents
      $url = "https://official-joke-api.appspot.com/random_joke";
      $response = @file_get_contents($url);

      //aquí manejamos el error si no acepta la API
      if ($response === FALSE) {
          echo "<div class='alert alert-danger'>No se pudo obtener un chiste en este momento. Intenta más tarde.</div>";
      } else {
          $joke = json_decode($response, true);

          if (isset($joke['setup'], $joke['punchline'])) {
              echo "<div class='card mt-4'>";
              echo "<div class='card-body'>";
              echo "<h5 class='card-title'>😄 {$joke['setup']}</h5>";
              echo "<p class='card-text'><strong>{$joke['punchline']}</strong></p>";
              echo "</div></div>";
          } else {
              echo "<div class='alert alert-warning'>No se encontró un chiste válido.</div>";
          }
      }
    ?>

    <a href="chistes.php" class="btn btn-success mt-3">🔁 Obtener otro chiste</a>
  </div>
</div>

<?php include("../includes/footer.php"); ?>
