<?php
// API sobre imagenes aleatorias generadas por IA
$unsplashKey = "4F1bC1OM8o-T_Bo5kUTuvFd9nKseXgP5bgQYVVIYvno";
include("../includes/header.php");
?>

<div class="container mt-5">
  <div class="container mt-5 fade-in">
    <h2>Generador de Imágenes con IA</h2>
    <form method="GET" class="mb-3">
      <input type="text" name="query" class="form-control" placeholder="Escribe una palabra clave (ej. beach, cat, sunset)" required>
      <button type="submit" class="btn btn-primary mt-2">Buscar Imagen</button> <!-- boton que nos permite ingresar nombre-->
    </form>
  </div>

  <?php
    // condicional para obtener la foto en la URL de la API
    if (isset($_GET['query'])) {
        $query = urlencode(trim($_GET['query']));
        $url = "https://api.unsplash.com/photos/random?query={$query}&client_id={$unsplashKey}";

        $response = @file_get_contents($url);

        if ($response === FALSE) {
            echo "<div class='alert alert-danger'>No se pudo conectar con Unsplash.</div>";
        } else {
            $data = json_decode($response, true);

            if (isset($data['urls']['regular'])) {
                $image = $data['urls']['regular'];
                $desc = $data['alt_description'] ?? 'Imagen generada';
                $author = $data['user']['name'];
                $profile = $data['user']['links']['html'];

                echo "<div class='card mt-4 text-center'>";
                echo "<img src='$image' alt='$desc' class='img-fluid rounded'>";
                echo "<div class='card-body'>";
                echo "<p class='card-text'>$desc</p>";
                echo "<small>Foto por <a href='$profile' target='_blank'>$author</a> en Unsplash</small>";
                echo "</div></div>";
            } else {
                echo "<div class='alert alert-warning'>No se encontraron imágenes para '$query'.</div>";
            }
        }
    }
  ?>
</div>

<?php include("../includes/footer.php"); ?>
