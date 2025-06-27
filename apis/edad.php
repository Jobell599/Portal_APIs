<?php include("../includes/header.php"); ?>
<!-- API que predice la edad por medio del nombre -->
<div class="container mt-5">
    <div class="container mt-5 fade-in"><!-- fade in de animación -->
        <h2>Predicción de Edad</h2>
        <form method="GET" class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Escribe un nombre" required>
            <button type="submit" class="btn btn-primary mt-2">Predecir Edad</button>
        </form>
    </div>

  <?php
    // condicional para obtener los resultados por medio del nombre, con el metodo GET 
    if (isset($_GET['name'])) {
        $name = htmlspecialchars(trim($_GET['name']));
        $url = "https://api.agify.io/?name=" . urlencode($name); //url de la API

        $response = @file_get_contents($url);

        if ($response === FALSE) {
            echo "<div class='alert alert-danger'>No se pudo conectar con la API. Intenta más tarde.</div>";
        } else {
            $data = json_decode($response, true);//pasamos los datos a la variable $data por medio de esta declaración

            if (isset($data['age']) && $data['age'] !== null) {
                $age = (int)$data['age'];
                $emoji = "";
                $category = "";

                if ($age < 18) {
                    $category = "Joven ";
                    $emoji = "<img src='/img/emoji_joven.png' alt='Bebé' style='width:90px;'>";
                } elseif ($age < 50) {
                    $category = "Adulto ";
                    $emoji = "<img src='/img/emoji_adulto.png' alt='Adulto' style='width:90px;'>";
                } else {
                    $category = "Anciano ";
                    $emoji = "<img src='/img/emoji_anciano.png' alt='Anciano' style='width:90px;'>";
                }

                echo "<div class='alert alert-info'>";
                echo "Edad estimada para <strong>$name</strong>: $age años.<br>";
                echo "Categoría: $category $emoji";
                echo "</div>";
            } else {
                echo "<div class='alert alert-warning'>No se pudo estimar la edad para '$name'.</div>";
            }
        }
    }
  ?>
</div>

<?php include("../includes/footer.php"); ?>
