<?php include("../includes/header.php"); ?>

<div class="container mt-5">
  <div class="container mt-5 fade-in">
    <h2>Información de un Pokémon</h2>
    <form method="GET" class="mb-3">
      <input type="text" name="pokemon" class="form-control" placeholder="Escribe el nombre del Pokémon (ej. pikachu)" required>
      <button type="submit" class="btn btn-primary mt-2">Buscar Pokémon</button>
    </form>
  </div>

  <?php
    if (isset($_GET['pokemon'])) {
        $pokemonName = strtolower(trim($_GET['pokemon']));
        $apiUrl = "https://pokeapi.co/api/v2/pokemon/" . urlencode($pokemonName);

        $response = @file_get_contents($apiUrl);

        if ($response === FALSE) {
            echo "<div class='alert alert-danger'>No se pudo obtener información. Asegúrate de escribir correctamente el nombre.</div>";
        } else {
            $data = json_decode($response, true);

            $img = $data['sprites']['front_default'];
            $exp = $data['base_experience'];
            $abilities = array_map(fn($ab) => $ab['ability']['name'], $data['abilities']);
            $soundUrl = "https://pokemoncries.com/cries-old/" . $data['id'] . ".mp3"; // uso de cries-old por mayor compatibilidad

            echo "<div class='card mt-4 text-center'>";
            echo "<div class='card-header bg-warning'><h4>" . ucfirst($pokemonName) . "</h4></div>";
            echo "<div class='card-body'>";
            echo "<img src='$img' alt='$pokemonName'><br><br>";
            echo "<p><strong>Experiencia base:</strong> $exp</p>";
            echo "<p><strong>Habilidades:</strong> " . implode(", ", $abilities) . "</p>";
            echo "<audio controls src='$soundUrl'></audio>";
            echo "</div></div>";
        }
    }
  ?>
</div>

<?php include("../includes/footer.php"); ?>
