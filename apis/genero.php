<?php include("../includes/header.php"); ?>
<!-- API de genero por medio del nombre-->
<div class="container mt-5">
  <div class="container mt-5 fade-in">
    <h2>Predicción de Género</h2>
    <form method="GET" class="mb-3">
      <input type="text" name="name" class="form-control" placeholder="Escribe un nombre" required>
      <button type="submit" class="btn btn-primary mt-2">Predecir</button>
    </form>
  </div>

  <?php
    if (isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']); //chars especial evita inyeccion
        $url = "https://api.genderize.io/?name=$name"; //url de la api
        $data = json_decode(file_get_contents($url), true);

        if ($data && isset($data['gender'])) { //condicional si es un género
            $color = $data['gender'] == 'male' ? 'primary' : 'pink';
            $emoji = $data['gender'] == 'male' ? '💙' : '💗';
            echo "<div class='alert alert-" . ($data['gender'] == 'male' ? "primary" : "danger") . "'>
              Género: {$data['gender']} $emoji <br>
              Probabilidad: " . ($data['probability'] * 100) . "%
            </div>";
        } else {
            echo "<div class='alert alert-danger'>No se pudo predecir el género. Intenta con otro nombre.</div>";
        }
    }
  ?>
</div>

<?php include("../includes/footer.php"); ?>