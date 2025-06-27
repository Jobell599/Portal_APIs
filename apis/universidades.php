<?php include("../includes/header.php"); ?>

<div class="container mt-5">
  <div class="container mt-5 fade-in">
    <h2>Universidades de un País</h2>
    <form method="GET" class="mb-3">
      <input type="text" name="country" class="form-control" placeholder="Escribe el nombre del país en inglés" required>
      <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>
  </div>

  <?php
    if (isset($_GET['country'])) {
        $country = htmlspecialchars(trim($_GET['country']));
        $url = "http://universities.hipolabs.com/search?country=" . urlencode($country);

        $response = @file_get_contents($url);

        if ($response === FALSE) {
            echo "<div class='alert alert-danger'>No se pudo conectar con la API. Intenta más tarde.</div>";
        } else {
            $data = json_decode($response, true);

            if (!empty($data)) {
                echo "<h4>Universidades en $country:</h4>";
                echo "<ul class='list-group'>";
                foreach ($data as $university) {
                    $name = htmlspecialchars($university['name']);
                    $domain = htmlspecialchars($university['domains'][0] ?? 'No disponible');
                    $webpage = htmlspecialchars($university['web_pages'][0] ?? '#');
                    echo "<li class='list-group-item'>";
                    echo "<strong>$name</strong><br>";
                    echo "Dominio: $domain<br>";
                    echo "<a href='$webpage' target='_blank'>Sitio web</a>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<div class='alert alert-warning'>No se encontraron universidades para el país '$country'.</div>";
            }
        }
    }
  ?>
</div>

<?php include("../includes/footer.php"); ?>
