<?php include("../includes/header.php"); ?>

<div class="container mt-5">
  <div class="container mt-5 fade-in">
    <h2>Información de un País</h2>
    <form method="GET" class="mb-3">
      <input type="text" name="country" class="form-control" placeholder="Escribe el nombre del país (ej. Dominican Republic)" required>
      <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>
  </div>

  <?php
    if (isset($_GET['country'])) {
        $country = trim($_GET['country']);
        $url = "https://restcountries.com/v3.1/name/" . urlencode($country);

        $response = @file_get_contents($url);

        if ($response === FALSE) {
            echo "<div class='alert alert-danger'>Error al conectar con la API.</div>";
        } else {
            $data = json_decode($response, true);

            if (!empty($data) && isset($data[0])) {
                $info = $data[0];
                $flag = $info['flags']['png'];
                $name = $info['name']['common'] ?? 'Desconocido';
                $capital = $info['capital'][0] ?? 'No disponible';
                $population = number_format($info['population']);
                $currencyCode = array_key_first($info['currencies']);
                $currencyName = $info['currencies'][$currencyCode]['name'];
                $currencySymbol = $info['currencies'][$currencyCode]['symbol'] ?? '';

                echo "<div class='card mt-4 text-center'>";
                echo "<img src='$flag' alt='Bandera de $name' class='img-fluid rounded' style='max-width: 200px; margin: 0 auto;'>";
                echo "<div class='card-body'>";
                echo "<h4>$name</h4>";
                echo "<p><strong>Capital:</strong> $capital</p>";
                echo "<p><strong>Población:</strong> $population habitantes</p>";
                echo "<p><strong>Moneda:</strong> $currencyName ($currencyCode) $currencySymbol</p>";
                echo "</div></div>";
            } else {
                echo "<div class='alert alert-warning'>No se encontró información para '$country'.</div>";
            }
        }
    }
  ?>
</div>

<?php include("../includes/footer.php"); ?>
